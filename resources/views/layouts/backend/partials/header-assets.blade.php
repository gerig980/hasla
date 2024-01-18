
<head>

    <meta charset="utf-8" />
    <title>Dashboard | Klaudio Fashion - Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/klaudio-fashion-favIcon.png') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/libs/nouislider/nouislider.min.css')}}">

    <!-- jsvectormap css -->
    <link href="{{ URL::asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ URL::asset('backend/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
   

     <!--datatable css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
     <!--datatable responsive css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
 
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
 
     <!-- Sweet Alert css-->
     <link href="{{URL::asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- Layout config Js -->
    <script src="{{ URL::asset('backend/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ URL::asset('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toastr Notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />
    @stack('css')

</head>