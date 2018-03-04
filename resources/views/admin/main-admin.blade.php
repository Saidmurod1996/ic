<!DOCTYPE html>
<html >

@include('admin.partials._head')

<body>
	
@include('admin.partials._nav')

<div class="container">

      @include('admin.partials._message')
      
      @yield('content')

      @include('admin.partials._footer')

</div>

@yield('script')

@include('admin.partials._javascript')
</body>
</html>