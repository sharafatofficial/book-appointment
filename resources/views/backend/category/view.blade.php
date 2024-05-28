
@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">View Category</li>
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
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($category as $mypost)
                  <tr>
                    <th scope="row">{{$mypost->id}}</th>
                    <td>{{$mypost->categoryname}}</td>
                    <td>{{$mypost->categorydescription}}</td>
                    <td>@if($mypost->isactive==1){{'Active'}}@else{{'Inactive'}}@endif</td>
                    <td>
                        <a href="{{url('category_update')}}/{{$mypost->id}}" class="btn btn-info">Edit</a>
                        <a href="{{url('category_delete')}}/{{$mypost->id}}" class="btn btn-danger">Delete</a>
                      </td>
                     </tr>
                  @endforeach
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection