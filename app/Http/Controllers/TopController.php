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
        $hidden2 = $request['hidden2'];


        return redirect()->route('login', ['companyname' => $hidden,'companyid' => $hidden2]);
    }
}
