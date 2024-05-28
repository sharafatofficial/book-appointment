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
      @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
      <div class="col-lg-10">
      
      <form method="POST" action="{{url('bank_transaction/'.$checkout->id)}}">
                                @csrf
          <input type="hidden" name="service_id" value="{{$checkout->id}}">
          <input type="hidden" name="provider_id" value="{{$checkout->user_id}}">
          <div class="">
              <label for="service_id">Service</label>
              <input type="text" name="service_name"  value="{{$checkout->service_name}}" id="appointmentdate" class="form-control" readonly>
              
          </div>

          <div class="">
              <label for="appointmentdate">Appointment Date</label>
              <input type="date" name="date" id="appointmentdate" value="{{$checkout->date}}" class="form-control" readonly>
          </div>

          <div class="">
              <label for="duration">Time</label>
              <input type="text" name="time" value="{{$checkout->time}}"  class="form-control" readonly>
          </div>

          <div class="">
              <label for="duration">Day</label>
              <input type="text" name="day" value="{{$checkout->day}}"  class="form-control" readonly>
          </div>

          <div class="">
              <label for="price">Price</label>
              <input type="number" step="0.01" name="price" value="{{$checkout->price}}"  id="price" class="form-control" readonly>
          </div>
          <div class="">
              <label for="price">Bank name</label>
              <input type="text" step="0.01" name="bank"   id="price" class="form-control" required>
          </div>
          <div class="">
              <label for="price">Account number</label>
              <input type="text" step="0.01" name="account_no"  id="price" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary mt-2 col-12">Pay now</button>

      </form>
        
               
      </div>
    </div>
  </div>
</section>
@endsection