<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotline;
use  Illuminate\Support\Facades\Auth;
use App\Models\Report;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotline::select(['hotlines_id', 'hotlines_number', 'userfrom', 'responder_name'])->where('userfrom' , auth()->user()->userfrom);

        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];

            $query->where(function ($q) use ($searchValue) {
                $q->where('hotlines_id', 'like', '%' . $searchValue . '%')
                    ->orWhere('hotlines_number', 'like', '%' . $searchValue . '%')
                    ->orWhere('userfrom', 'like', '%' . $searchValue . '%')
                    ->orWhere('responder_name', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count();

        if ($request->has('length') && $request->input('length') != -1) {
            $length = $request->input('length');
            $query->skip($request->input('start'))->take($length);
        }

        $hotlines = $query->get();

        $formattedHotlines = $hotlines->map(function ($hotline) {
            return [
                'hotlines_id' => $hotline->hotlines_id,
                'hotlines_number' => $hotline->hotlines_number,
                'userfrom' => $hotline->userfrom,
                'responder_name' => $hotline->responder_name,
            ];
        });

        $jsonData = [
            'data' => $formattedHotlines,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ];

        if ($request->wantsJson()) {
            return response()->json($jsonData);
        }

        $totalActiveReport = Report::where('status','0')->where('userfrom', auth()->user()->userfrom)->count();
        return view('sector.contacts', $jsonData , compact('totalActiveReport'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotline_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            // 'user_from' => 'required',
        ]);

        $user = Auth::user();
        $hotline = new Hotline;
        $hotline->hotlines_number = $request->input('hotline_number');
        $hotline->userfrom = $user->userfrom;
        $hotline->responder_id = $user->id;
        $hotline->responder_name = $user->responder_name;

        $hotline->save();
        $hotline->save();

        return response()->json(['message' => 'Hotline added successfully', 'success' => true]);
    }

    public function edit(Hotline $contact)
    {
        return response()->json(['data' => $contact]);
    }

    public function update(Request $request, Hotline $contact)
    {
        $request->validate([
            'hotline_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'user_from' => 'required',
        ]);

        
        $userfrom = Auth::user()->userfrom;
        $contact->update([
            'hotlines_number' => $request->input('hotline_number'),
            'userfrom' => $userfrom,
        ]);

        return response()->json(['message' => 'Hotline updated successfully']);
    }
    public function destroy(Hotline $contact)
    {
        try {
            $contact->delete();

            return response()->json(['message' => 'Hotline deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete hotline'], 500);
        }
    }
}
