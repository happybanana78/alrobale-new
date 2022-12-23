<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Load image gallery page
    public function getGallery() {
        $path = "images/gallery";
        $images = scandir($path);
        $polishedImages = [];

        foreach ($images as $image) {
            if ($image != "." && $image != "..") {
                array_push($polishedImages, $image);
            }
        }

        return view('galleria', [
            "images" => $polishedImages,
        ]);
    }
}
