@extends('dashboard.layouts.app')

@section('title')
{{trans('dashboard.slider')}}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('dashboard.slider')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sliders">{{trans('dashboard.slider')}}</a></li>
              <li class="breadcrumb-item"><a href="/sliderAdd">{{trans('dashboard.edit')}}</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Information for</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{Session::get('success')}}</li>
                    </ul>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{Session::get('fail')}}</li>
                    </ul>
                </div>
                @endif
                @foreach($sliders as $slider)
              <form role="form" action="{{route('sliderUpdate',$slider->id)}}" method="post" enctype="multipart/form-data">
                
                @csrf
                @method('post')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <img src="{{asset($slider->image)}}" class="img img-thumnail" width="100px" alt="">
                    <input type="file" class="form-control" name="image">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success rounded">Submit</button>
                </div>
              </form>
              @endforeach
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection