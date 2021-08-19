<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('layout.partials.head')
  </head>
  <body class="error">
    @include('layout.partials.header')
    <main>
      @yield('content')
    </main>
    @include('layout.partials.footer')
  </body>
</html>