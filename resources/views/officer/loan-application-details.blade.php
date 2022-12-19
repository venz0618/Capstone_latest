@extends('officer.index')
@section('title', 'Loan Application Details')
@section('officer_content')

{{-- <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="card">
            <div class="card-header ">
                <h3>
                    @if ($loan->TypeOfLoan === 'lad' || $loan->TypeOfLoan === 'express')
                        Loan Against Deposit
                    @endif
                </h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div> --}}

<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column4 graph">
            <div class="col-md-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <a href="/officer/loan"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="full gallery_section_inner padding_infor_info">
                        <div class="margin_bottom_30">
                            <h3>
                                @if ($loan->TypeOfLoan === 'lad')
                                    Loan Against Deposit Application
                                @elseif ($loan->TypeOfLoan === 'express')
                                    Express Loan Application
                                @endif
                            </h3>
                        </div>
                        <div class="row margin_bottom_30">
                            <div class="col-sm-6 col-md-6 col-lg-12">
                                {{-- {{ $loan }} --}}
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <small>Member's Name</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->last_name) }}, {{ ucwords($loan->first_name) }} {{ ucwords($loan->middle_name) }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Member's Name</small>
                                    <input type="text" class="form-control" disabled value="{{ ucwords($loan->acc_id) }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Loan Type</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->TypeOfLoan) }} Loan">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <small>Present Address</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->address) }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <small>Permanent Address</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->address) }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <small>Employer</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->exp_emp) }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <small>Employer Address</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->exp_emp_add) }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Date of Birth</small>
                                    <input type="text" class="form-control" value="{{$loan->dob }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Email</small>
                                    <input type="text" class="form-control" value="{{ $loan->email }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Contact No.</small>
                                    <input type="text" class="form-control" value="{{ $loan->contact_number }}">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <small>Tax Identification Number</small>
                                    <input type="text" class="form-control" value="{{ $loan->TIN }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <small>Amount Applied</small>
                                    <input type="text" class="form-control" value="&#8369; {{ number_format(($loan->exp_aa), 2, '.', ',') }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <small>Term Applied</small>
                                    <input type="text" class="form-control" value="{{ $loan->exp_ta > 1 ? $loan->exp_ta . ' months' : $loan->exp_ta . ' month' }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <small>Mode Of Payment</small>
                                    <input type="text" class="form-control" value="{{ ucwords($loan->exp_mop) }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="margin_bottom_30">
                            <div class="margin_bottom_30">
                                <h3>Active Loans</h3>
                            </div>
                            <table class="table table-bordered table-striped" id="loan_application_details">
                                <thead>
                                    <tr>
                                        <th>Loan Type</th>
                                        <th>Product Loan</th>
                                        <th>Amount Applied</th>
                                        <th>Term Applied</th>
                                        <th>Date Approved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $a)
                                        <tr>
                                            <td>{{ strtoupper($a->TypeOfLoan) }} Loan</td>
                                            <td>
                                                @if ($a->TypeOfLoan == 'express')
                                                    {{ $a->LOAN }}
                                                @elseif ($a->TypeOfLoan == 'lad')
                                                    {{ ucwords($a->LOAN) }} Loan
                                                @elseif ($a->TypeOfLoan == 'regular' || $a->TypeOfLoan == 'special')
                                                    {{ ucwords($a->LOAN2) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($a->TypeOfLoan == 'express' || $a->TypeOfLoan == 'lad')
                                                    &#8369; {{ number_format(($a->AMOUNT), 2, '.', ',') }}
                                                @elseif ($a->TypeOfLoan == 'regular' || $a->TypeOfLoan == 'special')
                                                    &#8369; {{ number_format(($a->AMOUNT2), 2, '.', ',') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($a->TypeOfLoan == 'express' || $a->TypeOfLoan == 'lad')
                                                    {{ $a->TERM > 1 ? $a->TERM . ' months' : $a->TERM . ' month' }}
                                                @elseif ($a->TypeOfLoan == 'regular' || $a->TypeOfLoan == 'special')
                                                    {{ $a->TERM2 > 1 ? $a->TERM2 . ' months' : $a->TERM2 . ' month' }}
                                                @endif
                                            </td>
                                            <td>{{ date('m-d-Y h:i:s a', strtotime($a->DATE_APPROVED)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <form action="{{ route('loan-application-details.update', $loan->LOAN_ID) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn cur-p btn-success" name="pre-approve" value="Pre-Approved">
                            <input type="submit" class="btn cur-p btn-danger" name="decline" value="Decline">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
 </div>

@endsection
