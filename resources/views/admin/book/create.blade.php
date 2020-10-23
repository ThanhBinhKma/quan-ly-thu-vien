@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


                <div class="card">
                    <div class="card-header">
                        Tạo sách
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.book.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sách</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail"
                                           value="" name="book_name">
                                    @error('book_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Mã sách</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword"
                                           name="book_code">
                                    @error('book_code')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Tác giả</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword"
                                           name="author">
                                    @error('author')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="0">Hết Sách</option>
                                        <option value="1">Còn Sách</option>
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary text-center">Tạo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
