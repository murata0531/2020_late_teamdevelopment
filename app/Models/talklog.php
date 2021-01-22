<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talklog extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk_id',
        'user_id',
        'date',
        'message',
    ];
}
