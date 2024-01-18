<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuidelinesController extends Controller
{
    public function index(){


        return view('admin.guidelines_management.guidelines');
    }

    public function uploadGuidelines(){


        return view('admin.guidelines_management.upload_guidelines');
    }
}
