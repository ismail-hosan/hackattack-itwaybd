<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {

        // $imageFiles = Slider::files('public/');

         $sliders = Slider::where('status', 1)
         ->get();
        //  dd($sliders);

         $images = [];

         foreach ($sliders as $slider) {
             $title = $slider->title;
             $desciption = $slider->description;
             $image =  '/'.$slider->image;
             $imageUrl = url($image);
             $images[] = [
                 'title' => $title,
                 'description' => $desciption,
                 'image' => $imageUrl,
             ];
         }

         return response()->json($images);

    }
}
