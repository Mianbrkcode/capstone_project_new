<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Emergency_Hotlines;
use App\Models\Hotline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class HotlinesController extends Controller
{
    public function index(){
       
        $hotlines = Hotline::paginate(5);
        return view('admin.contacts', ['hotlines' => $hotlines ]);
    }

    public function addHotlines(Request $request){

        $request->validate([
            'hotlines_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'userfrom' => 'required',
            'responder_id' => 'required|integer'
        ]);

        $hotlines = new Hotline();

        $hotlines->hotlines_number	 = $request->hotlines_number;
        $hotlines->userfrom	 = $request->userfrom;
        $hotlines->responder_id	= $request->responder_id;
        $hotlines->responder_name	= $request->responder_name;
        $hotlines->save();

        return redirect()->route('hotlines.index')->with('success', 'successfully added');
    }

    public function hotlinesDelete($hotlines_id)
    {
        // Delete a specific record
        $number = Hotline::find($hotlines_id);
        $number->delete();
        return redirect()->route('hotlines.index')->with('success', 'Record deleted successfully.');
    }

    public function hotlinesEdit(Request $request, $hotlines_id)
    {

        $number = Hotline::find($hotlines_id);

        $validator = Validator::make($request->all(), [
            'hotlines_number' => 'required',
            'userfrom' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else 
        {
            $number->update([
                'hotlines_number' => $request->input('hotlines_number'),
                'userfrom' => $request->input('userfrom'),
                ]);

            return redirect()->back()->with('success', 'Hotline Update Successful');

        }

    
    // Update password if a new one is provided

        
        
    }


}
