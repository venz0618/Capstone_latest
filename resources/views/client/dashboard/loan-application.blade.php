@extends('client.dashboard.index')
@section('title', 'Loan Application')
@section('client_dashboard_content')


<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd margin_bottom_30">
                    <div class="table_section padding_infor_info">
                        <table class="table" id="loan_application">
                            <thead>
                                <tr>
                                    <th>Loan Type</th>
                                    <th>Date Applied</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loan as $l)



                                    <tr>
                                        <td>{{ ucwords($l->loan_type) }}</td>
                                        <td>{{ date('m-d-Y, h:s:i ', strtotime($l->created_at)) }}</td>
                                        <td>
                                            @if ($l->loan_status === 0)
                                                <span class="badge badge-secondary">Pending</span>
                                            @elseif($l->loan_status === 1)
                                                <span class="badge badge-info">Pre-approved</span>
                                            @elseif($l->loan_status === 2)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($l->loan_status === 5)
                                                <span class="badge badge-danger">Declined</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($l->loan_type == 'express' || $l->loan_type == 'lad' )
                                            <a href="{{ route('express_partial_amort.show', $l->id) }}">
                                                <button class="btn btn-success">Details</button>
                                              </a>
                                            @elseif ($l->loan_type == 'regular' || $l->loan_type == 'special' )
                                            <a href="{{ route('regular_special_partial_amort.show', $l->id) }}">
                                                <button class="btn btn-success">Details</button>
                                              </a>
                                            @endif

                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
