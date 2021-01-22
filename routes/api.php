<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\TalkManagement;
use App\Models\Talk;
use App\Models\Naming;
use Carbon\Carbon;

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
    $management = DB::select('select * from talkmanagements where user_id = ?',[$authid]);
    return response()->json(['users' => $users,'management'=> $management]);
});

Route::post('/adduser',function (Request $request) {

    $id = $request->input('authuserid');
    $add = $request->input('adduser');
    $talk_name = $request->input('talkname');

    $Talk = new Talk;
    $TalkManagement = new TalkManagement;

    $current_date = Carbon::now();
    $Talk->last_modify = $current_date;
    $Talk->type = 1;
    $newtalk = $talk->save();

    $TalkManagement->user_id = $id;
    $TalkManagement->talk_id = $newtalk->id;
    $TalkManagement->last_reference = $current_date;

    $TalkManagement->save();

    $Naming->opponent_id = $id;
    $Naming->opponent_id = $add;
    $Naming->talk_name = $talk_name;

    $Naming->save();

    $users = DB::select('select * from users where company_id = ?',[$id]);

    return response()->json(['id' => $id,'add' => $add,'talk_name' => $talk_name]);
});



