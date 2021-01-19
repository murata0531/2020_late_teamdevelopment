<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class TopController extends Controller
{
    public function post(Request $request){

        $pass = $request['pass'];
        $hidden = $request['hidden'];
        $hidden2 = $request['hidden2'];


        $company_pass = DB::select('select password from companies where id = ?',[$hidden2]);

        dd($company_pass);
        if (Hash::check($pass, $company_pass)) {
            // 一致したときの処理
        } else {
            // 一致しなかったときの処理
        }
        // return redirect()->route('login', ['companyname' => $hidden,'companyid' => $hidden2]);
        return back()->with('message', 'パスワードが違います');
    }
}
