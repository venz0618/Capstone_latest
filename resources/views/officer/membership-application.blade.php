@extends('officer.index')
@section('title', 'Membership Application List')
@section('officer_content')

      <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- table section -->
                <div class="col-md-12">
                    <div class="white_shd margin_bottom_50">
                        <div class="table_section padding_infor_info">
                            <table class="table" id="loan_application">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Unit</th>
                                        
                                        <th>Membership Type</th>
                                        <th>Date Applied</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($membership as $m)
                                  <tr>
                                  <td>{{ $m->first_name }}</td>
                                  <td>{{ $m->middle_name }}</td>
                                  <td>{{ $m->unit }}</td>
                                  {{-- <td>
                                    <img src="{{ asset($m->selfiepic) }}" width = '50' height = '50' class = "img img-responsive" />
                                  </td> --}}
                                  <td>
                                    @if ($m->membership_type == 0)
                                      <span class="badge badge-info">Online</span>
                                    @else
                                      <span class="badge badge-info">Walk-in</span>
                                    @endif
                                  </td>
                                  <td>{{ date('m-d-Y h:i a', strtotime($m->created_at)) }}</td>
                                  <td>
                                      @if($m->is_approved == 0)
                                        <span class="badge badge-secondary">Pending</span>
                                      @endif
                                  </td>
            
                                  <td>
                                    <a href="{{ route('membership_info.show', $m->id) }}">
                                      <button class="btn btn-success">Details</button>
                                    </a>
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
