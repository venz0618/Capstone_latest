<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use App\Models\LoanApplication;
use App\Models\RegularSpecialLoanDetails;
use App\Models\MonthlyExpenses;
use App\Models\MonthlyIncome;
use Illuminate\Support\Facades\Auth;

class SpecialLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $loan = Member::join('users', 'users.id', '=', 'members.users_id')
                        ->join('membership_applications', 'membership_applications.id', '=', 'members.membership_application_id')
                        ->select('users.*', 'membership_applications.*', 'members.*')
                        ->where('users_id', '=', auth()->user()->id)
                        ->first();

        $edad = $loan['dob'];
        $years = Carbon::parse($edad)->age;

        return view('client.loan_application.special_loan.special-loan-application', compact(['loan', 'years']));
        }
        return view('client.loan_application.special_loan.special-loan-application');
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
        $applyloan = new LoanApplication();
        $applyloan->users_id = $request->member;
        $applyloan->loan_type = $request->application_type;
        $applyloan->save();

        $imageName = time().'.'.$request->scanned_signature->extension();
        $request->scanned_signature->move(public_path('sys_img'), $imageName);

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

        $exp                                            = new MonthlyExpenses();
        $exp->regular_special_loan_details_id           = $reg->id;
        $exp->scanned_signature                         = $imageName;
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
