@extends('perfil.info')
@section('content')
<section style="padding-bottom: 20px;" class="content-header">
	<h1>
	Formulários e Enquetes
	<small>Sistema de gerenciamento</small>
	</h1>
</section>
	
	
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h4>{{ $enquete->pergunta}}</h4>
				
			 	<ul class="list-group list-group-unbordered">
			 		@foreach($envios as $envio)
			 		<li class="list-group-item">
			 			<p><b>Nome: </b>{{ $envio->user->name }} {{ $envio->user->sobrenome }}</p> <!--CHAMA FUNCAO user NA MODEL ENVIOS_FORMULARIO -->
			      		<p><b>Opção: </b>{{ $envio->resposta }}</p>			      		
			    	</li>
			    	
			    	@endforeach
			    			    	
		  		</ul>
		  		<div align="center">
		            {!! $envios->links() !!}
		        </div>
				  			    
			</div>			
		</div>
	</div>


	

@endsection
