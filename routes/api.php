<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoUploadController;

Route::post('/upload', [VideoUploadController::class, 'store']);
