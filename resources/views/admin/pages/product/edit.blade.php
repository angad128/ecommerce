@extends('admin_layout')
@section('title', 'Edit Product')
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
<form  method="post" action="{{URL::to('product/update')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="product_name" class="">Product Name</label>
    <input type="text" name="product_name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="productHelp"   value="{{$data->product_name}}" placeholder="{{$data->product_name}}">
  </div>
  <div class="form-group">
    <label for="se1ectCategory">Product Category</label>
    <select name="category_id" value="{{$data->category_id}}" class="form-control" id="se1ectCategory">
      <option>select category</option>
      @foreach($category_data as $result)
      <option value="{{$result->category_id}}">{{$result->category_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="se1ectCategory">Manufacture Name</label>
    <select name="manufacture_id" value="{{$data->manufacture_id}}" class="form-control" id="se1ectCategory">
      <option>select manufacture</option>
      @foreach($manufacture_data as $result)
      <option value="{{$result->manufacture_id}}">{{$result->manufacture_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="body" class="">Product short Description</label>
    <textarea id="body" name="product_short_description" class="form-control form-control-user" >{{$data->product_short_description}}</textarea>
  </div>
  <div class="form-group">
    <label for="body" class="">Product long Description</label>
    <textarea id="body" name="product_long_description" class="form-control form-control-user" rows="4">{{$data->product_long_description}}</textarea>
  </div>
  <div class="form-group">
    <label for="product_name" class="">Product price</label>
    <input type="text" name="product_price" class="form-control form-control-user" aria-describedby="productHelp"value="{{$data->product_price}}" placeholder="{{$data->product_price}}">
  </div>
  <div class="form-group">
    <label for="product_image" class="">Product Image</label>
    <input type="file" name="product_image" class="input-file form-control form-control-user" aria-describedby="productHelp" value="{{$data->product_image}}">
  </div>
  <div class="form-group">
    <label for="product_name" class="">Product Size</label>
    <input type="text" name="product_size" class="form-control form-control-user" aria-describedby="productHelp"  value="{{$data->product_size}}" placeholder="{{$data->product_size}}">
  </div>
  <div class="form-group">
    <label for="product_image" class="">Product Color</label>
    <input type="text" name="product_color" class="form-control form-control-user" aria-describedby="productHelp"  value="{{$data->product_color}}" placeholder="{{$data->product_color}}">
  </div>
 <input type="hidden" name="product_id" value="{{$data->product_id}}">
  
  <div class="col-xs-4">
    <button class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" type="submit">Update</button>
  </div>
  <hr>
  
</form>
@endsection