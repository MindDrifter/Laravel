<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Auth;
use App\Http\Requests\AuthRequest;;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller{
    public function applyRegistration(AuthRequest $request){
        $auth = new Auth();
        $auth->email = $request->input('email');
        $auth->password = $request->input('password');

        $id = $auth->where('email', $request->input('email'))->value('id');

        Cookie::queue('password', $request->input('password'));
        Cookie::queue('email', $request->input('email'));
        $auth->save();
        Cookie::queue('id', $id);
        return redirect(route('home'))->with('success', 'Вы успешно зарегистрировались');



    }
    public function getCookie(){
        return redirect(route('home'))
            ->withCookie(Cookie::forget('email'))
            ->withCookie(Cookie::forget('id'))
            ->withCookie(Cookie::forget('password')) ;

    }

    public function loginIn(LoginRequest $request)
    {
        $auth = new Auth();
        if ($auth->where('password', $request->input('password'))->first()
            &&
            $auth->where('email', $request->input('email'))->first()) {

            $id = $auth->where('email', $request->input('email'))->value('id');

        Cookie::queue('password', $request->input('password'));
        Cookie::queue('email', $request->input('email'));
        Cookie::queue('id', $id);
        return redirect(route('home'))->with('success', 'Вы успешно вошли');

        }else{
            return redirect()->route('login')->with('failed', 'Вы ввели неправильные Email или пароль');
        }
    }
}
