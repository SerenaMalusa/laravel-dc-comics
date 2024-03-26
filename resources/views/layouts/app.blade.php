<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- carachters and viewport tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO tags -->
    <meta name="author" content="Serena Malusà" />
    <meta name="description" content="laravel exercise">

    <!-- title and icon -->
    <title>{{ env('APP_NAME')}} - @yield('title')</title>
    
    <!-- css -->
    {{-- Bootstrap --}}
    @vite('resources/js/app.js')
    {{-- page specific css --}}
    @yield('css')

  </head>

  <body>
    <div class="wrapper">
      @include('partials.header')

      <main>
        @yield('main-content')
      </main>

      @include('partials.footer')
    </div>

    @yield('js')
  </body>

</html>
