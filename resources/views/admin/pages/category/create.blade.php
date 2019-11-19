@extends('admin_layout')
@section('title', 'Add Categroy')
@section('contents')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create Categories</h1>
  <a href="{{url('/category/view')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">All Catrgory</a>
</div>
 @if(Session::get('message'))
  <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
  {{Session::put('message',null)}}
  @endif
<form  method="post" action="{{URL::to('category/store')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="category_name" class="">Category Name</label>
    <input type="text" name="category_name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="categoryHelp" placeholder="Enter Category Name...">
  </div>
  <div class="form-group">
    <label for="body" class="">Category Description</label>
    <textarea id="body" name="category_description" class="form-control form-control-user" ></textarea>
  </div>
  <div class="form-group">
    <div class="custom-control custom-checkbox small">
      <input type="checkbox" name="publication_status" class="custom-control-input" id="customCheck" value="1">
      <label class="custom-control-label" for="customCheck">Publication Status</label>
    </div>
  </div>
  
  <div class="col-xs-4">
    <button class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" type="submit">SAVE</button>
  </div>
  <hr>
  
</form>
@endsection