@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        List Book
                    </div>
                    <div class="card-body">
                        @if($status)
                            <a href="{{route('user.loan_slips.create')}}" class="btn btn-primary"> Create Loan Slip</a>
                        @endif
                        <a href="{{route('user.loan_slips.index')}}" class="btn btn-primary"> History Loan Slip</a>
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
                            <th>Name Book</th>
                            <th>Name Code</th>
                            <th>Author</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($books  as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>
                                        {{$book->book_name}}
                                    </td>
                                    <td>
                                        {{$book->book_code}}
                                    </td>

                                    <td>
                                        {{$book->author}}
                                    </td>

                                    <td>
                                        @if($book->status == 0)
                                            <p class="text-danger">Het Sach</p>
                                        @endif
                                        @if($book->status == 1)
                                            <p class="text-success">Con Sach</p>
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
