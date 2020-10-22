@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <a href="{{route('admin.user.create')}}" class="btn btn-primary"> Create User</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        List User
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($users  as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit',$user->id)}}">{{$user->name}}</a>
                                        </td>
                                    <td>
                                        @if($user->role_id == 0)
                                            User
                                        @endif
                                        @if($user->role_id == 1)
                                            Admin
                                        @endif
                                        @if($user->role_id == 2)
                                            Teacher
                                        @endif
                                    </td>

                                    <td>
                                        @if($user->status == 0)
                                            Binh thuong
                                        @endif
                                        @if($user->status == -1)
                                            Dang Muon
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
