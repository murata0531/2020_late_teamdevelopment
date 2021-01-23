<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\TalkManagement;
use App\Models\Talk;
use App\Models\Naming;
use App\Models\Groupnaming;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public function map()
// {
//     $this->mapApiRoutes();

//     $this->mapWebRoutes();

//     $this->mapUserRoutes();
// }

// function mapUserRoutes()
// {
//     Route::domain('{user}.'.config('const.app_domain'))
//         ->middleware('web')
//         ->namespace($this->namespace)
//         ->group(base_path('routes/user.php'));
// }
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user',function (Request $request) {
    $id = $request->input('companyid');
    $authid = $request->input('authuserid');
    $users = DB::select('select * from users where company_id = ? and id <> ?',[$id,$authid]);

    $management = \DB::select(
        'select users.icon,namings.opponent_id,namings.talk_name,talks.type
            from users,namings,talk_management,talks
            where users.id = namings.user_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id
            and talk_management.user_id = ? and talks.type = 1
            union all
            select groupnamings.icon,groupnamings.talk_id,groupnamings.name,talks.type
            from users,groupnamings,talk_management,talks
            where talks.id = groupnamings.talk_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id
            and talk_management.user_id = ? and talks.type = 0
            ',[$authid,$authid]
    );
    
    return response()->json(['users' => $users,'management'=> $management]);
});

Route::post('/adduser',function (Request $request) {

    $id = $request->input('authuserid');
    $add = $request->input('adduser');
    $talk_name = $request->input('talkname');
    $opponentuser = DB::select('select * from users where id = ?',[$id]);

    
    $newtalk = Talk::create([
        'type' => 1,
    ]);


    TalkManagement::create([
        'talk_id' => $newtalk->id,
        'user_id' => $id,
    ]);

    TalkManagement::create([
        'talk_id' => $newtalk->id,
        'user_id' => $add,
    ]);

    Naming::create([
        'user_id' => $id,
        'opponent_id' => $add,
        'talk_name' => $talk_name,
    ]);

    Naming::create([
        'user_id' => $add,
        'opponent_id' => $id,
        'talk_name' => $opponentuser[0]->name,
    ]);
    

    $users = DB::select('select * from users where company_id = ?',[$id]);

    return response()->json(['id' => $id,'add' => $add,'talk_name' => $talk_name]);
});


Route::post('/addusers',function (Request $request) {

    $id = $request->input('authuserid');
    $add = $request->input('addusers');
    $talk_name = $request->input('talkname');

    $newtalk = Talk::create([
        'type' => 0,
    ]);

    TalkManagement::create([
        'talk_id' => $newtalk->id,
        'user_id' => $id,
    ]);

    for($i = 0; $i < count($add); $i++){

        TalkManagement::create([
            'talk_id' => $newtalk->id,
            'user_id' => $add[$i],
        ]);
    }

    Groupnaming::create([
        'talk_id' => $newtalk->id,
        'name' => $talk_name,
    ]);
    
    return response()->json(['id' => $id,'add' => $add,'talk_name' => $talk_name]);
});
