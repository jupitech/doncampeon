<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Don Campeon</title>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/login.css') !!}
    <!-- Fonts -->
       <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  
    <div class="container">
               @if (Session::has('errors'))
		    <div class="alert alert-warning" role="alert">
			<ul>
	            <strong>Oops! Something went wrong : </strong>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
   
    @yield('content')
     </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {!! Html::script('assets/js/bootstrap.min.js') !!}
</body>
</html>