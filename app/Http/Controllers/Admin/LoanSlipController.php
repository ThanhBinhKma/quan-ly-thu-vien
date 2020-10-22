<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanSlip;
use App\Models\LoanSlipBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanSlipController extends Controller
{
    public function index()
    {
        $loan_slips = LoanSlip::all();
        return view('admin.loan_slips.index', ['loan_slips' => $loan_slips]);
    }

    public function update($id)
    {
        $ll= LoanSlip::where('id',$id)->first();
        $ll->updated_at = Carbon::now();
        $ll->save();
        return redirect()->route('admin.loan_slips.index');
    }

    public function delete($id)
    {
        LoanSlipBook::where('loan_slip_id',$id)->delete();
        LoanSlip::where('id',$id)->delete();
        return redirect()->route('admin.loan_slips.index');
    }
}
