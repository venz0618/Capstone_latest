<?php

namespace App\Http\Controllers\admin;
use App\Models\ExpressLoanApp;
use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ApproveLoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan  = LoanApplication::leftJoin('users','loan_applications.users_id', '=', 'users.id')
        ->leftJoin('members', 'members.users_id', '=', 'users.id')
        ->leftJoin('membership_applications', 'members.membership_application_id', '=', 'membership_applications.id')
        ->leftJoin('spouses', 'spouses.membership_application_id', '=', 'membership_applications.id')
        ->leftJoin('beneficiaries', 'beneficiaries.membership_application_id', '=', 'membership_applications.id')
        ->leftJoin('express_lad_loan_details', 'express_lad_loan_details.loan_applications_id', '=', 'loan_applications.id')
        ->leftJoin('regular_special_loan_details', 'regular_special_loan_details.loan_applications_id', '=', 'loan_applications.id')
        ->leftJoin('monthly_expenses', 'monthly_expenses.regular_special_loan_details_id', '=', 'regular_special_loan_details.id')
        ->leftJoin('monthly_incomes', 'monthly_incomes.regular_special_loan_details_id', '=', 'regular_special_loan_details.id')
        ->select(
            'loan_applications.id as LOAN_ID',
            'loan_applications.loan_type as TypeOfLoan',
            'loan_applications.created_at as DATE_APPLIED',
            'loan_applications.updated_at as DATE_PRE_APPROVED',

            'users.*',

            'members.*',

            'membership_applications.*',

            'spouses.*', 'beneficiaries.*',

            'express_lad_loan_details.id as express_id',
            'express_lad_loan_details.term_applied as exp_ta',
            'express_lad_loan_details.amount_applied as exp_aa',
            'express_lad_loan_details.mode_of_payment as exp_mop',
            'express_lad_loan_details.employer_address as exp_emp_add',
            'express_lad_loan_details.employer as exp_emp',
            'express_lad_loan_details.product_loan as express_loan',

            'regular_special_loan_details.length_of_service as los',
            'regular_special_loan_details.employment_status as es',
            'regular_special_loan_details..present_position as pp',

            'monthly_incomes.borrower_income as bi',
            'monthly_incomes.other_income as oi',
            'monthly_incomes.spouse_income as si',
            'monthly_incomes.amount_applied as am_ap',
            'monthly_incomes.term_applied as term_ap',
            'monthly_incomes.mode_of_payment as mode_op',

            'monthly_expenses.scanned_signature as sc',
            'monthly_expenses.food as food',
            'monthly_expenses.education_bill as eb',
            'monthly_expenses.electric_bill as elb',
            'monthly_expenses.water_bill as wb',
            'monthly_expenses.transportation as trans',
            'monthly_expenses.allowances as allow',
            'monthly_expenses.others as others',
            'monthly_incomes.product_loan as prod_l',
            )
        ->where('loan_status', '=', 1)
        ->get();
        // $loan = DB::table(DB::raw('loan_applications , members'))
        //         ->LeftJoin('membership_applications', 'members.membership_application_id','=', 'membership_applications.id')
        //         ->select('loan_applications.*', 'members.*','membership_applications.*')
        //         ->where('loan_status', '=', 1)
        //         ->get();

        
        return view('admin.loan_app', compact('loan'));
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
        //
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
        $loan = LoanApplication::find($id);
        return view('officer.loan', compact('loan'));
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
        $loan = LoanApplication::find($id);
        $loan->loan_status = $request->loan_status;
        // $loan->acc_id = $request->acc_id;
        // $loan->or_no = $request->or_no;
        $loan->save();

        return redirect('admin/approved-loans');
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
