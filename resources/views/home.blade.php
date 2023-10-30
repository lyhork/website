@extends('frontend.layout')

@section('title')
{{$settings->title}}
@endsection

@section('body')
<div class="slider d-none d-sm-block">
  <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
    <ul class="carousel-indicators">
    @foreach($sliders as $key => $slider)
      <li data-target="#demo" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}">                                                                   </li>
    @endforeach
    </ul>

    <div class="carousel-inner">
      @foreach($sliders as $slider)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <img class="d-block w-100 responsive" src="{{asset($slider->image)}}" alt="slider">  
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="section-heading mb-5 d-flex align-items-center">
          <h2>{{trans('frontend.news')}}</h2>
          <div class="ml-auto"><a href="/posts" class="view-all-btn">View All</a></div>
        </div>
        
        <div class="row row-cols-1 row-cols-2 g-2 mx-auto">
        @foreach($singlePost as $post)
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card mb-5 d-flex">
              <a href="{{route('post',$post->id)}}"><img class="card-img-top d-block w-100 responsive"  src="{{asset($post->image)}}" alt="Image" class="img-fluid rounded"></a>
              <!-- <img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap"> -->
              <div class="card-body">
                <h5 class="card-title"><a href="{{route('post',$post->id)}}">{{$post->title}}</a></h5>
                <p class="card-text">{!!$post->excerpt!!}</p>
                <div class="d-flex mb-3">
                  <p>{{$post->created_at}}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
      <div class="col-md-12 col-lg-4 sidebar">
      <!-- <div class="sidebar-box">
        <div class="bio text-center">
          <img src="{{asset('frontend/images/he-dpm-profile-2.jpg')}}" alt="Image Placeholder" class="img-fluid mb-5">
          <div class="bio-body">
            <h5>អគ្គបណ្ឌិតសភាចារ្យ អូន ព័ន្ធមុនីរ័ត្ន<br>ឧបនាយករដ្ឋមន្ត្រី</h5>
            <h5>Dr. Aun Pornmoniroth<br>Deputy Prime Minister</h5>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
            <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
            <p class="social">
              <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
              <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
              <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
              <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
            </p>
          </div>
        </div>
        </div> -->

        <div class="sidebar-box">
          <div class="header_page">
            <h3 class="heading text-center">{{trans('frontend.announcement')}}</h3>
          </div>
          <div class="post-entry-sidebar">
            <ul>
              <li>
                <a href="">
                  <img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <img src="{{asset('frontend/images/img_3.jpg')}}" alt="Image placeholder" class="mr-4">
                  <div class="text">
                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                    <div class="post-meta">
                      <span class="mr-2">March 15, 2018 </span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="sidebar-box">
          <div class="header_page">
            <h3 class="heading text-center">{{trans('frontend.social_media')}}</h3>
          </div>
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FGS.FSA.KH&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden; width: 100%;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="section-heading mb-5 d-flex align-items-center">
          <h2>Sports</h2>
          <div class="ml-auto"><a href="#" class="view-all-btn">View All</a></div>
        </div>
        <div class="entry2 mb-5">
          <a href="single.html"><img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-fluid rounded"></a>
          <span class="post-category text-white bg-primary mb-3">Sports</span>
          <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('frontend/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
            <span>&nbsp;-&nbsp; February 10, 2019</span>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
        </div>


        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="#"><img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-primary mb-3">Sports</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_4.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-primary mb-3">Sports</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-primary mb-3">Sports</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="section-heading mb-5 d-flex align-items-center">
          <h2>Travel</h2>
          <div class="ml-auto"><a href="#" class="view-all-btn">View All</a></div>
        </div>
        <div class="entry2 mb-5">
          <a href="single.html"><img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image" class="img-fluid rounded"></a>
          <span class="post-category text-white bg-danger mb-3">Travel</span>
          <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('frontend/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
            <span>&nbsp;-&nbsp; February 10, 2019</span>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
        </div>


        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-danger mb-3">Travel</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-danger mb-3">Travel</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_3.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-danger mb-3">Travel</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>
      </div>


      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="section-heading mb-5 d-flex align-items-center">
          <h2>Lifestyle</h2>
          <div class="ml-auto"><a href="#" class="view-all-btn">View All</a></div>
        </div>
        <div class="entry2 mb-5">
          <a href="single.html"><img src="{{asset('frontend/images/img_3.jpg')}}" alt="Image" class="img-fluid rounded"></a>
          <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
          <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('frontend/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
            <span>&nbsp;-&nbsp; February 10, 2019</span>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
        </div>


        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_4.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_3.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>

        <div class="entry4 d-block d-sm-flex">
          <figure class="figure order-2"><a href="single.html"><img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image" class="img-fluid rounded"></a></figure>
          <div class="text mr-4 order-1">
            <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
            <h2><a href="single.html">The 20 Biggest Fintech Companies In America 2019</a></h2>
            <span class="post-meta mb-3 d-block">May 12, 2019</span>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>
@endsection