<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApkController extends Controller
{
    public function download($filename)
    {
        $path = public_path('storage/file-storage/' . $filename);
        $headers = [
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename="android.apk"',
        ];

        if (file_exists($path)) {
            return response()->download($path, $filename, $headers);
        } else {
            abort(404, 'File not found');
        }
    }
}
