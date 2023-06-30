<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Fuenix Portal</title>
    
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Fuenix Portal - Welcome">
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('asset/js/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('asset/css/portal.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('asset/css/data_table.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('asset/css/card.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('asset/css/style.css')}}">

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    @yield('css')

</head>

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        @include('layouts.header')
        @include('layouts.sidepanel')  
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4" style="min-height: 88vh">
		    <!-- content area -->
            @yield('content')
	    </div><!--//app-content-->
	    @include('layouts.footer')
    </div><!--//app-wrapper-->    					

    <!-- Javascript -->          
    <script src="{{ asset('asset/js/popper.min.js')}}"></script>
    <script src="{{ asset('asset/js/bootstrap/js/bootstrap.min.js')}}"></script>  

    <!-- Charts JS -->
    <!-- <script src="{{ asset('asset/js/chart.min.js')}}"></script> -->
    <!-- <script src="{{ asset('asset/js/index-charts.js')}}"></script> -->
    
    <!-- Page Specific JS -->
    <script src="{{ asset('asset/js/app.js')}}"></script>

    <!-- tabs JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function(e) {
        $( "#tabs" ).tabs();
    }); 

    var selector = '.active_tab li a';
        $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });     
    </script>
    <!-- tabs JS end -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#btnShow").click(function () {
                $('#expense_modal').modal('show');
            });
            $(".close_modal").click(function () {
                $('#expense_modal').modal('hide');
            });
        });
    </script>
    
    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('.restu_table').DataTable({
                lengthChange: false,
            });
        });
    </script>

    @yield('js')
</body>
</html>