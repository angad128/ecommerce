@extends('admin_layout')
@section('title', 'All Catrgories')
@section('contents')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Categories</h1>
  <a href="{{url('/category/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Addd Catrgory</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">

   @if(Session::get('message'))
    <h4 class="h4 text-center text-green-400 mb-2">{{Session::get('message')}}</h4>
    {{Session::put('message',null)}}
    @endif

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Status</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
          <th>Stauts</th>
          <th>Name</th>
          <th>Description</th>
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
              <a class="btn btn-danger">Deactived</a>
              @endif
            </td>
            <td>{{$result->category_name}}</td>
            <td>{{$result->category_description}}</td>
            <td class="row" style="margin-left: 0%;">
              <div class="col s12 m4 l4">
               @if($result->publication_status==1)
                <a title="deactivate" href="{{URL::to('/categroy/unactive/'.$result->category_id)}}" class="btn btn-danger btn-circle btn-md">
                  <i class="far fa-thumbs-down"></i>
                  </a>
              @else
                <a title="activate" href="{{URL::to('/categroy/active/'.$result->category_id)}}" class="btn btn-success btn-circle btn-md">
                  <i class="far fa-thumbs-up"></i>
                  </a>
              @endif
              </div>
              <div class="col s12 m4 l4">
                <a title="edit" href="{{URL::to('/category/edit/'.$result->category_id)}}" class="btn btn-primary btn-circle btn-md">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col s12 m4 l4">
                <a title="delete" data-toggle="modal" data-target="#deleteCategoryModal" data-id="{{$result->category_id}} "onclick="passId(<?=$result->category_id;?>)" class="btn btn-danger btn-circle btn-md">
                  <i class="fas fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>






@endsection