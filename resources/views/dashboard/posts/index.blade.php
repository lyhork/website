@extends('dashboard.layouts.app')

@section('title')
{{trans('dashboard.posts')}}
@endsection

@section('content')
@include('sweetalert::alert')
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
              <li class="breadcrumb-item"><a href="#">{{trans('dashboard.posts')}}</a></li>
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
            <div class="card">
              <div class="card-header text-right">
                <h3 class="card-title">Post List</h3>
                <a href="/postAdd" class="btn btn-success">Add New Post</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th class="text-center">Image</th>
                    <th >Created_at</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                    <tr>
                        <td class="align-middle">{{$post->title}}</td>
                        <td class="align-middle text-center"><img src="{{asset($post->image)}}" class="img img-thumnail" width="100px" alt=""></td>
                        <td class="align-middle">{{$post->created_at}}</td>
                        <td class="align-middle text-right">
                            <a href="{{route('postEdit',$post->id)}}" class="btn btn-primary btn-flat text-white rounded">Edit</a>
                            <a href="{{route('postDelete',$post->id)}}" class="btn btn-danger btn-flat text-white rounded" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </tfoot>
                </table>
                <script type="text/javascript">
                  function confirmation(event){
                    event.preventDefault();
                    var urlToRedirect = event.currentTarget.getAttribute('href');
                    console.log(urlToRedirect);
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = urlToRedirect;
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleting.',
                          'success'
                        )
                      }
                    });
                  }

                </script>
                <!-- <script type="text/javascript">
                  $(function(){
                    $(document).on('click','#delete', function(e){
                      e.preventDefault();
                      var link = $(this).attr("href");
                      Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                        }
                      })
                    });
                  });
                </script> -->
                
                <!-- <script>
                  function deleteData(id) {
                    event.preventDefault();
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                      if (result.isConfirmed) {
                        document.getElementById('delete-form-'+id).submit();
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                      }
                    });
                  }
                </script> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection