@extends('dashboard.layouts.app')

@section('title')
{{trans('dashboard.settings')}}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('dashboard.settings')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">{{trans('dashboard.settings')}}</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container-fluid">
        <div class="row">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{trans('dashboard.settings')}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{Route('settings.update' ,$settings)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <img src="{{asset($settings->logo)}}" alt="" class="img img-thumnail" width="50px">
                    <input type="file" name="logo" class="form-control">
                  </div>
                  <hr>
                  @foreach($settings->trans as $trans)
                    <h3>{{$trans->locale}}</h3>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title  {{$trans->locale}}</label>
                      <input type="text" name="{{$trans->locale}}[title]" class="form-control" value="{{$trans->title}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Content  {{$trans->locale}}</label>
                    <textarea name="{{$trans->locale}}[content]" class="form-control">{{$trans->content}}</textarea>
                    </div>
                  @endforeach
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection