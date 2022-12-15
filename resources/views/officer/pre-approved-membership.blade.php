@extends('officer.index')
@section('title', 'Membership')
@section('officer_content')

<table class="table table-striped" id="example2">
	<thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Unit</th>
      <th>Membership Type</th>
      <th>Date Applied</th>
      <th>Date Pre-approved</th>
      <!-- <th>Officer</th> -->
      <th>Status</th>
      {{-- <th>Actions</th> --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($membership as $m)
        <tr>
        <td>{{ $m->first_name }}</td>
        <td>{{ $m->last_name }}</td>
        <td>{{ $m->unit }}</td>
        <td>
          @if ($m->membership_type == 0)
            <span class="badge badge-info">Online</span>
          @else
            <span class="badge badge-info">Walk-in</span>
          @endif
        </td>
        <td>{{ date('m-d-Y h:i a', strtotime($m->created_at)) }}</td>
        <td>{{ date('m-d-Y h:i a', strtotime($m->updated_at)) }}</td>
        <!-- <td>{{ $m->assigned_officer }}</td> -->
        <td>
            <span class="badge badge-primary">Pre-approved</span>
        </td>
        {{-- <td>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal{{ $m->id }}">Details</button>
        </td> --}}
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
