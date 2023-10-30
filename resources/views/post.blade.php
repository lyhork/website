@extends('frontend.layout')
@foreach($post as $row)
    @section('title')
        {{$row->title }}
    @endsection
    @section('body')

    
    <section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate aline-image">

          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4"><a href="#">{{$row->title}}</a></h1>
            <div class="post-meta">
                <span>{{$row->created_at}}</span>
            </div>
            <div class="post-content-body">
            {!!$row->content!!}
            </div>
            <img class="card-img-top d-block w-100 responsive"  src="{{asset($row->image)}}" alt="Image" class="img-fluid rounded">
            @foreach($galleries as $gallery)
              <img class="card-img-top d-block w-100 responsive"  src="{{asset('/images/uploads/gallery/'.$gallery->images)}}" alt="Image" class="img-fluid rounded">
            @endforeach

          </div>

          <!-- END main-content -->
        </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
    @endsection
@endforeach