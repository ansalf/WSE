
<!DOCTYPE html>
<html lang="en">

@include('Admin.Layouts.Components.header')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      @include('Admin.Layouts.Components.navbar')

      @include('Admin.Layouts.Components.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @yield('content-header')
          </div>

          <div class="section-body">
            @yield('content-body')
          </div>
        </section>
      </div>

      @include('Admin.Layouts.Components.footer')
      
    </div>
  </div>

  @include('Admin.Layouts.Components.scripts')

</body>
</html>