<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LoanSlip;
use App\Models\LoanSlipBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanSlipController extends Controller
{
    public function create()
    {
        $books = Book::all();
        return view('user.loan_slip.create', ['books' => $books]);
    }

    public function store(Request $request)
    {
        $loan_slip = new LoanSlip();
        $loan_slip->user_id = Auth::user()->id;
        $loan_slip->created_at = Carbon::now();
        $loan_slip->save();
        foreach ($request->book_id as $book_id) {
            $loan_slip_book = new LoanSlipBook();
            $loan_slip_book->loan_slip_id = $loan_slip->id;
            $loan_slip_book->book_id = $book_id;
            $loan_slip_book->save();
        }
        return redirect()->route('user.loan_slips.index');
    }

    public function index()
    {
        $loan_slips = LoanSlip::where('user_id', Auth::user()->id)->get();
        return view('user.loan_slip.index', ['loan_slips' => $loan_slips]);
    }

    public function show($id)
    {
        $loan_slip_books = LoanSlipBook::where('loan_slip_id',$id)->get();
        $loan_slip = LoanSlip::find($id);
        return view('user.loan_slip.show', ['loan_slip_books' => $loan_slip_books,'loan_slip' => $loan_slip]);
    }
}
