@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        List Loan Slip
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        List Book
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Ngay muon</th>
                            <th>Ngay tra</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($loan_slips  as $loan_slip)
                                <tr>
                                    <td><a href="{{route('user.loan_slips.show',$loan_slip->id)}}">{{$loan_slip->id}}</a></td>
                                    <td>{{$loan_slip->created_at}}</td>
                                    <td>{{$loan_slip->updated_at}}</td>
                                    <td>
                                        @if($loan_slip->updated_at)
                                            Da tra
                                        @else
                                            Chua tra
                                        @endif
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
