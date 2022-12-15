<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyExpenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'regular_special_loan_details_id',
        'scanned_signature',
        'food',
        'education_bill',
        'electric_bill',
        'water_bill',
        'transportation',
        'allowances',
        'others'
    ];

    public function regular(){
        return $this->belongsTo(RegularSpecialLoanDetails::class);
}
}
