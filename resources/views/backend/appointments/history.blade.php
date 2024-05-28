
@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">history</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Delivered Appointment</h5>

              <!-- Default Table -->
              @foreach($appointment as $appoint)
        <article class="card mb-4">
          <div class="row card-body">
            <div class="col-12">
              <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{$appoint->service_name}}</a></h3>
              <ul class="card-meta list-inline">
                <li class="list-inline-item">
                </li>
                <li class="list-inline-item">
                  <i class="ti-timer"></i>{{$appoint->time}}
                </li>
                <li class="list-inline-item">
                  <i class="ti-calendar"></i>{{$appoint->date}}
                </li>
                <li class="list-inline-item">
                  <ul class="card-meta-tag list-inline">
                    <li class="list-inline-item">{{$appoint->day}}</li>
                  </ul>
                </li>
              </ul>
              <p>{{$appoint->notes}}</p>
              
            </div>
          </div>
        </article>
        @endforeach
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection