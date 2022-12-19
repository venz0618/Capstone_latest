@extends('officer.index')
@section('title', 'Loan Application List')
@section('officer_content')

<div class="midde_cont">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="loan_application">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Account No</th>
                                <th>Loan Type</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loan as $l)
                                @if ($l->LS == 0)
                                    <tr>
                                        <td>{{ ucwords($l->last_name) }}</td>
                                        <td>{{ ucwords($l->first_name) }}</td>
                                        <td>{{ $l->acc_id }}</td>
                                        <td>{{ ucwords($l->TypeOfLoan) }}</td>
                                        <td>{{ date('m-d-Y h:i:s a', strtotime($l->DATE_APPLIED)) }}</td>

                                        <td>
                                        @if($l->LS == 0)
                                            <span class="badge badge-secondary">Pending</span>
                                        @endif
                                        </td>
                                        <td>
                                        <a class="btn cur-p btn-success" href="{{ route('loan-application-details.show', $l->LOAN_ID) }}" data-toggle="tooltip" data-placement="bottom" title="View Loan Application Details"><i class="fa fa-eye"></i></a>
                                        {{-- <button type="button" class="btn cur-p btn-success" data-toggle="modal" data-target="#myModal{{ $l->LOAN_ID }}">View Details</button> --}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($loan as $l)
    @if ($l->TypeOfLoan === 'express' || $l->TypeOfLoan === 'lad')
        <div class="modal fade" id="myModal{{ $l->LOAN_ID }}">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
           <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">CASALCO Loan Application Form</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Modal body -->
              <form action="{{ route('loan.update', $l->LOAN_ID) }}" method="POST">
                  @csrf

                  @method('PUT')
                  <input type="hidden" value="1" name="is_approved">
                    <div class="modal-body">
                      <h4>{{ ucwords($l->TypeOfLoan) }} Loan</h4>

                      <input  type="hidden" value="1" name="loanApp_type">

                      <div class="border border-danger"></div>
                      <div class="row pt-3">
                        <div class="col-lg-8">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Member's Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ ucwords($l->last_name) }}, {{ ucwords($l->first_name) }} {{ ucwords($l->middle_name) }}" >
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Account ID</label>
                            <input type="text" class="form-control" name="acc_id" placeholder="Account ID" disabled value="{{ $l->acc_id }}">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Present Address</label>
                            <input type="text" class="form-control" name="present_address" placeholder="Present Address" value="{{$l->address}}" >
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address" value="{{$l->address}}">
                          </div>
                      </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Employer</label>
                            <input type="text" class="form-control" name="emp" placeholder="Employee" value="{{$l->exp_emp}}">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Employee Address</label>
                            <input type="text" class="form-control" name="emp_address" placeholder="Employee Address" value="{{$l->exp_emp_add}}" >
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label for="First Name" class="form-label">Loan Type</label>
                              <input type="text" class="form-control" name="loan_type" placeholder="Loan Type" value="{{ $l->express_loan }}">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label for="" class="form-label">Date of Birth</label>
                              <input type="text" class="form-control" name="dob" placeholder="Date of Birth" value="{{ $l->dob }}">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$l->email}}" >
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="Amount" value="{{$l->exp_aa}}">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Mode of Payment</label>
                            <input type="text" class="form-control" name="mode_payment" placeholder="Mode of Payment" value="{{$l->exp_mop}}"">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Term Applied</label>
                            <input type="text" class="form-control" name="term_applied" placeholder="Term Applied" value="{{ $l->exp_ta }}">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">Phone No.</label>
                            <input type="text" class="form-control" name="phone_no" placeholder="Phone No." value="{{$l->contact_number}}">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                          <label for="First Name" class="form-label">TIN</label>
                            <input type="text" class="form-control" name="tin" placeholder="TIN" value="{{$l->TIN}}" >
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mb-4 mt-4">Pre-Approved</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                    </div>
                </form>
              </div>
           </div>
        </div>
      </div>
      @elseif ($l->TypeOfLoan === 'regular' || $l->TypeOfLoan === 'special')
      <div class="modal fade" id="myModal{{ $l->LOAN_ID }}">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
           <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">CASALCO Loan Application Form</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Modal body -->
              <form action="{{ route('loan.update', $l->LOAN_ID) }}" method="POST">
                  @csrf

                  @method('PUT')
                  <input type="hidden" value="1" name="is_approved">
              <div class="modal-body">
                <h4>{{ ucwords($l->TypeOfLoan) }} Loan</h4>

                <input  type="hidden" value="1" name="loanApp_type">

                <div class="border border-danger"></div>
                <div class="row pt-3">
                  <div class="col-lg-8">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Member's Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name" value="{{ ucwords($l->last_name) }}, {{ ucwords($l->first_name) }} {{ ucwords($l->middle_name) }}" >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Account ID</label>
                      <input type="text" class="form-control" name="acc_id" placeholder="Account ID" disabled value="{{ $l->acc_id }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Present Address</label>
                      <input type="text" class="form-control" name="present_address" placeholder="Present Address" value="{{$l->address}}" >
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Permanent Address</label>
                      <input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address" value="{{$l->address}}">
                    </div>
                    </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" name="dob" placeholder="Date of Birth" value="{{ $l->dob }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Email" value="{{$l->email}}" >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="First Name" class="form-label">Phone No.</label>
                      <input type="text" class="form-control" name="phone_no" placeholder="Phone No." value="{{$l->contact_number}}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label for="First Name" class="form-label">TIN</label>
                        <input type="text" class="form-control" name="tin" placeholder="TIN" value="{{$l->TIN}}" >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <label for="" class="form-label">Length of Service</label>
                    <input type="text" class="form-control" value="{{ $l->los }}">
                  </div>
                  <div class="col-lg-4">
                    <label for="" class="form-label">Employment Status</label>
                    <input type="text" class="form-control" value="{{ $l->es }}">
                  </div>
                  <div class="col-lg-4">
                    <label for="" class="form-label">Present Position</label>
                    <input type="text" class="form-control" value="{{ $l->pp }}">
                  </div>
                  <div class="col-lg-4">
                    <label for="" class="form-label">Occupation</label>
                    <input type="text" class="form-control" value="{{ $l->Occu }}">
                  </div>
                  <div class="col-lg-12">
                    <br>
                    <h4>Credit Assessment List</h4>
                    <div class="border border-danger"></div>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <h4>Monthly Expenses</h4>
                    <div class="form-group">
                        <label for="" class="form-label">Borrower Income</label>
                        <input type="text" class="form-control" value="{{ $l->bi }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Other Income</label>
                        <input type="text" class="form-control" value="{{ $l->oi }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Spouse Income</label>
                        <input type="text" class="form-control" value="{{ $l->si }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Type of Loan Applied</label>
                        <input type="text" class="form-control" value="{{ $l->prod_l }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Amount Applied</label>
                        <input type="text" class="form-control" value="{{ $l->am_ap }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Term Applied</label>
                        <input type="text" class="form-control" value="{{ $l->term_ap }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Mode of Payment</label>
                        <input type="text" class="form-control" value="{{ $l->mode_op }}">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <br>
                    <h4>Monthly Income</h4>
                    <div class="form-group">
                        <label for="" class="form-label">Food & Subsistence</label>
                        <input type="text" class="form-control" value="{{ $l->food }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Education Bill</label>
                        <input type="text" class="form-control" value="{{ $l->eb }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Electric Bill</label>
                        <input type="text" class="form-control" value="{{ $l->elb }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Water Bill</label>
                        <input type="text" class="form-control" value="{{ $l->wb }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Transportation</label>
                        <input type="text" class="form-control" value="{{ $l->trans }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Allowances</label>
                        <input type="text" class="form-control" value="{{ $l->allow }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Others</label>
                        <input type="text" class="form-control" value="{{ $l->others }}">
                    </div>
                </div>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success mb-4 mt-4">Pre-Approved</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                </form>
              </div>
           </div>
        </div>
      </div>
    @endif
@endforeach



@endsection
