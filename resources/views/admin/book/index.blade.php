@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <a href="{{route('admin.book.create')}}" class="btn btn-primary"> Create Book</a>
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
                                            Het Sach
                                        @endif
                                        @if($book->status == 11)
                                            Con Sach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.book.delete',$book->id)}}" class="btn btn-danger">Delete</a>
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
