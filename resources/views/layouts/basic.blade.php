<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>@yield('title')</title>
  <link href="/logo1.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="stylesheet" href="/css/font/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.0.0.min.js" integrity="sha256-1IKHGl6UjLSIT6CXLqmKgavKBXtr0/jJlaGMEkh+dhw=" crossorigin="anonymous"></script>

</head>

<body>
<div class="top-banner">
    <p class="center white-text" >Entre em contacto {{Illuminate\Support\Facades\Config::get('social.phone_number')}}</p>
</div>
@Include('components-structure.navbar')

    @section('main')

    @show
@Include('components-structure.footer')





<script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems, {});
       elems = document.querySelectorAll('.dropdown-trigger');
       instances = M.Dropdown.init(elems, {});
        elems = document.querySelectorAll('.collapsible');
     instances = M.Collapsible.init(elems, {});
    });
   
 </script>
</body>

</html>