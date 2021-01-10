<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'company_name', 'company_email', 'company_password','url',
    ];

    protected $hidden = [
        'company_password', 'remember_token',
    ];
}
