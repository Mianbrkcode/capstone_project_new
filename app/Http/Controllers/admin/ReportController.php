<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;

class ReportController extends Controller
{
    public function index()
    {
        
        $query = Report::where('status' , '0')->get();
        if (request()->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', 'admin.activereports.actions-button')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.activereports.reports');
    }


    public function show(Report $report_id)
    {
        return view('admin.user_management.showUser', compact('report_id'));
    }

    public function destroy(Request $request)
    {
        $q = Report::where('report_id', $request->report_id)->delete();
        return Response()->json($q);
    }

   
}



   
   
