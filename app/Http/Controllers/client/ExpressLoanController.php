<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use App\Models\LoanApplication;
use App\Models\ExpressLadLoanDetails;
use Illuminate\Support\Facades\Auth;

class ExpressLoanController extends Controller
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

        return view('client.loan_application.express_loan.express-loan-application', compact(['loan', 'years']));
        }
        return view('client.loan_application.express_loan.express-loan-application');
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
        // $request->validate([
        //     'name_of_member'        => 'required|string',
        //     'account_no'            => 'required',
        //     'present_address'       => 'required',
        //     'permanent_address'     => 'required',
        //     'loan_type'             => 'required',
        //     'employer'              => 'required',
        //     'employer_address'      => 'required',
        //     'date_of_birth'         => 'required',
        //     'age'                   => 'required|numeric',
        //     'cellphone_no'          => 'required',
        //     'tin_no'                => 'required',
        //     'email_address'         => 'required',
        //     'facebook_account'      => 'required',
        //     'amount_applied'        => 'required|numeric',
        //     'term_applied'          => 'required|numeric',
        //     'mode_of_payment'       => 'required',
        //     'scanned_signature'     => 'required',
        // ]);

        // $loanApp = $request->all();

        // $pikshurSaPerma = time().$request->file('scanned_signature')->getClientOriginalName();
        // $path = $request->file('scanned_signature')->storeAs('image', $pikshurSaPerma, 'public');
        // $loanApp["scanned_signature"] = '/storage/'.$path;

        // LoanApplication::create($loanApp);

        // return back()->with('success', 'Application Successfully Sent!');

        $applyloan = new LoanApplication();
        $applyloan->users_id = $request->member;
        $applyloan->loan_type = $request->application_type;
        $applyloan->save();

        $imageName = time().'.'.$request->scanned_signature->extension();
        $request->scanned_signature->move(public_path('sys_img'), $imageName);

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
