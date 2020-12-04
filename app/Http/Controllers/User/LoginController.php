<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetUserGetRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserResetPasswordRequest;
use App\Mail\MailForgetUser;
use App\Models\CodeForget;
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
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
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
        $user->status = 1;
        $user->email_verified_at = Carbon::now();
        $user->save();
        $request->session()->flash('create', 'true');

//        $codeMail = new CodeMail;
//        $codeMail->user_id = $user->id;
//        $codeMail->code = Str::random(6);
//        $codeMail->save();
//        $data = [
//            'user' => $user,
//            'codeMail' => $codeMail
//        ];
//        Mail::to($user->email)->send(new RegisterUser($data));
        return redirect()->route('user.login');
    }

    public function confirm($email, $id, $code, Request $request)
    {
        $email = base64_decode($email);
        $id = base64_decode($id);
        $code = base64_decode($code);
        $check = CodeMail::where('user_id', $id)->where('code', $code)->first();
        if ($check) {
            User::where('email', $email)->update(['email_verified_at' => Carbon::now()]);
            $check->delete();
            $request->session()->flash('confirm', 'false');
            return redirect()->route('user.login');
        }
    }

    public function forget(Request $request)
    {
        return view('auth.forget');
    }

    public function postForget(ForgetUserGetRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $codeForget = new CodeForget();
            $codeForget->user_id = $user->id;
            $codeForget->code = Str::random(6);
            $codeForget->save();
            $data = [
                'email' => $request->email,
                'code' => $codeForget->code
            ];
            Mail::to($user->email)->send(new MailForgetUser($data));
        }
        $request->session()->flash('forget', 'true');
        return redirect()->back();
    }

    public function resetPassword($email, $code)
    {
        $email = base64_decode($email);
        $code = base64_decode($code);
        $user = User::where('email', $email)->first();
        if ($user) {
            $check = CodeForget::where('user_id', $user->id)->where('code', $code)->first();
            if ($check) {
                $check->delete();
                return view('auth.resetPassword', [
                    'email' => $email
                ]);
            }
        }
    }

    public function postResetPassword(UserResetPasswordRequest $request)
    {
        User::where('email',$request->email)->update(['password'=>bcrypt($request->password)]);
        $request->session()->flash('change_password',true);
        return redirect()->route('user.login');
    }
}
