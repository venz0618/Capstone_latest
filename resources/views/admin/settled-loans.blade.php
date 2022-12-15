@extends('admin.index')
@section('title', 'Loan')
@section('admin_content')

<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="table_section padding_infor_info">
            <div class="table-responsive-lg">
              <table class="table table-bordered table-striped table-sm" id="loan_application">
                  <thead>
                  <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Account No</th>
                      <th>Loan Type</th>
                      <th>Date Applied</th>
                      <th>Date Settled</th>
                      <th>Status</th>
                      {{-- <th>Action</th> --}}
                  </tr>
              </thead>
              <tbody>
  
              @foreach ($loan as $l)
              @if ($l->loan_status == 0)
              <tr>
                  <td>{{$l->last_name}}</td>
                  <td>{{ $l->first_name }}</td>
                  <td>{{ $l->acc_id }}</td>
                  <td>{{$l->TypeOfLoan}}</td>
                  <td>{{ date('m-d-Y h:i:s a', strtotime($l->DATE_APPLIED)) }}</td>
                  <td>{{ date('m-d-Y h:i:s a', strtotime($l->DATE_PRE_APPROVED)) }}</td>
  
                  <td>
                    <span class="badge badge-success">Settled</span>
                </td>
                {{-- <td> <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal{{ $l->LOAN_ID }}">View Details</button></td> --}}
              </tr>
              @endif
              @endforeach
  
              </tbody>
              </table>
  
          </div>
      </div>
      </div>
  </div>
  @endsection