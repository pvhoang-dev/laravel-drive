<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class TestController extends Controller
{
    public function index(Request $request)
    {
//        $path = $request->file('file')->store("public/images");
        $success = Storage::disk('s3')->put('files/1/hZd4Q4K5JsQzCvoKenSRtfyvjeQItadFSjXj8psx.txt', Storage::disk('local')->get('files/1/hZd4Q4K5JsQzCvoKenSRtfyvjeQItadFSjXj8psx.txt'));
        dd($success);
        return response()->json([
            'path' => $path,
            'msg' => 'success'
        ]);


//        dd(Storage::disk('s3')->put('test.txt', 'Hello, S3!'));
//
//        dd(Storage::disk('s3')->has('note.txt'));
//        try {
//            Storage::disk('s3')->put('test.txt', 'Hello, S3!');
//        } catch (\Exception $e) {
//            dd($e->getMessage());
//        }
        // dd(Storage::disk('s3')->put('test.txt', 'Hello, S3!'));
    }
}
