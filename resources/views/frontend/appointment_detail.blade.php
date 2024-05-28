@php 
use Carbon\Carbon;
@endphp
@extends('frontend.layouts.app')
@section('content')
<div class="container mt-5">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3 col-md-12 border border-primary mt-5">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h3 class="card-title text-center pb-0 fs-4">Create Appointment</h3>
                                <p class="text-center">Fill in the details to create an appointment</p>
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

                            <form method="POST" action="{{url('appointment_store')}}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{$service_detail->id}}">
                                <input type="hidden" name="provider_id" value="{{$service_detail->user_id}}">
                                <div class="">
                                    <label for="service_id">Service</label>
                                    <input type="text" name="service_name"  value="{{$service_detail->service_name}}" id="appointmentdate" class="form-control" required>
                                    
                                </div>

                                <div class="">
                                    <label for="appointmentdate">Appointment Date</label>
                                    <input type="date" name="date" id="appointmentdate" class="form-control" required>
                                </div>

                                <div class="">
                                    <label for="duration">Duration (minutes)</label>
                                    <input type="number" name="duration" value="{{$service_detail->duration}}" id="duration" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="available_days">Available Days</label>
                                    <div id="available_days">
                                        @foreach ($serviceDays as $day)
                                            <div class="form-check">
                                                <input type="radio" name="day" value="{{ $day }}" class="form-check-input" id="day_{{ $day }}">
                                                <label for="day_{{ $day }}" class="form-check-label">{{ ucfirst($day) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="">
                                    <label for="time_slot">Select Time Slot</label>
                                    <select id="time_slot" name="time" class="form-control">
                                        <option value="" selected disabled>Select a time slot</option>
                                        @foreach ($timeSlots as $time)
                                            <option value="{{ $time }}">{{ $time }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label for="price">Price</label>
                                    <input type="number" step="0.01" name="price" value="{{$service_detail->price}}"  id="price" class="form-control" required>
                                </div>
                                <div class="">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" id="notes" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 col-12">Create Appointment</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection