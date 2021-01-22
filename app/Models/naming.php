<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naming extends Model
{
    use HasFactory;

    protected $fillable = [
        'opponent_id',
        'user_id',
        'talk_name',
    ];
}
