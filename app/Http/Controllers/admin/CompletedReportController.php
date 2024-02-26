<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\SpotReport;
use Illuminate\Support\Facades\Storage;

class CompletedReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::select([
            'report_id', 
            'dateandTime', 
            'emergency_type', 
            'resident_name', 
            'locationName', 
            'userfrom', 
            'status'])->whereIn('status' , [ 3, 4]);
            

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('report_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('dateandTime', 'like', '%' . $searchValue . '%')
                    ->orWhere('emergency_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('locationName', 'like', '%' . $searchValue . '%')
                    ->orWhere('userfrom', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count();

        if ($request->has('start') && $request->has('length')) {
            $start = $request->input('start');
            $length = $request->input('length');

            if ($length != -1) {
                $query->skip($start)->take($length);
            }
        }

        $records  = $query->get();

        $formattedRecords = $records->map(function ($record) {
            return [
                'report_id' => $record->report_id,
                'dateandTime' => $record->dateandTime,
                'emergency_type' => $record->emergency_type,
                'resident_name' => $record->resident_name,
                'locationName' => $record->locationName,
                'userfrom' => $record->userfrom,
                'status' => $record->status,
            ];
        });

        $jsonData = [
            'data' => $formattedRecords,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ];

        if ($request->wantsJson()) {
            return response()->json($jsonData);
        }

        $totalActiveReport = Report::where('status','0')->count();
        return view('admin.completedreport.completedreport', $jsonData , compact('totalActiveReport'));
    }

    public function edit(Report $reports)
    {

        $reports->load(['SpotReport']);

        return response()->json(['data' => $reports]);
    }


}
