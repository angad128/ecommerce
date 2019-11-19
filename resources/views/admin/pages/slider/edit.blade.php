@extends('admin_layout')
@section('title', 'Edit slider')
@section('contents')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create slider</h1>
  <a href="{{url('/slider/view')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">All sliders</a>
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
<form  method="post" action="{{URL::to('slider/update')}}" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="slider_image" class="">slider Image</label>
    <input type="file" name="slider_image" class="input-file form-control form-control-user" aria-describedby="sliderHelp" value="{{$data->slider_image}}">
  </div>
 
 <input type="hidden" name="slider_id" value="{{$data->slider_id}}">
  
  <div class="col-xs-4">
    <button class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" type="submit">Update</button>
  </div>
  <hr>
  
</form>
@endsection