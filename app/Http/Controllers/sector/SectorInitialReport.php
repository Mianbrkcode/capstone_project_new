<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class SectorInitialReport extends Controller
{
    public function index(){

        $totalActiveReport = Report::where('status','0')->count();
        return view('sector.initial_report' , compact('totalActiveReport'));
    }

    public function makereport(Request $request){

        $reports_status = '0';

        $request->validate([
            'emergency_type' => 'required|string|max:100',
            'resident_name' => 'required|string|max:100',
            'locationName' => 'required',
            'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'message' => 'required',
            
        ]);

        $report = new Report();
        $report->uid = Auth::user()->id;
        $report->SectorName = Auth::user()->userfrom;
        $report->responder_name = Auth::user()->responder_name;
        $report->residentProfile = 'file-storage/user_default.jpg';
        $report->emergency_type = $request->emergency_type;
        $report->resident_name = $request->resident_name;
        $report->locationName = $request->locationName;
        $report->phoneNumber = $request->phoneNumber;
        $report->message = $request->message;
        $report->status = $reports_status;
        $report->save();

        return redirect()->route('pending_reports')->with('success', 'Report was successfully save');
    }
}
