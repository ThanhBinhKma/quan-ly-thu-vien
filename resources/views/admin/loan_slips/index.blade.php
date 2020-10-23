@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Danh sach phieu muon </div>
                            <div class="col-6 text-right">
                                <a href="{{route('admin.loan_slips.create')}}" class="btn btn-primary">Tao</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('user'))
                            <p class="text-danger">{{session('user')}}</p>
                        @endif
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Nguoi Muon</th>
                            <th>Ngay Muon</th>
                            <th>Ngay Tra</th>
                            <th>Trang Thai</th>
                            </thead>
                            <tbody>
                            @foreach($loan_slips  as $loan_slip)
                                <tr>
                                    <td><a href="{{route('admin.loan_slips.show',$loan_slip->id)}}">{{$loan_slip->id}}</a></td>
                                    <td>
                                        <a href="{{route('admin.user.show',$loan_slip->user->id)}}">{{$loan_slip->user->name}}</a>
                                    </td>
                                    <td>{{$loan_slip->created_at}}</td>
                                    <td>{{$loan_slip->updated_at}}</td>
                                    <td>{{$loan_slip->updated_at ? 'Da Tra' : 'Chua Tra'}}</td>
                                    <td>
                                        @if(!$loan_slip->updated_at)
                                            <a href="{{route('admin.loan_slips.update',$loan_slip->id)}}"
                                               class="btn btn-primary">Cap nhat</a>
                                        @endif
                                        <a href="{{route('admin.loan_slips.delete',$loan_slip->id)}}"
                                           class="btn btn-danger">Xoa</a>
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
