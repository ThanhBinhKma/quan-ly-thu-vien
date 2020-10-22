@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h4>List Book</h4>
                    <table class="table">
                        <thead>
                        <th>Book Name</th>
                        <th>Book Code</th>
                        <th>Author</th>
                        </thead>
                        <tbody>
                        @foreach($loan_slip_books as $loan_slip_book)
                            <tr>
                                <td>{{($loan_slip_book->book->book_name)}}</td>
                                <td>{{($loan_slip_book->book->book_code)}}</td>
                                <td>{{($loan_slip_book->book->author)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <p>Trang thai : {{$loan_slip->updated_at ? 'Da Tra' : 'Chua Tra'}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
