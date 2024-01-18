<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactTesting extends Controller
{
    public function index(){

        return view('admin.contactesting');
    }
}
