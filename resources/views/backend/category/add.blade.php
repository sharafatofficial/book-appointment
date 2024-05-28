
@extends('backend.layouts.app')

@section('content')
    

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add category</li>
       
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">category</h5>

              <!-- Horizontal Form -->
                <form action="{{route('store.category')}}" enctype="multipart/form-data" method="post">
             
                @csrf
                <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" value="@isset($cat) {{ $cat->name }} @endisset" class="form-control" id="inputText">
    </div>
</div>
<div class="row mb-3">
    <label for="inputDescription" class="col-sm-2 col-form-label">Category Description</label>
    <div class="col-sm-10">
        <textarea name="description" class="form-control" id="inputDescription">@isset($cat) {{ $cat->description }} @endisset</textarea>
    </div>
</div>
<div class="row mb-3">
    <label for="inputIsActive" class="col-sm-2 col-form-label">Is Active</label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_active" id="is_active_yes" value="1" @if(isset($cat) && $cat->is_active) checked @endif>
            <label class="form-check-label" for="is_active_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_active" id="is_active_no" value="0" @if(isset($cat) && !$cat->is_active) checked @endif>
            <label class="form-check-label" for="is_active_no">No</label>
        </div>
    </div>
</div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


@endsection