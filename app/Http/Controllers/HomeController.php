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

        // $management = \DB::select(
        //     'select users.icon,talks.id,namings.talk_name,talks.type,talklogs.*
        //         from users,namings,talk_management,talks,talklogs
        //         where users.id = namings.user_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id and talklogs.talk_id = talks.id
        //         and talk_management.user_id = ? and talks.type = 1
        //         and talklogs.updated_at in (select max(talklogs.updated_at) from talklogs where talklogs.user_id = ? group by talklogs.talk_id )
                
        //         union all
        //         select groupnamings.icon,talks.id,groupnamings.name,talks.type,talklogs.*
        //         from users,groupnamings,talk_management,talks,talklogs
        //         where talks.id = groupnamings.talk_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id and talklogs.talk_id = talks.id
        //         and talk_management.user_id = ? and talks.type = 0
        //         and talklogs.updated_at in (select max(talklogs.updated_at) from talklogs where talklogs.user_id = ? group by talklogs.talk_id )
                
        //         ',[1,1,1,1]
        // );
        
        // dd($management);

        // $message = \DB::select(
        //     '
        //         select * from talklogs,users where talklogs.user_id = users.id and talklogs.talk_id = 1
        //         and talklogs.id not in (select min(talklogs.id) from talklogs group by talklogs.user_id  )
        //     ');

        //     dd($message);

        $user = Auth::user();

        $usertool = \DB::select('select distinct companyservices.company_id, companyservices.* from companyservices,companies,users
            where companyservices.company_id = companies.id and companies.id = users.company_id
            and users.company_id = ?',[$user->id]);


        return view('home',compact('user','usertool'));
    }
}
