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
    <!-- Custom styles for this template -->
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

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
        <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          @yield('content')
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     {!! Html::script('assets/js/bootstrap-select.js') !!}
     {!! Html::script('assets/js/bootstrap.min.js') !!}
     
            <script>
               $('.selectpicker').selectpicker();
                  $('.selectpicker2').selectpicker();
            </script>
  </body>
</html>
