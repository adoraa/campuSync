@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Reports</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
    
    <!-- click button -->
    <a href="{{ route('complaint.create') }}" class="btn btn-primary">New</a><br/><br/>

    <!-- data tables -->
    <div class="data-tables">
        <div class="row">
          <div class="col-lg-12 mb-4">
            <div class="card card_border p-4">
              <h3 class="card__title position-absolute">All Reports</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nature of Job</th>
                      <th>Utility</th>
                      <th>Description</th>
                      <th></th>
                      <th></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($complaints as $complaint)
                      <tr>
                          
                        <td>{{ $complaint->job->name }}</td>  
                        <td>{{ $complaint->utility->name }}</td>
                        <td>{{ $complaint->description }}</td>
                        @if ($complaint->head_of_user == null)
                          <td><a href="{{ route('complaint.edit', $complaint->id) }}">Edit</a></td>
                          <td><form action="{{ route('complaint.destroy', $complaint->id) }}" method="POST">@method('delete') @csrf <button type="submit"> <i class="material-icons">delete</i></button></form></td>
                          @elseif ($complaint->review != null)
                          <td><a href="{{ route('view_review', $complaint->id) }}" class="btn btn-sm btn-primary">View Review</a></td>
                        @elseif ($complaint->time_job_completed != null)
                          <td><a href="{{ route('review', $complaint->id) }}" class="btn btn-sm btn-primary">Leave Review</a></td>
                        
                        @else
                          <td><a href="{{ route('complaint.track', $complaint->id) }}" class="btn btn-sm btn-primary">Track</a></td>
                        @endif
                    
                      </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection