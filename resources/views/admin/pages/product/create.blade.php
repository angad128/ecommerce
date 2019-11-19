@extends('admin_layout')
@section('title', 'Add Product')
@section('contents')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create product</h1>
  <a href="{{url('/product/view')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">All products</a>
</div>
 @if(Session::get('message'))
  <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
  {{Session::put('message',null)}}
  @endif
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{ $error }}
      </li>
      @endforeach
    </ul>
  </div>
  @endif
<form  method="post" action="{{URL::to('product/store')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="product_name" class="">product Name</label>
    <input type="text" name="product_name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="productHelp" placeholder="Enter product Name...">
  </div>
  <div class="form-group">
    <label for="se1ectCategory">Product Category</label>
    <select name="category_id" class="form-control" id="se1ectCategory">
      <option>select category</option>
      @foreach($category_data as $result)
      <option value="{{$result->category_id}}">{{$result->category_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="se1ectCategory">Manufacture Name</label>
    <select name="manufacture_id" class="form-control" id="se1ectCategory">
      <option>select manufacture</option>
      @foreach($manufacture_data as $result)
      <option value="{{$result->manufacture_id}}">{{$result->manufacture_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="body" class="">Product short Description</label>
    <textarea id="body" name="product_short_description" class="form-control form-control-user" ></textarea>
  </div>
  <div class="form-group">
    <label for="body" class="">Product long Description</label>
    <textarea id="body" name="product_long_description" class="form-control form-control-user" rows="4"></textarea>
  </div>
  <div class="form-group">
    <label for="product_name" class="">Product price</label>
    <input type="text" name="product_price" class="form-control form-control-user" aria-describedby="productHelp" placeholder="Enter product price...">
  </div>
  <div class="form-group">
    <label for="product_image" class="">Product Image</label>
    <input type="file" name="product_image" class="input-file form-control form-control-user" aria-describedby="productHelp" placeholder="Browse Image">
  </div>
  <div class="form-group">
    <label for="product_name" class="">Product Size</label>
    <input type="text" name="product_size" class="form-control form-control-user" aria-describedby="productHelp" placeholder="Enter product size...">
  </div>
  <div class="form-group">
    <label for="product_image" class="">Product Color</label>
    <input type="text" name="product_color" class="form-control form-control-user" aria-describedby="productHelp" placeholder="Enter product color...">
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