<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;


class HomeController extends Controller
{
    public function create(){

       
    
        $totalFire = Report::where('emergency_type','Fire')->where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
        $totalMedic = Report::where('emergency_type','Medical')->where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
        $totalAccident = Report::where('emergency_type','Accident')->where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
        $totalCrime = Report::where('emergency_type','Crime')->where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
        $totalAcceptedReport = Report::where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
        
        return view('sector.dashboard',compact( 'totalFire','totalMedic', 'totalAccident', 'totalCrime', 'totalAcceptedReport' ));

    }
}
