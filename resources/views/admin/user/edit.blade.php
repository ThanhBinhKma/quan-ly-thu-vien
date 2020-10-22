@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


                <div class="card">
                    <div class="card-header">
                        Create User
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.user.update',$user->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail"
                                           value="{{$user->email}}" name="email" >
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword"
                                           name="name" value="{{$user->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role_id" id="" class="form-control">
                                        <option value="0" {{$user->role_id == 0 ? 'selected' : ''}}>Student</option>
                                        <option value="1" {{$user->role_id == 1 ? 'selected' : ''}}>Admin</option>
                                        <option value="2" {{$user->role_id == 2 ? 'selected' : ''}}>Teacher</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="0">Chua muon</option>
                                        <option value="-1">Dang muon</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary text-center">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
