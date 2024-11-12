<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{

  
    public function getAllImages()
    {
        // Lấy tất cả URL ảnh từ bảng images
        $images = Image::all();
        
        // Trả về JSON cho AJAX
        return response()->json($images);
    }
}

    //

