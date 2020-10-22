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
                        <form method="POST" action="{{route('admin.book.update',$book->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Book Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail"
                                           value="{{$book->book_name}}" name="book_name">
                                    @error('book_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Book Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$book->book_code}}" id="inputPassword"
                                           name="book_code">
                                    @error('book_code')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$book->author}}" id="inputPassword"
                                           name="author">
                                    @error('author')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="0" {{ $book->status == 0 ? 'selected' : '' }}>Het Sach</option>
                                        <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Con Sach</option>
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
