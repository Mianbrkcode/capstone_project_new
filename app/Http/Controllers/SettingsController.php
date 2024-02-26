<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Report;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settingsIndex(){

        $aboutus = Setting::where('settings_id' , '1')->get();
        $legalpolicies = Setting::where('settings_id' , '2')->get();

        $totalActiveReport = Report::where('status','0')->count();
        return view('admin.settings' , ['aboutus' => $aboutus, 'legalpolicies' => $legalpolicies , 'totalActiveReport' => $totalActiveReport ]);
    }

    public function editAboutus(Request $request){
        
        $aboutus = Setting::where('settings_id' , '1');

        $request->validate([
            'settings_description' => 'required|string|min:100'
        ]);

        $aboutus->update([
            'settings_description' => $request->input('settings_description')
        ]);

        return redirect()->back()->with('success-bt' , 'About Us Content Update Successfully');
    }

    public function editLegalPolicies(Request $request){
        
        $aboutus = Setting::where('settings_id' , '2');

        $request->validate([
            'settings_description' => 'required|string|min:100'
        ]);

        $aboutus->update([
            'settings_description' => $request->input('settings_description')
        ]);

       
        return redirect()->back()->with('success-updt-policies' , 'Legal Policies Content Update Successfully');
    }
}
