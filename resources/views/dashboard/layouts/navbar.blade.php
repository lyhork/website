  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">{{trans('dashboard.home')}}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item">
              <a class="nav-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
              @if($localeCode =='en')
                <img src="{{asset('uk.png')}}" style="width: 30px">
              @else($localeCode =='kh')
                <img src="{{asset('kh.png')}}" style="width: 30px">
              @endif
              <!-- {{ $properties['native'] }} -->
                </a>
            </li>
          @endforeach
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin')}}" class="brand-link">
      <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ request()->session()->get('name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/admin')}}" class="d-block">{{ request()->session()->get('name')}}</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link {{request()->is('/admin') ? 'active' : ''}}">
              <i class="nav-icon fa fa-home text-info"></i>
              <p>{{trans('dashboard.home')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card text-info"></i>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/sliders" class="nav-link {{request()->is('/sliders') ? 'active' : ''}}">
                  <i class="nav-icon fa fa-newspaper text-info"></i>
                  <p>{{trans('dashboard.slider')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/posts" class="nav-link {{request()->is('/posts') ? 'active' : ''}}">
                  <i class="nav-icon fa fa-newspaper text-info"></i>
                  <p>{{trans('dashboard.posts')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link">
              <i class="nav-icon fa fa-users text-info"></i>
              <p>{{trans('dashboard.users')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/settings" class="nav-link">
              <i class="nav-icon fa fa-cog text-info"></i>
              <p>{{trans('dashboard.settings')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link" onclick="confirmation(event)">
              <i class="nav-icon fa fa-door-closed text-info"></i>
              <p>{{trans('dashboard.logout')}}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
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
          confirmButtonText: 'Yes, Log it out!'
        })
        .then((result) => {
          if (result.isConfirmed) {
            window.location.href = urlToRedirect;
            Swal.fire(
              'Logged Out!',
              'You has been logged out.',
              'success'
            )
          }
        });
      }

    </script>