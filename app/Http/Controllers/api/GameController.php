<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Score;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {

        $response = [];

        $datas = Game::where('status', 1)
            ->where('game_type', $type)
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
                'right_ans' => $data->game_option->where('is_right', 1)->first()->option_name ?? '',
            ];
            $responses[] = $response;
        }

        return response()->json($responses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scrorepdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'game_name' => 'required',
            'score' => 'required',
            // Add more validation rules for other fields as needed
        ]);

        $data = Score::where('customer_id', $request->id)
            ->where('game_type', $request->game_name)
            ->first();

        if ($data) {
            $data->customer_id = $request->id;
            $data->game_type = $request->game_name;
            $data->score = $request->score;
            $data->save(); // Corrected: Call save() method to update the record
            return response()->json('Data updated successfully');
        } else {
            Score::create([
                'customer_id' => $request->id,
                'game_type' => $request->game_name, // Corrected: Change 'game_type' to 'game_name'
                'score' => $request->score,
                'updated_at' => now(), // Assuming you want to set the current time for these fields
                'created_at' => now(),
            ]);
            return response()->json('Data inserted successfully');
        }
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
