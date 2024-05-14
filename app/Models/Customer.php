<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $guard = 'customer';

    protected $fillable = [
        'name'
    ];

    public function score()
    {
        return $this->hasMany(Score::class, 'customer_id','id');
    }

}
