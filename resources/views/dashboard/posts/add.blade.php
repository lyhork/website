@extends('dashboard.layouts.app')

@section('title')
{{trans('dashboard.posts')}}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('dashboard.posts')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/posts">{{trans('dashboard.posts')}}</a></li>
              <li class="breadcrumb-item"><a href="">{{trans('dashboard.add')}}</a></li>
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
                <h3 class="card-title">Add New Post</h3>
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
              <form role="form" action="{{route('postStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="image">
                    <!-- @error('image')
                      <div class="error">{{ $message }}</div>
                    @enderror -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Images</label>
                    <input type="file" class="form-control" name="galleries[]" multiple>
                    <!-- @error('image')
                      <div class="error">{{ $message }}</div>
                    @enderror -->
                  </div>
                  @foreach(config('app.languages') as $key =>$lang)
                    <h3>{{$lang}}</h3>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="{{$key}}[title]" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Content</label>
                      <textarea name="{{$key}}[content]"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Excerpt</label>
                      <textarea name="{{$key}}[excerpt]"></textarea>
                    </div>
                  @endforeach
                  <script>
                    tinymce.init({
                      selector: 'textarea',
                      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                      promotion: false,
                    });
                  </script>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success rounded">Submit</button>
                </div>
              </form>
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