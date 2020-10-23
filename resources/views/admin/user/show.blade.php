@extends('home.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        {{$user->name}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><b>Name</b></div>
                            <div class="col-md-6 offset-2">{{$user->name}}</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><b>Position</b></div>
                            <div class="col-md-6 offset-2">
                                @if($user->role_id ==0)
                                    Student
                                @else
                                    Teacher
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><b>Status</b></div>
                            <div class="col-md-6 offset-2">
                                @if($status)
                                    Normal
                                @else
                                    Borrowing
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
