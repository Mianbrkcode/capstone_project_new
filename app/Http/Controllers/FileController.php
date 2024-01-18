<?php

namespace App\Http\Controllers;
use App\Models\File;

use Illuminate\Http\Request;

class FileController extends Controller
{
   
    public function showUploadedFiles()
{
    $files = File::all(); // Retrieve all files from the database

    return view('sector.managecontent', ['files' => $files]);
}


    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Store file information in the database
            $fileModel = new \App\Models\File();
            $fileModel->name = $file->getClientOriginalName();
            $fileModel->mime_type = $file->getMimeType();
            
            // Store the file in the storage directory
            $filePath = $file->store('uploads'); // Store in 'uploads' directory
            $fileModel->path = $filePath;
            
            $fileModel->save();
    
            return redirect()->back()->with('success-bt', 'File uploaded and saved to database!');
        }
    
        return 'File not found!';
    }
}
