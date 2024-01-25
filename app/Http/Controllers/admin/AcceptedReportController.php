<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;



class AcceptedReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::select(['report_id', 'dateandTime', 'emergency_type', 'resident_name', 'locationName'])->where('status' , '1');

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('report_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('dateandTime', 'like', '%' . $searchValue . '%')
                    ->orWhere('emergency_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('locationName', 'like', '%' . $searchValue . '%');
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
                'locationName' => $reports->locationName
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

        return view('admin.acceptedreports' , $jsonData);
    }


}


