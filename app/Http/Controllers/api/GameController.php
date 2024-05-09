<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type){

    $response = [];

        $datas =  Game::where('status',1)
        ->where('game_type',$type)
        ->with('game_option')
        ->get();
        // dd($datas);
            foreach ($datas as $data) {

                $response = [
                    'title' => $data->title ?? '',
                    'game_option1' => $data->game_option[0]->option_name ?? '',
                    'game_option2' => $data->game_option[1]->option_name ?? '',
                    'game_option3' => $data->game_option[2]->option_name ?? '',
                    'game_option4' => $data->game_option[3]->option_name ?? '',
                    'right_ans' => $data->game_option->where('is_right',1)->first()->option_name ?? '',
                ];
                $responses[]= $response;
            }

        return response()->json($responses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
