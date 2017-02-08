@extends('perfil.info')
@section('content')
<section style="padding-bottom: 20px;" class="content-header">
	<h1>
	Formulários e Enquetes
	<small>Sistema de gerenciamento</small>
	</h1>
</section>
	
	
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h4>Formulário: {{ $formulario->titulo}}</h4>
			 	<ul class="list-group list-group-unbordered">
			 		@foreach($envios as $envio)
			 		<li class="list-group-item">
			      		<b>Mensagem: </b><p>{{ $envio->mensagem }}</p>
			      		<b>De: </b>{{ \App\User::where('id', '=', $envio->user_id)->get()}}			      		
			    	</li>
			    	
			    	@endforeach
			    			    	
		  		</ul>
		  			    
			</div>			
		</div>
	</div>


	

@endsection
