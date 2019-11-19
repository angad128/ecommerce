@extends('admin_layout')
@section('title', 'Edit Categroy')
@section('contents')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Manufacture</h1>
  <a href="{{url('/manufacture/view')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">All Manufactures</a>
</div>
 @if(Session::get('message'))
  <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
  {{Session::put('message',null)}}
  @endif
<form  method="post" action="{{URL::to('manufacture/update')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="manufacture_name" class="">manufacture Name</label>
    <input type="text" name="manufacture_name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="manufactureHelp" value="{{$data->manufacture_name}}" placeholder="{{$data->manufacture_name}}">
  </div>
  <div class="form-group">
    <label for="body" class="">manufacture Description</label>
    <textarea id="body" name="manufacture_description" class="form-control form-control-user" >{{$data->manufacture_description}}</textarea>
  </div>
  <input type="hidden" name="manufacture_id" value="{{$data->manufacture_id}}">
  <input type="hidden" name="publication_status" value="{{$data->publication_status}}">
  
  <div class="col-xs-4">
    <button class="d-none d-md-inline-block btn btn-md btn-primary shadow-md" type="submit">UPDATE</button>
  </div>
  <hr>
  
</form>
@endsection


