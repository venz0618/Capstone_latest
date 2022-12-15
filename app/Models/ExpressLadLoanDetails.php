<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressLadLoanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_loan',
        'employer' ,
        'employer_address',
        'amount_applied',
        'term_applied',
        'mode_of_payment',
        'facebook_account',
        'scanned_signature',
        'loan_application_id'
    ];

    // /**
    //  * Get the user that owns the ExpressLadLoanDetails
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function loan_app(): BelongsTo
    // {
    //     return $this->belongsTo(App\Model\LoanApplication::class, 'loan_applications_id', 'id');
    // }


    public function loan(){
        return $this->belongsTo(LoanApplication::class);
}
}
