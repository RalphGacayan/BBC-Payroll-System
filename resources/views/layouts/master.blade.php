<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AssetManagement') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   
    <!-- Scripts -->
    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"> </script>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>
<body>
      @include('layouts.inc.admin-navbar')

      <div id="layoutSidenav">
     
           @include('layouts.inc.admin-sidebar')

           <div id="layoutSidenav_content">
               <main>
                 @yield('content')
               </main>    
               @include('layouts.inc.admin-footer')
           </div>   

      </div>  
    

    
    <script src="assets/js/script.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  

    <script>
         $(document).ready(function() {
    $('#myDataTable').DataTable({
        ordering: false
    });
});

      
    </script>
</body>
</html>    