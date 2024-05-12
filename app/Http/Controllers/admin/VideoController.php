<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $datas = Video::where('status',1)
        ->orderByDesc('id')
        ->get();
        return view('admin.pages.video.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.video.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// dd($request->all());

        $image = $request->thamble_image;
        // dd($image);
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('/media/thamble_image/'), $name_gen);
        $save_url = ('media/thamble_image/' . $name_gen);

        Video::create([
            'title' => $request->title,
            'thumble' => $save_url,
            'url' => $request->url,
        ]);

        return Redirect()->route('video_index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.pages.video.edit',compact('video'));
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
        if($request->thamble_image)
        {
            $thamble_image = $request->thamble_image;

            $name_gen = hexdec(uniqid()) . '.' . $thamble_image->getClientOriginalExtension();

            $thamble_image->move(public_path('/media/thamble_image/'), $name_gen);
            $save_url = ('media/thamble_image/' . $name_gen);

            $video = Video::findOrFail($id);

            $video->title = $request->title;
            $video->url =  $request->url;
            $video->thumble = $save_url;
            $video->save();
            // session()->flash('toast_success', 'Operation successful!');
            return Redirect()->route('video_index');
        }
        else
        {
            $video = Video::findOrFail($id);
            $video->title = $request->title;
            $video->url =  $request->url;
            $video->save();
            return Redirect()->route('video_index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('video_index');
    }
}
