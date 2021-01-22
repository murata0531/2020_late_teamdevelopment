<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk_id',
        'user_id',
        'last_reference',
    ];
}
