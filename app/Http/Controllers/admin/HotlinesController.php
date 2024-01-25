<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Hotline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class HotlinesController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotline::select(['hotlines_id', 'hotlines_number', 'userfrom', 'responder_name']);

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

        return view('admin.contacts', $jsonData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotline_number' => 'required',
            'user_from' => 'required',
        ]);

        $user = Auth::user();

        $hotline = new Hotline;
        $hotline->hotlines_number = $request->input('hotline_number');
        $hotline->userfrom = $request->input('user_from');
        $hotline->responder_id = $user->id;
        $hotline->responder_name = $user->responder_name;

        $hotline->save();
        $hotline->save();

        return response()->json(['message' => 'Hotline added successfully', 'success' => true]);
    }

    public function edit(Hotline $hotline)
    {
        return response()->json(['data' => $hotline]);
    }

    public function update(Request $request, Hotline $hotline)
    {
        $request->validate([
            'hotline_number' => 'required',
            'user_from' => 'required',
        ]);

        $hotline->update([
            'hotlines_number' => $request->input('hotline_number'),
            'userfrom' => $request->input('user_from'),
        ]);

        return response()->json(['message' => 'Hotline updated successfully']);
    }
    public function destroy(Hotline $hotline)
    {
        try {
            $hotline->delete();

            return response()->json(['message' => 'Hotline deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete hotline'], 500);
        }
    }
}
