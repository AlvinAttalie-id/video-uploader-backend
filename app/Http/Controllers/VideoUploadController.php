<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class VideoUploadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Validasi file
        $validated = $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov,wmv,flv|max:51200', // max 50MB
        ]);

        // Simpan file ke storage/public/videos
        $path = $request->file('video')->store('public/videos');

        // Ambil URL publik (jika ingin dikirim ke frontend)
        $url = Storage::url($path);

        return response()->json([
            'success' => true,
            'message' => 'Video uploaded successfully.',
            'url' => $url,
        ]);
    }
}
