<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LoanSlip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $status = LoanSlip::where('user_id',Auth::user()->id)->whereNull('updated_at')->first();
        $statusLoan = true;
        if($status)
        {
            $statusLoan = false;
        }
        return view('user.book.index',['books' => $books,'status' => $statusLoan]);
    }
}
