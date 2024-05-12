<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Game_option;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.game.index');
    }

    public function add($types)
    {

        $datas = Game::where('game_type', $types)
            ->with('game_option')
            ->orderBy('id', 'desc')
            ->get();


        $type = $types;
        return view('admin.pages.game.add', compact('type', 'datas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $title_id = Game::insertGetId([
            'game_type' => $request->type,
            'title' => $request->title
        ]);

        $correct_option_index = $request->correct_option;

        foreach ($request->option as $index => $option) {
            $is_correct = $index == $correct_option_index ? 1 : 0;
            Game_option::insert([
                'title_id' => $title_id,
                'option_name' => $option,
                'is_right' => $is_correct,
            ]);
        }

        return redirect()->back();

    }

    public function edit($id)
    {
        try {
            $game = Game::with('game_option')->findOrFail($id);

            return view('admin.pages.game.edit', compact('game'));

        } catch (ModelNotFoundException $exception) {
            // Handle the case where the model is not found
            // For example, you can return a 404 response
            abort(404);
        }
    }


    public function update(Request $request)
    {

        // dd($request->all());
        $type = $request->type;
        $id = $request->id;

        $game = Game::find($id);

        $game->title = $request->title;
        $game->save(); // Save changes to the game

        // Fetch related options for this game
        $gameOptions = Game_option::where('title_id', $id)->get();

        $correct_option_index = $request->correct_option;

        // Loop through each option received in the request
        foreach ($request->option as $index => $option) {
            // Check if the option exists in the database
            $is_correct = $index == $correct_option_index ? 1 : 0;

            if (isset($gameOptions[$index])) {
                // If it exists, update its name
                $gameOptions[$index]->option_name = $option;
                $gameOptions[$index]->is_right = $is_correct; // Changed to 'is_correct'
                $gameOptions[$index]->save();
            } else {
                // If it doesn't exist, create a new option
                Game_option::create([
                    'title_id' => $id,
                    'option_name' => $option,
                    'is_correct' => $is_correct, // Changed to 'is_correct'
                ]);
            }
        }

        return redirect()->route('game_add', $type);
    }




    public function delete($id)
    {
        try {
            // Find the game by its ID along with its related models
            $game = Game::findOrFail($id);

            // dd($game);
            // Delete the game and its related models
            $game->game_option()->delete();
            $game->delete();

            return redirect()->back()->with('message', 'successfully!');

        } catch (ModelNotFoundException $exception) {
            // Handle the case where the game is not found
            // For example, you can return a 404 response
            return redirect()->back()->with('message', 'successfully!');
        }
    }


}
