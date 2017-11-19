<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BulaMed</title>

	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

	<script src="{{ asset('/js/jquery.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('/js/owlcarousel/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/owlcarousel/assets/owl.theme.default.min.css') }}">
	<script src="{{ asset('/js/owlcarousel/owl.carousel.min.js') }}"></script>

</head>

<header id="resultado">
	
		<div class="container">
			<div class="text-center" id='loading'></div>

			<div class="row">
				
				<div id="logo" class="col-sm-6">
					<h1 class="text-center"><span class="titulo-iniciais">B</span>ULA<span class="titulo-iniciais">M</span>ED</h1>
				</div>

				<div id="search-input" class="col-sm-6">
				{!! Form::open(['action' => 'IntegracaoController@index', 'method' => 'get']) !!}
		   			<div class="input-group col-sm-12">
				      <input type="text" name="bula" class="search-query form-control" placeholder="Pesquisar	..." aria-label="Search for..." required>
				      <span class="input-group-btn">
				        <button class="btn btn-search" type="submit"><span class="fa fa-search"></span></button>
				      </span>
				    </div>
				{!! Form::close() !!}
				</div>
			</div>

		</div>

</header>

<body id="body-resultado">
	
	
	<div class="container">

	<div id="box">
		<article>
			
			<div class="row">
				<div id="titulo-box" class="col-sm-12">
					<h1>{{$bula}}</h1>
				</div>
			</div>

			@foreach($bulario as $elemento)
				<div class="row">
					<div class="titulo">
						<?php echo $elemento[0]?>
						
					</div>
				
				@for($i=1; $i < $elemento->count(); $i++)
					<div class="col-sm-12">
						<?php echo $elemento[$i]?>
					</div>
				@endfor

				</div>
			@endforeach
			

			<div class="row">
				<div class="titulo">
					<?php echo $consultaremedios[0]?>
					
				</div>
			
			@for($i=1; $i < $consultaremedios->count(); $i++)
				<div class="col-sm-12">
					<?php echo $consultaremedios[$i]?>
				</div>
			@endfor

			</div>
			



		</article>
		
		<div class="titulo text-center">
			<h4> » Preços para este medicamento.</h4>
		</div>

		<div class="owl-carousel">

			@foreach($farmadelivery as $produto)
				<div class="item">
				  	<a href="{{$produto->get('link')}}">
					  	<img src="{{$produto->get('imagem')}}">
					  	<p>{{$produto->get('nome')}}</p>
					  	<span>{{$produto->get('preco')}}</span>
				  	</a>
				 </div>
			@endforeach
		 
		</div>
		
	</div>
	
	</div>

	

		

</body>

<footer id="resultado-footer">	
	<div class="text-center"> ©2017 BulaMed - Todos os direitos reservados</div>	
</footer>

</html>

<script type="text/javascript">
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel({
    	nav:true,
    	autoplay:true,
    	loop:true,
    	autoplayTimeout:5000,
    	navText: ""
	  });

	  $("form").submit(function() {
				
		    $('#loading').html('<img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>');
			});
});
</script>