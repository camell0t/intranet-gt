@extends('perfil.info')
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div class="text-center">
					<img class="profile-user-img img-circle" src="/uploads/perfil/{{ $user->avatar }}" alt="User profile picture">
				</div>
			  
			  <h3 class="profile-username text-center">{{ $user->name }} {{ $user->sobrenome }}</h3>

			  <p class="text-muted text-center">{{$user->funcao}}</p>

			  <ul class="list-group list-group-unbordered">
			    <li class="list-group-item">
			      <b>Setor: </b> <a class="pull-right"></a>
			    </li>
			    <li class="list-group-item">
			      <b>E-mail: </b> <a class="pull-right">{{ $user->email }}</a>
			    </li>
			    <li class="list-group-item">
			      <b>Friends</b> <a class="pull-right">13,287</a>
			    </li>
			    <li class="list-group-item">
			      <i class="fa  fa-camera"></i><b> Alterar imagem</b>
			      <form action="{{ route('perfil.atualizaravatar')}}" enctype="multipart/form-data" method="POST" >	  

			        <input type="file" name="avatar">
			  	    	
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	<div style="padding-top:5px;"></div>
			    	<button type="submit" class="btn btn-primary btn-block"><b>Alterar</b></button>
			   </form>
			    </li>
			  </ul>
			</div>

		</div>
	</div>
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-body box-profile text-center">				
			<h3>Bem-vindo à Intranet do Grupo G Trigueiro</h3>
				<p>Aqui o seu acesso fica restrito a rede local corporativa onde terá acesso as informações que são de uso interno da Instituição.</p><br>
	 			<b>Objetivo</b>
	 			<p> A Intranet tem por objetivo empregar aos seus usuários, os mesmos recursos utilizados pela Internet com a disseminação do uso de aplicações para consulta que serão continuamente implementadas. Além disso estaremos proporcionando uma comunicação clara e eficiente entre os setores com a divulgação eletrônica das informações.</p>
			</div>			
		</div>
	</div>
</div>
@endsection
