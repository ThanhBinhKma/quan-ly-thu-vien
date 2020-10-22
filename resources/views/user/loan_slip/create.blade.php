@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        Create Book
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('user.loan_slips.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Book Code</label>
                                <div class="col-sm-10">
                                    <select name="book_id[]" id="" class="form-control">
                                        @foreach($books as $book)
                                            <option value="{{$book->id}}">{{$book->book_code}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <a href="javascript:void(0)">Add Book</a>
                            <button class="btn btn-primary text-center">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
