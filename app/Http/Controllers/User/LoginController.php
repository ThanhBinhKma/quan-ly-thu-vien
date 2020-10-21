<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use App\Models\CodeMail;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUser;
use Carbon\Carbon;
class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            return redirect()->route('user.home');
        }
        $request->session()->flash('status', 'false');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function store(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 0;
        $user->save();
        $request->session()->flash('create', 'true');
        
        $codeMail = new CodeMail;
        $codeMail->user_id = $user->id;
        $codeMail->code = Str::random(6);
        $codeMail->save();
        $data = [
            'user' => $user,
            'codeMail' => $codeMail
        ];
        Mail::to($user->email)->send(new RegisterUser($data));
        return redirect()->route('user.login');
    }

    public function confirm($email,$id,$code,Request $request)
    {
        $email = base64_decode($email);
        $id = base64_decode($id);
        $code = base64_decode($code);
        if(CodeMail::where('user_id',$id)->where('code',$code)->first()){
            User::where('email',$email)->update(['email_verified_at' => Carbon::now()]);
            $request->session()->flash('confirm', 'false');
            return redirect()->route('user.login');
        }
    }
}
