<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'customer_id', 'game_type', 'score'];


    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id','id');
    }
}
