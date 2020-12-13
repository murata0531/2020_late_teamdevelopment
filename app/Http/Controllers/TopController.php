<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function post(Request $request){

        $text = $request['text'];

        return redirect('/user/1');
    }
}
