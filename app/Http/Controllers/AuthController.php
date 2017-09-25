<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;
Use Redirect;
Use \App\Log;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('admin.home');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
                      ->select('id', 'email', 'password')
                      ->first();

        if(!$user)
            return Redirect::back()->withErrors(['Este email não está cadastrado em nosso sistema. Você tem certeza que este é seu email?']);

        if($user->password != md5($request->password))
            return Redirect::back()->withErrors(['Senha incorreta.', $request->email]);

        Auth::login($user);

        $log = Log::create(['iduser' => $user->id,
                                'date_in' => date('Y-m-d h:i:s'),
                                'ip' => $_SERVER["REMOTE_ADDR"]]);

        \Session::put('log_id', $log->id);

        return view('admin.home');
    }

    public function logout()
    {
        if(\Session::has('log_id')){
            $log = Log::find(\Session::get('log_id'));
            $log->date_out = date('Y-m-d h:i:s');
            $log->save();

            \Session::forget('log_id');
        }

        Auth::logout();

        return view('admin.login');
    }
}
