<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\Member;
class ActiveLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $express = Member::join('users', 'users.id', '=', 'members.users_id')
        // ->join('membership_applications', 'membership_applications.id', '=', 'members.membership_application_id')
        // ->select('users.*', 'membership_applications.*')
        // ->where('users_id', '=', auth()->user()->id)
        // ->first();

        // $acc_id = $express['acc_id'];
        // $loan = LoanApplication::where('account_no', $acc_id)->get();
        $loan = LoanApplication::where('users_id', auth()->user()->id)
        ->where('loan_status', 2)
        ->get();
        return view('client.dashboard.active-loan', compact('loan'));
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
        return view('client.dashboard.active-loan', compact('loan'));
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
