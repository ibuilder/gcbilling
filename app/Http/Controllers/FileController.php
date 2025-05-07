<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    /**
     * Handle file uploads.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls,jpg,png,jpeg|max:10240', // Adjust mimes and max size as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }    

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $storedName = $file->hashName();
        $path = $file->store('uploads');

        File::create([
            'original_name' => $originalName,
            'stored_name' => $storedName,
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'uploaded_by' => Auth::id(),
        ]);
    

        return redirect()->back()->with('success', 'File uploaded successfully.');
        }

    /**
     * Display a listing of the uploaded files.
     *
     * @return View
     */
    public function index(): View
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    /**
     * Download the specified file.
     *
     * @param  File  $file
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(File $file)
    {
        if (Storage::exists($file->path)) {
            return Storage::download($file->path, $file->original_name);
        } else {
            abort(404, 'File not found.');
        }
    }


}