
@extends('backend.layouts.app')

@section('content')
    
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add category</li>
       
        
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">category</h5>

              <!-- Horizontal Form -->
               <form action="{{ route('store.service') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputServiceName" class="col-sm-2 col-form-label">Service Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="service_name" value="@isset($service){{ $service->service_name }}@endisset" class="form-control" id="inputServiceName" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputServiceDescription" class="col-sm-2 col-form-label">Service Description</label>
                        <div class="col-sm-10">
                            <textarea name="service_description" class="form-control" id="inputServiceDescription">@isset($service){{ $service->service_description }}@endisset</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control" id="inputCategory" required>
                                <!-- Assuming categories is passed from controller -->
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(isset($service) && $service->category_id == $category->id) selected @endif>{{ $category->categoryname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="price" step="0.01" value="@isset($service){{ $service->price }}@endisset" class="form-control" id="inputPrice" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputStartTime" class="col-sm-2 col-form-label">Start Time</label>
                        <div class="col-sm-10">
                            <input type="time" name="start_time" value="@isset($service){{ $service->start_time }}@endisset" class="form-control" id="inputStartTime" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEndTime" class="col-sm-2 col-form-label">End Time</label>
                        <div class="col-sm-10">
                            <input type="time" name="end_time" value="@isset($service){{ $service->end_time }}@endisset" class="form-control" id="inputEndTime" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDuration" class="col-sm-2 col-form-label">Duration (minutes)</label>
                        <div class="col-sm-10">
                            <select name="duration" class="form-control" id="inputDuration" required>
                                <option value="30" @if(isset($service) && $service->duration == 30) selected @endif>30 minutes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Available Days</label>
                      <div class="col-sm-10">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Monday" id="dayMonday">
                              <label class="form-check-label" for="dayMonday">Monday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Tuesday" id="dayTuesday">
                              <label class="form-check-label" for="dayTuesday">Tuesday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Wednesday" id="dayWednesday">
                              <label class="form-check-label" for="dayWednesday">Wednesday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Thursday" id="dayThursday">
                              <label class="form-check-label" for="dayThursday">Thursday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Friday" id="dayFriday">
                              <label class="form-check-label" for="dayFriday">Friday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Saturday" id="daySaturday">
                              <label class="form-check-label" for="daySaturday">Saturday</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="days[]" value="Sunday" id="daySunday">
                              <label class="form-check-label" for="daySunday">Sunday</label>
                          </div>
                      </div>
                  </div>
                    <div class="row mb-3">
                        <label for="inputAvailability" class="col-sm-2 col-form-label">Availability</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="availability" id="availability_yes" value="1" @if(isset($service) && $service->availability == 1) checked @endif>
                                <label class="form-check-label" for="availability_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="availability" id="availability_no" value="0" @if(isset($service) && $service->availability == 0) checked @endif>
                                <label class="form-check-label" for="availability_no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputImageUrl" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image_url" class="form-control" id="inputImageUrl">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
          </div>


@endsection