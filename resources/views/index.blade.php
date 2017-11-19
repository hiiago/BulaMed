<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>BulaMed</title>

	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>
<body>
	<div class="container">
	
	<div class="text-center" id='loading'></div>

	@if ($errors->any())
	<div class="row">
		<div class="col-sm-12">
			<div class="error">
				<div class="alert alert-info alert-dismissible">
	                
	                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
	                @foreach ($errors->all() as $error)
					
					{{$error}}

	                @endforeach
	            </div>
            </div>
		</div>
		
	</div>

	@endif
	
	<header id="index">
		<h1 class="text-center"><span class="titulo-iniciais">B</span>ULA<span class="titulo-iniciais">M</span>ED</h1>
	</header>
	
	<div class="row">
		<div id="search-input" class="col-sm-6"> 
		{!! Form::open(['action' => 'IntegracaoController@index', 'method' => 'get']) !!}
   			<div class="input-group col-sm-12">
		      <input type="text" name="bula" class="search-query form-control" placeholder="Pesquisar	..." aria-label="Search for..." required>
		      <span class="input-group-btn">
		        <button class="btn btn-search" type="submit"><span class="fa fa-search"></span></button>
		      </span>
		    </div>
		{!! Form::close() !!}

	    <a href="#"><p class="text-center">Como funciona?<p></a>
			
		</div>

	</div>

	

	

	</div>
	
	

	<script type="text/javascript">
		$(function($) {
			$("form").submit(function() {
				
		    $('#loading').html('<img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>');
			});
		});
	</script>

</body>

<footer id="index-footer">
	<div class="text-center"> ©2017 BulaMed - Todos os direitos reservados</div>
</footer>	

</html>