@extends('home.master')
@section('js')
    <script>
        $(document).ready(function () {
            var o = 0;
            $('.add-book').on('click', function () {
                o = o + 1;
                $.ajaxSetup({
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                $.ajax({
                    url: '{{route('user.loan_slips.getList')}}',
                    data: {
                        id: 1,
                        "_token": "{{ csrf_token() }}"
                    },
                    method: 'POST',
                    success: function (data) {
                        var html = '<div class="form-group row hi_'+o+'" > <label for="" class="col-sm-2 col-form-label">Book Code</label><div class="col-sm-8"><select name="book_id[]" id="" class="form-control">' + data.data + '</select></div><div class="col-sm-2"><a class="btn btn-danger btn-delete" id="'+o+'">Delete</a></div></div>'
                        $('.haa').append(html)
                    }
                })
            })

            $(document).on('click','.btn-delete',function (){
                // alert('.hi_'+ $(this).attr('id'))
                $('.hi_'+$(this).attr('id')).remove()
            })
        })
    </script>
@endsection
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
                        <form method="POST" action="{{route('admin.loan_slips.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-8">
                                    <select name="user_id" id="" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="haa">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Book Code</label>
                                    <div class="col-sm-8">
                                        <select name="book_id[]" id="" class="form-control">
                                            @foreach($books as $book)
                                                <option value="{{$book->id}}">{{$book->book_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary add-book">Add Book</a>
                            <button class="btn btn-primary text-center">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
