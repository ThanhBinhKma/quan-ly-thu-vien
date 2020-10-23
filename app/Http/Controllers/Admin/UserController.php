<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\LoanSlip;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->password = bcrypt('123456aA@');
        $user->email_verified_at = Carbon::now();
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function show($id,Request $request)
    {
        $user = User::find($id);
        $status = LoanSlip::where('user_id',$id)->whereNull('updated_at')->first();
        if ($user) {
            return view('admin.user.show', ['user' => $user,'status' => $status ? true : false]);
        }
        $request->session()->flash('user','User does not exist in the system');
        return redirect()->back();
    }
}
