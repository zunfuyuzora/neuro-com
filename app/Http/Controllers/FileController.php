<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{
    public function uploadAttachment($id, Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf,doc,docx,ppt,jpg,jpeg,png|required|file|max:10000',
        ]);
        
        $code = date("mds");
        $idfile = "file".$code;

        $ext = ".".$request->file('file')->extension();
        $name = $code."-".$request->file('file')->getClientOriginalName();

        $request->file('file')->storeAs('public/docs/',$name);

        File::create([
            "id" => $idfile,
            "content_id" => $id,
            "filename" => $name,
            "location" => "storage/docs/".$name,
            "filetype" => $ext,
        ]);

        return redirect(URL::previous());
    }
}
