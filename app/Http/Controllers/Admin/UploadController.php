<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request): JsonResponse
    {
        $serverName = Storage::disk('public')->put('images', $request->file('file'));
        $location  = Storage::url($serverName);

        return response()->json(['location'=> $location]);
    }

    public function uploadFile(Request $request): JsonResponse
    {
        $serverName = Storage::disk('public')->put('files', $request->file('file'));
        $location  = Storage::url($serverName);


        return response()->json(['location'=> $location]);
    }
}
