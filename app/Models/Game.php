<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game_option;

class Game extends Model
{
    use HasFactory;


    public function game_option()
    {
        return $this->hasMany(Game_option::class, 'title_id','id');
    }

}
