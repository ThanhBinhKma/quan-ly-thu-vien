<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LoanSlip;
use App\Models\LoanSlipBook;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanSlipController extends Controller
{
    public function index()
    {
        $loan_slips = LoanSlip::all();
        return view('admin.loan_slips.index', ['loan_slips' => $loan_slips]);
    }

    public function update($id)
    {
        $ll = LoanSlip::where('id', $id)->first();
        $ll->updated_at = Carbon::now();
        $ll->save();
        return redirect()->route('admin.loan_slips.index');
    }

    public function delete($id)
    {
        LoanSlipBook::where('loan_slip_id', $id)->delete();
        LoanSlip::where('id', $id)->delete();
        return redirect()->route('admin.loan_slips.index');
    }

    public function create()
    {
        $books = Book::where('status', 1)->get();
        $users = User::where('role_id', '!=', 1)->get();
        return view('admin.loan_slips.create', ['books' => $books, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $loan_slip = new LoanSlip();
        $loan_slip->user_id = $request->user_id;
        $loan_slip->created_at = Carbon::now();
        $loan_slip->save();
        foreach ($request->book_id as $book_id) {
            $loan_slip_book = new LoanSlipBook();
            $loan_slip_book->loan_slip_id = $loan_slip->id;
            $loan_slip_book->book_id = $book_id;
            $loan_slip_book->save();
        }
        return redirect()->route('admin.loan_slips.index');
    }

    public function show($id)
    {
        $loan_slip = LoanSlip::find($id);
        $loan_slip_books = LoanSlipBook::where('loan_slip_id', $id)->get();
        return view('admin.loan_slips.show', ['loan_slip' => $loan_slip, 'loan_slip_books' => $loan_slip_books]);
    }

}
