<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupnaming extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk_id',
        'icon',
        'name',
    ];
}
