<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        
        $reports = Report::all()->where('status', '0');

        return view('admin.reports', compact('reports'));
    }
}
