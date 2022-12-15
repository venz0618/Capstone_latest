<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\ExpressLadLoanDetails;
use App\Models\RegularSpecialLoanDetails;
use App\Models\MonthlyExpenses;
use App\Models\MonthlyIncome;
use RealRashid\SweetAlert\Facades\Alert;

class ApplyLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_of_member'        => 'required|string',
            'account_no'            => 'required',
            'present_address'       => 'required',
            'permanent_address'     => 'required',
            'product_loan'          => 'required',
            'employer'              => 'required',
            'employer_address'      => 'required',
            'date_of_birth'         => 'required',
            'age'                   => 'required|numeric',
            'cellphone_no'          => 'required',
            'tin_no'                => 'required',
            'email_address'         => 'required',
            'facebook_account'      => 'required',
            'amount_applied'        => 'required|numeric',
            'term_applied'          => 'required|numeric',
            'mode_of_payment'       => 'required',
            'scanned_signature'     => 'required',

            'length_of_service' => 'required',
            'employment_status' => 'required',
            'present_position' => 'required',


        ]);


        $applyloan = new LoanApplication();
        $applyloan->members_id = $request->member;
        $applyloan->loan_type = $request->application_type;
        $applyloan->save();

        $imageName = time().'.'.$request->scanned_signature->extension();
        $request->scanned_signature->move(public_path('sys_img'), $imageName);

        if ($request->application_type === 'express' || $request->application_type === 'lad') {
            $express                            = new ExpressLadLoanDetails();
            $express->loan_applications_id      = $applyloan->id;
            $express->employer                  = $request->employer;
            $express->employer_address          = $request->employer_address;
            $express->amount_applied            = $request->amount_applied;
            $express->term_applied              = $request->term_applied;
            $express->mode_of_payment           = $request->mode_of_payment;
            $express->facebook_account          = $request->facebook_account;
            $express->scanned_signature         = $imageName;
            $express->product_loan              = $request->product_loan;
            $express->save();

            return redirect('loan-application');

        }elseif ($request->application_type === 'regular') {


            $reg                                = new RegularSpecialLoanDetails();
            $reg->loan_applications_id          = $applyloan->id;
            $reg->length_of_service             = $request->length_of_service;
            $reg->employment_status             = $request->employment_status;
            $reg->present_position              = $request->present_position;

            $reg->save();

            $income                                         = new MonthlyIncome();
            $income->regular_special_loan_details_id        = $reg->id;
            $income->product_loan                           = $request->product_loan;
            $income->borrower_income                        = $request->borrower_income;
            $income->other_income                           = $request->other_income;
            $income->spouse_income                          = $request->spouse_income;
            $income->amount_applied                         = $request->amount_applied;
            $income->term_applied                           = $request->term_applied;
            $income->mode_of_payment                        = $request->mode_of_payment;
            $income->save();

            $oraytz = time().'.'.$request->scanned_signature->extension();
            $request->scanned_signature->move(public_path('sys_img'), $oraytz);

            $exp                                            = new MonthlyExpenses();
            $exp->regular_special_loan_details_id           = $reg->id;
            $exp->scanned_signature                         = $oraytz;
            $exp->food                                      = $request->food;
            $exp->education_bill                            = $request->education_bill;
            $exp->electric_bill                             = $request->electric_bill;
            $exp->water_bill                                = $request->water_bill;
            $exp->transportation                            = $request->transportation;
            $exp->allowances                                = $request->allowances;
            $exp->others                                    = $request->others;
            $exp->save();


            return redirect('loan-application');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
