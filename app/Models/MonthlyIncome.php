<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyIncome extends Model
{
    use HasFactory;

    protected $fillable = [
        'regular_special_loan_details_id',
        'product_loan',
        'borrower_income',
        'other_income',
        'spouse_income',
        'amount_applied',
        'term_applied',
        'mode_of_payment'
    ];

    public function regular(){
        return $this->belongsTo(RegularSpecialLoanDetails::class);
}
}
