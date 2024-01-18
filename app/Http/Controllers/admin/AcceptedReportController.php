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
        
        // if ($request->ajax()) {
        //     $data = Report::select('*');
  
        //     if ($request->filled('from_date') && $request->filled('to_date')) {
        //         $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
        //     }
  
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
       
        //                     $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }

        
        return view('admin.acceptedreports');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportcsv() 
        {
            return Excel::download(new UsersExport, 'reports.csv', \Maatwebsite\Excel\Excel::CSV);
        }
}


