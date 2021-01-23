<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $management = \DB::select(
        //     'select users.icon,namings.opponent_id,namings.talk_name,talks.type
        //         from users,namings,talk_management,talks
        //         where users.id = namings.user_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id
        //         and talk_management.user_id = ? and talks.type = 1
        //         union
        //         select groupnamings.icon,groupnamings.talk_id,groupnamings.name,talks.type
        //         from users,groupnamings,talk_management,talks
        //         where talks.id = groupnamings.talk_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id
        //         and talk_management.user_id = ? and talks.type = 0
        //         ',[4,4]
        // );
        $user = Auth::user();
        return view('home',compact('user'));
    }
}
