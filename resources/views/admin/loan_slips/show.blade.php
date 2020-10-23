@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><b>Id</b></div>
                            <div class="col-md-6 offset-2">{{$loan_slip->id}}</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><b>Trang Thai</b></div>
                            <div class="col-md-6 offset-2">
                                @if($loan_slip->updated_at)
                                    <p class="text-success">Da Tra</p>
                                @else
                                    <p class="text-danger">Chua tra</p>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><b>Ngay muon</b></div>
                            <div class="col-md-6 offset-2">
                                {{$loan_slip->created_at}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><b>Danh Sach Sach</b></div>
                            <div class="col-md-6 offset-2">
                                @foreach($loan_slip_books as $book)
                                    <p>{{$book->book->book_code}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
