@extends('admin_layout')
@section('title', 'All Catrgories')
@section('contents')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">sliders</h1>
  <a href="{{url('/slider/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add slider</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">

   @if(Session::get('message'))
    <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
    {{Session::put('message',null)}}
    @endif
    @if(count($data)>0)
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Status</th>
            <th>slider Image</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Status</th>
            <th>slider Image</th>
            <th>Action</th>
           
          </tr>
        </tfoot>
        <tbody>
    
          @foreach($data as $result)
          <tr>
            <td>
              @if($result->publication_status)
              <a class="btn btn-success">Actived</a>
              @else
              <a class="btn btn-danger">Deactivated</a>
              @endif
            </td>
             <td><img src="{{URL::to('images/slider/image/'.$result->slider_image)}}" width="80px" height="80" alt="" /></td>           
            <td class="row" style="margin-left: 0%;">
              <div class="col s12 m4 l4">
              @if($result->publication_status==1)
                <a title="deactivate" href="{{URL::to('/slider/unactive/'.$result->slider_id)}}" class="btn btn-danger btn-circle btn-md">
                  <i class="far fa-thumbs-down"></i>
                </a>
              @else
                <a title="activate" href="{{URL::to('/slider/active/'.$result->slider_id)}}" class="btn btn-success btn-circle btn-md">
                  <i class="far fa-thumbs-up"></i>
                  </a>
              @endif
              </div>
              <div class="col s12 m4 l4">
                <a title="edit" href="{{URL::to('/slider/edit/'.$result->slider_id)}}" class="btn btn-primary btn-circle btn-md">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col s12 m4 l4">
                <a title="delete" data-toggle="modal" data-target="#deletesliderModal" data-id="{{$result->slider_id}} "onclick="passId(<?=$result->slider_id;?>)" class="btn btn-danger btn-circle btn-md">
                  <i class="fas fa-trash"></i>
                </a>
              </div>
            </td>           
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
    @else
      <h3 class="h3 text-center text-red-600 mb-4">Sorry, No result found.</h3>
    @endif
  </div>
</div>





@endsection