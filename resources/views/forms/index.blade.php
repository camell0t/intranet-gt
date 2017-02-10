@extends('perfil.info')
@section('content')
<section style="padding-bottom: 20px;" class="content-header">
	<h1>
	Formulários e Enquetes
	<small>Sistema de gerenciamento</small>
	</h1>
</section>
	
	@foreach($formularios as $form)
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h4>Formulário: {{ $form->titulo}}</h4>
			 	<ul class="list-group list-group-unbordered">
			 		<li class="list-group-item">
			      		<b>Descrição: {{ $form->corpo }}</b>			      		
			    	</li>
			    	<li class="list-group-item">
			    		<?php if($form->situacao == 1){
			    			$situacao = 'Ativo';
			    			}else{
			    				$situacao = 'Inativo';
			    				}?>
			      		<b>Situação: {{ $situacao }}</b>			      		
			    	</li>			    	
		  		</ul>
		  		<a class="btn btn-primary btn-block" href="{{ route('form.detalhes', $form->id) }}">Detalhes</a>
		  		    
			</div>			
		</div>
	</div>
	@endforeach

	

@endsection
