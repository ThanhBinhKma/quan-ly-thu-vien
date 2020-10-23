@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Danh sách sách</div>
                            <div class="col-6 text-right">                        <a href="{{route('admin.book.create')}}" class="btn btn-primary"> Tạo Sách</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Tên sách</th>
                            <th>Mã sách</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                            </thead>
                            <tbody>
                            @foreach($books  as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>
                                        <a href="{{route('admin.book.edit',$book->id)}}">{{$book->book_name}}</a>
                                    </td>
                                    <td>
                                        {{$book->book_code}}
                                    </td>

                                    <td>
                                        {{$book->author}}
                                    </td>

                                    <td>
                                        @if($book->status == 0)
                                            <p class="text-danger">Hết Sách</p>
                                        @endif
                                        @if($book->status == 1)
                                            <p class="text-success">Còn Sách</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.book.delete',$book->id)}}" class="btn btn-danger">Xóa</a>
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
