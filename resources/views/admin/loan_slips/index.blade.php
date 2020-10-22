@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
{{--                    <div class="card-header">--}}
{{--                        List Loan Slip--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <a href="{{route('admin.book.create')}}" class="btn btn-primary"> Create Book</a>--}}
{{--                    </div>--}}
                </div>

                <div class="card">
                    <div class="card-header">
                        List Loan Slip
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Nguoi Muon</th>
                            <th>Ngay Muon</th>
                            <th>Ngay Tra</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($loan_slips  as $loan_slip)
                                <tr>
                                    <td>{{$loan_slip->id}}</td>
                                    <td>
                                        <a href="">{{$loan_slip->user->name}}</a>
                                    </td>
                                    <td>{{$loan_slip->created_at}}</td>
                                    <td>{{$loan_slip->updated_at}}</td>
                                    <td>{{$loan_slip->updated_at ? 'Da Tra' : 'Chua Tra'}}</td>
                                    <td>
                                        @if(!$loan_slip->updated_at)
                                            <a href="{{route('admin.loan_slips.update',$loan_slip->id)}}"
                                               class="btn btn-primary">Update</a>
                                        @endif
                                        <a href="{{route('admin.loan_slips.delete',$loan_slip->id)}}"
                                           class="btn btn-danger">Delete</a>
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
