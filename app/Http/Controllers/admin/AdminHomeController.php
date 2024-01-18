<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;



class AdminHomeController extends Controller
{
    public function create(){
        
        

        $totalFire = Report::where('emergency_type','Fire')->count();
        $totalMedic = Report::where('emergency_type','Medical')->count();
        $totalAccident = Report::where('emergency_type','Accident')->count();
        $totalCrime = Report::where('emergency_type','Crime')->count();

        return view('admin.dashboard' , compact( 'totalFire','totalMedic', 'totalAccident', 'totalCrime'));
    }

  
}
