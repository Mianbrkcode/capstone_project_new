<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;



class AcceptedReportController extends Controller
{
    public function index(Request $request)
    {
        
        if(Auth::user()->userfrom =='MDRRMO'){
            $query = Report::select([
                'report_id', 
                'dateandTime', 
                'emergency_type', 
                'resident_name', 
                'locationName' , 
                'imageEvidence', 
                'residentProfile',
                'userfrom' 
                ])->where('status', '1');

        }elseif(Auth::user()->userfrom !='MDRRMO'){
            $query = Report::select([
                'report_id', 
                'dateandTime', 
                'emergency_type', 
                'resident_name', 
                'locationName' , 
                'imageEvidence', 
                'residentProfile',
                'userfrom' 
                ])->where('status', '1')->where('userfrom' , auth()->user()->userfrom);
        }

        
        if ($request->filled('filter_date_start') && $request->filled('filter_date_end')) {
            $filter_date_start = $request->input('filter_date_start') . ' 00:00:00';
            $filter_date_end = $request->input('filter_date_end') . ' 23:59:59';

            $query->whereBetween('dateandTime', [$filter_date_start, $filter_date_end]);
        } elseif ($request->filled('filter_date_start')) {
            $filter_date_start = $request->input('filter_date_start') . ' 00:00:00';

            $query->where('dateandTime', '>=', $filter_date_start);
        } elseif ($request->filled('filter_date_end')) {
            $filter_date_end = $request->input('filter_date_end') . ' 23:59:59';

            $query->where('dateandTime', '<=', $filter_date_end);
        }

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('report_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('dateandTime', 'like', '%' . $searchValue . '%')
                    ->orWhere('emergency_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('locationName', 'like', '%' . $searchValue . '%')
                    ->orWhere('userfrom', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count();

        if ($request->has('length') && $request->input('length') != -1) {
            $length = $request->input('length');
            $query->skip($request->input('start'))->take($length);
        }

        $reports = $query->get();

        $formattedHotlines = $reports->map(function ($reports) {
            return [
                'report_id' => $reports->report_id,
                'dateandTime' => $reports->dateandTime,
                'emergency_type' => $reports->emergency_type,
                'resident_name' => $reports->resident_name,
                'locationName' => $reports->locationName,
                'residentProfile' => $reports->residentProfile,
                'imageEvidence' => $reports->imageEvidence,
                'userfrom' => $reports->userfrom
            ];
        });

        $jsonData = [
            'data' => $formattedHotlines,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ];

        if ($request->wantsJson()) {
            return response()->json($jsonData);
        }
        $totalActiveReport = Report::where('status','0')->count();
        return view('admin.acceptedreports', $jsonData , compact('totalActiveReport'));
    }
}


