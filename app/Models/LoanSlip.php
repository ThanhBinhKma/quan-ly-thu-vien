<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSlip extends Model
{
    protected $table = 'loan_slips';
    public $timestamps = false;
    public function book()
    {
        return $this->hasOne('App\Models\Book','id','book_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
