<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;


class DefaultHomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $role=auth()->user()->role;

            if($role == 'Super Admin')
            {
                $totalFire = Report::where('emergency_type','Fire')->count();
                $totalMedic = Report::where('emergency_type','Medic')->count();
                $totalAccident = Report::where('emergency_type','Accident')->count();
                $totalCrime = Report::where('emergency_type','Crime')->count();



                return view('admin.dashboard', compact( 'totalFire','totalMedic', 'totalAccident', 'totalCrime'));
            }

             else if($role == 'Admin')
            {
                return view('sector.dashboard');
            }
            else
            {
                return redirect()->back();
            }
        }

       
    }
}
