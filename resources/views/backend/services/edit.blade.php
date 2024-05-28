
@extends('backend.layouts.app')

@section('content')
    

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Update category</li>
       
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">category</h5>
              @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
              <!-- Horizontal Form -->
              <form action="{{ isset($service) ? route('edit.service', $service->id) : route('store.service') }}" enctype="multipart/form-data" method="POST">
            @csrf
      
            <div class="row mb-3">
                <label for="inputServiceName" class="col-sm-2 col-form-label">Service Name</label>
                <div class="col-sm-10">
                    <input type="text" name="service_name" value="{{ old('service_name', $service->service_name ?? '') }}" class="form-control" id="inputServiceName" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputServiceDescription" class="col-sm-2 col-form-label">Service Description</label>
                <div class="col-sm-10">
                    <textarea name="service_description" class="form-control" id="inputServiceDescription">{{ old('service_description', $service->service_description ?? '') }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control" id="inputCategory" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id', $service->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->categoryname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" step="0.01" value="{{ old('price', $service->price ?? '') }}" class="form-control" id="inputPrice" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputStartTime" class="col-sm-2 col-form-label">Start Time</label>
                <div class="col-sm-10">
                    <input type="time" name="start_time" value="{{ old('start_time', $service->start_time ?? '') }}" class="form-control" id="inputStartTime" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEndTime" class="col-sm-2 col-form-label">End Time</label>
                <div class="col-sm-10">
                    <input type="time" name="end_time" value="{{ old('end_time', $service->end_time ?? '') }}" class="form-control" id="inputEndTime" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputDuration" class="col-sm-2 col-form-label">Duration (minutes)</label>
                <div class="col-sm-10">
                    <select name="duration" class="form-control" id="inputDuration" required>
                        <option value="30" {{ (old('duration', $service->duration ?? '') == 30) ? 'selected' : '' }}>30 minutes</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Available Days</label>
                <div class="col-sm-10">
                    @php
                        $selectedDays = old('days', isset($service) ? explode(',', $service->days) : []);
                    @endphp
                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="days[]" value="{{ $day }}" id="day{{ $day }}" {{ in_array($day, $selectedDays) ? 'checked' : '' }}>
                            <label class="form-check-label" for="day{{ $day }}">{{ $day }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputAvailability" class="col-sm-2 col-form-label">Availability</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability_yes" value="1" {{ (old('availability', $service->availability ?? '') == 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="availability_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability_no" value="0" {{ (old('availability', $service->availability ?? '') == 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="availability_no">No</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputImageUrl" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image_url" class="form-control" id="inputImageUrl">
                    <img src="{{ asset('images/'.$service->image_url) }}" alt="Service Image" height="100" width="100">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

            </div>
          </div>


@endsection