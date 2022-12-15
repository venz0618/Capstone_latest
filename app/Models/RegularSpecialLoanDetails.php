<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularSpecialLoanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_applications_id',
        'length_of_service',
        'employment_status',
        'present_position',
    ];

    // public function loan_apps()
    // {
    //     return $this->belongsTo(App\Model\LoanApplication::class, 'loan_applications_id', 'id');
    // }

    public function loan(){
        return $this->belongsTo(LoanApplication::class, 'loan_applications_id');
    }
    public function monthlyE(){
        return $this->hasOne(MonthlyExpenses::class,'regular_special_loan_details_id');

    }
    public function monthlyI(){
        return $this->hasOne(MonthlyIncome::class,'regular_special_loan_details_id');
    }

}
