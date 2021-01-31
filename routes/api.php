<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\TalkManagement;
use App\Models\Talk;
use App\Models\Naming;
use App\Models\Groupnaming;
use App\Models\Talklog;
use App\Models\Companyservice;


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

    // $management = \DB::select(
    //     'select users.icon,talks.id,namings.talk_name,talks.type,talklogs.talk_id,talklogs.user_id,talklogs.message,DATE_FORMAT(talklogs.updated_at, \'%Y年%m月%d日\') AS updated_at
    //         from users,namings,talk_management,talks,talklogs
    //         where users.id = namings.user_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id and talklogs.talk_id = talks.id
    //         and talk_management.user_id = ? and talks.type = 1 and talklogs.user_id = ?
    //         and talklogs.updated_at in (select max(talklogs.updated_at) from talklogs where talklogs.user_id = ? group by talklogs.talk_id )
            
    //     union
            
    //         select groupnamings.icon,talks.id,groupnamings.name,talks.type,talklogs.talk_id,talklogs.user_id,talklogs.message,DATE_FORMAT(talklogs.updated_at, \'%Y年%m月%d日\') AS updated_at
    //         from users,groupnamings,talk_management,talks,talklogs
    //         where talks.id = groupnamings.talk_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id and talklogs.talk_id = talks.id
    //         and talk_management.user_id = ? and talks.type = 0 and talklogs.user_id = ?
    //         and talklogs.updated_at in (select max(talklogs.updated_at) from talklogs where talklogs.user_id = ? group by talklogs.talk_id )
        
    //     order by updated_at desc
            
    //     ',[$authid,$authid,$authid,$authid,$authid,$authid]
    // );
    
    $management = \DB::select('
    
    select users.icon,talks.id,namings.talk_name,talks.type,talks.user_id,talks.last_message AS message,DATE_FORMAT(talks.updated_at, \'%Y年%m月%d日\') AS updated_at
    from users,groupnamings,talk_management,talks
    where users.id = namings.user_id and users.id = talk_management.user_id and talk_management.talk_id = talks.id and talks.user_id = users.id
    and talks.user_id = ? and talks.type = 1',[$authid]);
    
    return response()->json(['users' => $users,'management'=> $management]);
});

Route::post('/adduser',function (Request $request) {

    $id = $request->input('authuserid');
    $add = $request->input('adduser');
    $talk_name = $request->input('talkname');
    $opponentuser = DB::select('select * from users where id = ?',[$id]);

    
    $newtalk = Talk::create([
        'type' => 1,
        'user_id' => $id,
        'last_message' => 'トークが作成されました',
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
    
    Talklog::create([
        'talk_id' => $newtalk->id,
        'user_id' => $id,
        'message' => 'トークが作成されました',
    ]);

    Talklog::create([
        'talk_id' => $newtalk->id,
        'user_id' => $add,
        'message' => 'トークが作成されました',
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
        'user_id' => $id,
        'last_message' => 'トークが作成されました',
    ]);

    TalkManagement::create([
        'talk_id' => $newtalk->id,
        'user_id' => $id,
    ]);

    Talklog::create([
        'talk_id' => $newtalk->id,
        'user_id' => $id,
        'message' => 'トークが作成されました',
    ]);


    for($i = 0; $i < count($add); $i++){

        TalkManagement::create([
            'talk_id' => $newtalk->id,
            'user_id' => $add[$i],
        ]);

        Talklog::create([
            'talk_id' => $newtalk->id,
            'user_id' => $add[$i],
            'message' => 'トークが作成されました',
        ]);
    }

    Groupnaming::create([
        'talk_id' => $newtalk->id,
        'name' => $talk_name,
    ]);
    
    return response()->json(['id' => $id,'add' => $add,'talk_name' => $talk_name]);
});

Route::get('/message',function (Request $request) {

    $authid = $request->input('authid');
    $talkid = $request->input('talkid');

    $message = \DB::select(
        '
            select * from talklogs,users where talklogs.user_id = users.id and talklogs.talk_id = ?
            and talklogs.id in (select min(talklogs.id) from talklogs group by talklogs.user_id  )
        ',[$talkid]);

    return response()->json(['message'=> $message]);
});

Route::post('/addmessage',function (Request $request) {

    $authid = $request->input('authuserid');
    $talkid = $request->input('talkid');
    $message = $request->input('message');

    Talk::where('id', $talkid)
        ->update(['last_message' => $message,'user_id' => $authid]);

    $talkmodel = Talk::find($talkid);

    $talkmodel->touch(); 

    Talklog::create([
        'talk_id' => $talkid,
        'user_id' => $authid,
        'message' => $message,
    ]);

    return response()->json(['authid' => $authid]);
});

Route::post('/tool',function (Request $request) {

    $authid = $request->input('authuserid');
    $servicetype = $request->input('value');

    $updatevalue = \DB::select('select * from companyservices where company_id = ?',[$authid]);

    $xvalue = $updatevalue[0]->$servicetype * -1;

    Companyservice::where('company_id', $authid)
          ->update([$servicetype => $xvalue]);
    
    return response()->json(['xvalue' => $xvalue,'xtype' => $servicetype]);
});