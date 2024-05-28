
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

              <!-- Horizontal Form -->
                <form action="{{url('category_edit').'/'.$category->id}}" enctype="multipart/form-data" method="post">
             
                @csrf
                <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" name="categoryname" value="@isset($category) {{ $category->categoryname }} @endisset" class="form-control" id="inputText">
    </div>
</div>
<div class="row mb-3">
    <label for="inputDescription" class="col-sm-2 col-form-label">Category Description</label>
    <div class="col-sm-10">
        <textarea name="categorydescription" class="form-control" id="inputDescription">@isset($category) {{ $category->categorydescription }} @endisset</textarea>
    </div>
</div>
<div class="row mb-3">
            <label for="inputIsActive" class="col-sm-2 col-form-label">Is Active</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isactive" id="is_active_yes" value="1" @if(isset($category) && $category->isactive==1) checked @endif>
                    <label class="form-check-label" for="is_active_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isactive" id="is_active_no" value="0" @if(isset($category) && $category->isactive==0) checked @endif>
                    <label class="form-check-label" for="is_active_no">No</label>
                </div>
            </div>
        </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>

                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


@endsection