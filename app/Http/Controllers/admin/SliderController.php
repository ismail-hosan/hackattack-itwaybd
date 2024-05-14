<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class SliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Slider::where('status',1)
        ->orderByDesc('id')
        ->get();
        return view('admin.pages.slider.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $image = $request->image;
        // dd($image);
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('/media/slider/'), $name_gen);
        $save_url = ('/media/slider/' . $name_gen);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
        ]);
        // session()->flash('toast_success', 'Operation successful!');
        return Redirect()->route('slider_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.pages.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $video = Slider::findOrFail($id);

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the previous image from storage if it exists
            $previousImage = public_path($video->image);
            // dd($previousImage);
            if (file_exists($previousImage)) {
                unlink($previousImage);
            }

            // Upload the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/media/slider/'), $name_gen);
            $save_url = '/media/slider/' . $name_gen;

            $video->image = $save_url;
        }

        // Update other fields
        $video->title = $request->title;
        $video->description = $request->description;
        $video->save();

        // Redirect to slider index page
        return redirect()->route('slider_index');
    }


    public function destroy($id)
{
    $slider = Slider::findOrFail($id);

    // Delete the image from storage if it exists
    $imagePath = public_path($slider->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the slider entry
    $slider->delete();

    return redirect()->route('slider_index');
}
}
