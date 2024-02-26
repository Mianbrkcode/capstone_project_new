<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class SectorPendingReport extends Controller
{
    public function index(Request $request)
    {
            $query = Report::select([
                'report_id',
                'dateandTime',
                'emergency_type',
                'resident_name',
                'locationName',
                'locationLink',
                'phoneNumber',
                'message',
                'imageEvidence',
                'responder_name',
                'residentProfile',
                'userfrom'
            ])->where('status', '0')->where('SectorName' , auth()->user()->userfrom);

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('report_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('responder_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('locationName', 'like', '%' . $searchValue . '%')
                    ->orWhere('emergency_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident_name', 'like', '%' . $searchValue . '%');
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

        $reports = $query->get();

        $formattedGuidelines = $reports->map(function ($report) {
            return [
                'report_id' => $report->report_id,
                'dateandTime' => $report->dateandTime,
                'emergency_type' => $report->emergency_type,
                'resident_name' => $report->resident_name,
                'locationName' => $report->locationName,
                'locationLink' => $report->locationLink,
                'phoneNumber' => $report->phoneNumber,
                'message' => $report->message,
                'imageEvidence' => $report->imageEvidence,
                'responder_name' => $report->responder_name,
                'residentProfile' => $report->residentProfile,
                'userfrom' => $report->userfrom,
            ];
        });

        $jsonData = [
            'data' => $formattedGuidelines,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ];

        if ($request->wantsJson()) {
            return response()->json($jsonData);
        }

        $totalActiveReport = Report::where('status','0')->count();
        return view('sector.pending', $jsonData , compact('totalActiveReport'));
    }

    public function index2(Request $request)
    {
        
            $query = Report::select([
                'report_id',
                'dateandTime',
                'emergency_type',
                'resident_name',
                'locationName',
                'locationLink',
                'phoneNumber',
                'message',
                'imageEvidence',
                'responder_name',
                'residentProfile',
                'userfrom'
            ])->where('status', '1')->where('userfrom' , auth()->user()->userfrom);
        
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('report_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('responder_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('locationName', 'like', '%' . $searchValue . '%')
                    ->orWhere('emergency_type', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident_name', 'like', '%' . $searchValue . '%');
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

        $reports = $query->get();

        $formattedGuidelines = $reports->map(function ($report) {
            return [
                'report_id' => $report->report_id,
                'dateandTime' => $report->dateandTime,
                'emergency_type' => $report->emergency_type,
                'resident_name' => $report->resident_name,
                'locationName' => $report->locationName,
                'locationLink' => $report->locationLink,
                'phoneNumber' => $report->phoneNumber,
                'message' => $report->message,
                'imageEvidence' => $report->imageEvidence,
                'responder_name' => $report->responder_name,
                'residentProfile' => $report->residentProfile,
                'userfrom' => $report->userfrom
            ];
        });

        $jsonData = [
            'data' => $formattedGuidelines,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ];

        if ($request->wantsJson()) {
            return response()->json($jsonData);
        }

        $totalActiveReport = Report::where('status','0')->count();
        return view('sector.pending', $jsonData , compact('totalActiveReport'));
    }

    public function accept_report(Report $report)
    {
        $responder_name = Auth::user()->responder_name;
        $userfrom = Auth::user()->userfrom;

        $report->update([
            'status' => '1',
            'responder_name' => $responder_name,
            'userfrom' => $userfrom
        ]);

        return response()->json(['message' => 'Report accepted']);
    }


    public function show(Report $report)
    {
        return response()->json(['data' => $report]);
    }

    public function reject(Report $report)
    {
        
        try{
            $responder_name = Auth::user()->responder_name;
            $userfrom = Auth::user()->userfrom;
    
            $report->update([
                'status' => '2',
                'responder_name' => $responder_name,
                'userfrom' => $userfrom
            ]);  
        }catch(\Exception $e) {
            return response()->json(['error' => 'Failed to reject report'], 500);
        }
    }


}
