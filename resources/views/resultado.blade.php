<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BulaMed</title>

	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

	<script src="{{ asset('/js/jquery.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('/js/owlcarousel/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/owlcarousel/assets/owl.theme.default.min.css') }}">
	<script src="{{ asset('/js/owlcarousel/owl.carousel.min.js') }}"></script>

</head>

<header id="resultado">
	
		<div class="container">
			<div class="row">
				
				<div id="logo" class="col-sm-6">
					<h1 class="text-center"><span class="titulo-iniciais">B</span>ULA<span class="titulo-iniciais">M</span>ED</h1>
				</div>

				<div id="search-input" class="col-sm-6">
				{!! Form::open(['action' => 'IntegracaoController@index', 'method' => 'get']) !!}
					    <div class="input-group col-sm-12">
					      <input type="text" class="search-query form-control" placeholder="Pesquisar	..." aria-label="Search for...">
					      <span class="input-group-btn">
					        <button class="btn btn-search" type="button"><span class="fa fa-search"></span></button>
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
					<h1>Dorflex</h1>
				
					<h3>Princípios ativos: Dipirona Sódica Monoidratada, Citrato De Orfenadrina, Cafeína.</h3>
				</div>
			</div>

			<div class="row">
				<div class="titulo first">
					<h4> » Para que serve?</h4>
				</div>
				
				<div class="col-sm-12">
					
					<p>
						Buscopan drágeas ou gotas é indicado para o alivio de dores, cólicas e desconforto abdominal, no tratamento de contrações e cólicas do estômago, do intestino, das vias biliares, urinárias e do aparelho genital feminino, em crianças e adultos.

						Buscopan, também pode ser encontrado na forma de Buscopan Composto, para um alivio mais rápido da dor.
					</p>

				</div>

			</div>

			<div class="row">
				<div class="titulo">
					<h4> » Como funciona?</h4>
				</div>
				
				<div class="col-sm-12">
					
					<p>
						Buscopan é um medicamento que tem na sua composição Butilbrometo de escopolamina, um composto com ação antiespasmódica e analgésica, responsável por aliviar rapidamente dores, cólicas e desconforto abdominal.
					</p>

					<p>
						Apos administração, Buscopan começa a funcionar sobre o aparelho digestivo cerca de 20 a 80 minutos, após administração.
					</p>

				</div>

			</div>

			<div class="row">
				<div class="titulo">
					<h4> » O que fazer se alguém usar uma quantidade maior do que a indicada??</h4>
				</div>
				
				<div class="col-sm-12">
					
					<p>
						Em caso de ingestão acidental de paracetamol, é indicado procurar assistência médica imediatamente ou um centro de desintoxicação.
					</p>

					<p>
						É essencial que seja dado suporte imediato para adultos e crianças, mesmo que não houver sinais e sintomas de intoxicação.
					</p>

				</div>

			</div>


		</article>
		
		<div class="titulo text-center">
			<h4> » Preços para este medicamento.</h4>
		</div>

		<div class="owl-carousel">
		  <div class="item">
		  	<a href="#">
			  	<img src="img/remedio.jpg">
			  	<p>Dorflex c/ 36 Comprimidos</p>
			  	<span>R$ 13,56</span>
		  	</a>
		  </div>

		  <div class="item">
		  	<a href="#">
			  	<img src="img/remedio.jpg">
			  	<p>Dorflex c/ 36 Comprimidos</p>
			  	<span>R$ 13,56</span>
		  	</a>
		  </div>

		  <div class="item">
		  	<a href="#">
			  	<img src="img/remedio.jpg">
			  	<p>Dorflex c/ 36 Comprimidos Comprimidos dsadsadasdasdasdasdasdaasadasdasdasdComprimidos Comprimidos Comprimidos Comprimidos Comprimidos Comprimidos</p>
			  	<span>R$ 13,56</span>
		  	</a>
		  </div>

		  <div class="item">
		  	<a href="#">
			  	<img src="img/remedio.jpg">
			  	<p>Dorflex c/ 36 Comprimidos</p>
			  	<span>R$ 13,56</span>
		  	</a>
		  </div>

		 
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
});
</script>