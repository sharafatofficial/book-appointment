
@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">View service</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>

              <!-- Default Table -->
              <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Days</th>
                            <th scope="col">Availability</th>  
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->service_description }}</td>
                            <td>{{ $service->category->categoryname }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->duration }} minutes</td>
                            <td>{{ $service->start_time }} </td>
                            <td>{{ $service->end_time }} </td>
                            <td>{{ $service->days}} </td>
                            <td>{{ $service->availability ? 'Yes' : 'No' }}</td>

                            <td>
                                @if($service->image_url)
                                    <img src="{{ asset('images/'.$service->image_url) }}" alt="Service Image" height="100" width="100">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('update.service', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('delete.service', $service->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection