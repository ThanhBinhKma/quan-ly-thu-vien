<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSlipBook extends Model
{
    protected $table = 'loan_slip_books';

    public function book()
    {
       return $this->hasOne('App\Models\Book', 'id', 'book_id');
    }
}
