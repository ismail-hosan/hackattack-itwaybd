<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::where('status', 1)
        ->get();
       //  dd($sliders);

        $images = [];

        foreach ($videos as $video) {
            $title = $video->title;
            $url = $video->url;
            $thumble =  '/'.$video->thumble;
            $imageUrl = url($thumble);
            $images[] = [
                'title' => $title,
                'url' => $url,
                'thumble' => $imageUrl,
            ];
        }

        return response()->json($images);
    }
}
