<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class TopController extends Controller
{
    public function post(Request $request){

        $pass = $request['pass'];
        $hidden = $request['hidden'];

        return redirect()->route('login', ['company' => $hidden]);
    }
}
