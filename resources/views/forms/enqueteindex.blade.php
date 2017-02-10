@extends('perfil.info')
@section('content')
<section style="padding-bottom: 20px;" class="content-header">
	<h1>
	Formulários e Enquetes
	<small>Sistema de gerenciamento</small>
	</h1>
</section>
	
	@foreach($enquetes as $enquete)
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h4>Enquete: {{ $enquete->name}}</h4>				
			 	<ul class="list-group list-group-unbordered">
			 		<li class="list-group-item">
			      		<b>Pergunta: {{ $enquete->pergunta }}</b>			      		
			    	</li>
			    	<li class="list-group-item">
			    		<?php if($enquete->situacao == 1){
			    			$situacao = 'Ativa';
			    			}else{
			    				$situacao = 'Inativo';
			    				}?>
			      		<b>Situação: {{ $situacao }}</b>			      		
			    	</li>			    	
		  		</ul>
		  		<h4>Resultados: </h4>
		  		<ul class="list-group list-group-unbordered">
			 		<li class="list-group-item">
			      		<p><b>{{ $enquete->opcao1 }}: </b>{{ $count1 }}</p>		      		
			    	</li>
			    	<li class="list-group-item">
			      		<p><b>{{ $enquete->opcao2 }}: </b>{{ $count2 }}</p>		      		
			    	</li>
			    	<li class="list-group-item">
			      		<p><b>{{ $enquete->opcao3 }}: </b>{{ $count3 }}</p>		      		
			    	</li>
			    	<li class="list-group-item">
			      		<p><b>{{ $enquete->opcao4 }}: </b>{{ $count4 }}</p>		      		
			    	</li>
			    	<li class="list-group-item">
			      		<p><b>{{ $enquete->opcao5 }}: </b>{{ $count5 }}</p>		      		
			    	</li>
			    	<li class="list-group-item">
			      		<p><b>Total de votos: </b>{{ $total }}</p>		      		
			    	</li>

		  		</ul>
		  		<a class="btn btn-primary btn-block" href="{{ route('enquete.detalhes', $enquete->id) }}">Detalhes</a>
		  		    
			</div>			
		</div>
	</div>
	@endforeach

	

@endsection
