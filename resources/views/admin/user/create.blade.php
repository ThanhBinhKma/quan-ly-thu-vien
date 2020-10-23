@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


                <div class="card">
                    <div class="card-header">
                        Tạo user
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.user.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail"
                                           value="" name="email">
                                    @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword"
                                          name="name">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Quyền</label>
                                <div class="col-sm-10">
                                    <select name="role_id" id="" class="form-control">
                                        <option value="0">Student</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Teacher</option>
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
