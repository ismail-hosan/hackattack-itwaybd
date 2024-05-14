<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function leaderboard()
    {

        $customers = Score::selectRaw('customer_id,game_type,AVG(score) as average_score')->groupBy('customer_id')->get();

        dd($customers);
        // $averageScoresByCustomerAndGameType = [];

        // foreach ($customers as $customer) {
        //     $customerId = $customer->customer_id;
        //     $gameType = $customer->game_type;
        //     $averageScore = $customer->average_score;

        //     // Ensure customer ID exists as a key in the main array
        //     if (!isset($averageScoresByCustomerAndGameType[$customerId])) {
        //         $averageScoresByCustomerAndGameType[$customerId] = [];
        //     }

        //     // Store game type and average score under the customer ID
        //     $averageScoresByCustomerAndGameType[$customerId][$gameType] = $averageScore;
        // }

        // return response()->json([
        //     'success' => true,
        //     'customer_id' => $customerId,
        //     'leaderboard' => $averageScoresByCustomerAndGameType
        // ]);
    }

    }

