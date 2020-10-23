@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Danh Sách người dùng</div>
                            <div class="col-6 text-right">                            <a href="{{route('admin.user.create')}}" class="btn btn-primary">Tạo người dùng</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Quyền</th>
                            <th>Trạng thái</th>
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
                                            Bình thường
                                        @endif
                                        @if($user->status == -1)
                                            Đang mượn
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-danger">Xóa</a>
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
