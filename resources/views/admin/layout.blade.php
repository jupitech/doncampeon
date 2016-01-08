@extends('admin/sections/menulateral')
@extends('admin/sections/menutop')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Don Campeon</title>

    <!-- Bootstrap core CSS -->
     {!! Html::style('assets/css/bootstrap.min.css') !!}
     {!! Html::style('assets/css/admin.css') !!}
     {!! Html::style('assets/css/bootstrap-select.css') !!}
     {!! Html::style('assets/js/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     {!! Html::script('assets/js/bootstrap-select.js') !!}
     {!! Html::script('assets/js/bootstrap.min.js') !!}
     {!! Html::script('assets/js/bower_components/moment/moment.js') !!}
      {!! Html::script('assets/js/moment-timezone.js') !!}
     {!! Html::script('assets/js/jquery.countdown.js') !!}
     {!! Html::script('assets/js/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
     <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body>
   @yield('menutop')

    <div class="container-fluid">
        <div class="row">
      @yield('menulateral')
        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-11 col-lg-offset-1 main spd spi">
          @yield('content')
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


     
            <script>
               $('.selectpicker').selectpicker();
                  $('.selectpicker2').selectpicker();
            </script>
  </body>

  <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>

</html>
