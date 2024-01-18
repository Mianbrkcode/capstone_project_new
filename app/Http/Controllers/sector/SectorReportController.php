<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectorReportController extends Controller
{
    public function index(){

        return view('sector.acceptedrequest');
    }
}
