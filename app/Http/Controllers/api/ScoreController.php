<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function leaderboard($game_type)
    {

        // $customers = Score::selectRaw('customer_id,game_type,AVG(score) as average_score')
        // ->groupBy('customer_id')
        // ->with('customer')
        // ->get();
        $scores = [];
    if($game_type == 'all')
    {
    $all_customers = Score::selectRaw('customer_id,SUM(score) as sum_score')
    ->groupBy('customer_id')
    ->orderBy('sum_score','DESC')
    ->limit(10)
    ->get();

    // dd($all_customers);

        foreach ($all_customers as $customers) {
            $score = $customers->sum_score ??'';
            $name = $customers->customer->name ?? '';
            $image = $customers->customer->image ?? '';
            $scores[] = [
               'name' => $name,
                'score ' =>  $score,
                'image' => $image,
            ];
        }
    }
    elseif($game_type == 'malware')
    {
        $all_customers = Score::selectRaw('customer_id,game_type, SUM(score) as sum_score')
        ->groupBy('customer_id', 'game_type')
        ->orderBy('sum_score', 'DESC')
        ->where('game_type', 'malware') // Assuming you want to filter by game_type "matach"
        ->limit(10)
        ->get();

    // dd($all_customers);

        foreach ($all_customers as $customers) {
            $score = $customers->sum_score ??'';
            $name = $customers->customer->name ?? '';
            $image = $customers->customer->image ?? '';
            $scores[] = [
                'name' => $name,
                'score ' =>  $score,
                'image' => $image,
            ];
        }
    }
    elseif($game_type == 'password_attack')
    {
        $all_customers = Score::selectRaw('customer_id,game_type, SUM(score) as sum_score')
        ->groupBy('customer_id', 'game_type')
        ->orderBy('sum_score', 'DESC')
        ->where('game_type', 'password_attack') // Assuming you want to filter by game_type "matach"
        ->limit(10)
        ->get();

    // dd($all_customers);

        foreach ($all_customers as $customers) {
            $score = $customers->sum_score ??'';
            $name = $customers->customer->name ?? '';
            $image = $customers->customer->image ?? '';
            $scores[] = [
                'name' => $name,
                'score ' =>  $score,
                'image' => $image,
            ];
        }
    }
    elseif($game_type == 'fishing')
    {
        $all_customers = Score::selectRaw('customer_id,game_type, SUM(score) as sum_score')
        ->groupBy('customer_id', 'game_type')
        ->orderBy('sum_score', 'DESC')
        ->where('game_type', 'fishing') // Assuming you want to filter by game_type "matach"
        ->limit(10)
        ->get();

    // dd($all_customers);

        foreach ($all_customers as $customers) {
            $score = $customers->sum_score ??'';
            $name = $customers->customer->name ?? '';
            $image = $customers->customer->image ?? '';
            $scores[] = [
                'name' => $name,
                'score ' =>  $score,
                'image' => $image,
            ];
        }
    }
    else
    {
        $scores[] = [
            'message' =>  'Data Not Found',
        ];
    }


        return response()->json($scores);

    }

    }

