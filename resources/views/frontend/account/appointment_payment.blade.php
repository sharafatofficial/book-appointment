@php 
use Carbon\Carbon;
@endphp
@extends('frontend.layouts.app')
@section('content')


<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 mb-4">
        <h1 class="h2 mb-4">Appointment
          <mark>Payments</mark>
        </h1>
      </div>
      <div class="col-lg-10">
      
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
              <a href="{{url('payment/'.$appoint->id)}}" class="btn btn-outline-primary">payment</a>
            </div>
          </div>
        </article>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection