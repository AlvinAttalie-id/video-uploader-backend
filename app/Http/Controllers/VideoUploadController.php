<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Models\Video;

class VideoUploadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Validasi file
        $validated = $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov,wmv,flv|max:51200', // max 50MB
        ]);

        // Simpan video di storage
        $path = $request->file('video')->store('public/videos');
        $size = $request->file('video')->getSize();
        $filename = $request->file('video')->getClientOriginalName();

        // Simpan metadata ke database
        $video = Video::create([
            'filename' => $filename,
            'path' => $path,
            'size' => $size,
        ]);

        // Kirim response
        return response()->json([
            'success' => true,
            'message' => 'Video uploaded and saved to database.',
            'data' => $video,
        ]);
    }
}
