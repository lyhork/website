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
              <li class="breadcrumb-item"><a href="#">{{trans('dashboard.slider')}}</a></li>
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
                <h3 class="card-title">Slider List</h3>
                <a href="/sliderAdd" class="btn btn-success">Add New Slider</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th class="text-center">Is_active</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sliders as $slider)
                    <tr>
                        <td class="align-middle text-center">
                          <img src="{{asset($slider->image)}}" class="img img-thumnail" width="80px" alt="">
                        </td>
                        <td class="text-center align-middle">
                            <a href="/slider/{{ $slider->id }}">
                              <input type="checkbox" data-id="{{ $slider->id }}" name="status" class="js-switch" {{ $slider->status == 1 ? 'checked' : '' }}>
                            </a>
                            <!-- <a href="slider/{{ $slider->id }}" class="btn btn-sm btn-{{ $slider->status ? 'success' : 'danger' }}">{{ $slider->status ? 'Enable' : 'Disable'}}</a> -->
                        </td>
                        <!-- <td class="text-center">
                            @if($slider->is_active == 1)
                            <span>Active</span>
                            @else
                            <span>Inactive</span>
                            @endif
                        </td> -->
                        <td class="text-right align-middle">
                            <a href="{{route('sliderEdit',$slider->id)}}" class="btn btn-primary btn-flat text-white rounded">Edit</a>
                            <a href="{{route('sliderDelete',$slider->id)}}" class="btn btn-danger btn-flat text-white rounded" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th class="text-center">Is_active</th>
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