@extends('perfil.info')
@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div class="text-center">
					<img class="profile-user-img img-circle" src="/uploads/perfil/{{ $user->avatar }}" alt="User profile picture">
				</div>
			  
			  <h3 class="profile-username text-center">{{ $user->name }} {{ $user->sobrenome }}</h3>

			  <p class="text-muted text-center">{{$user->funcao}}</p>

			  <ul class="list-group list-group-unbordered">
			    <li class="list-group-item">
			      <b>Setor: </b> <a class="pull-right">{{ $user->setor }}</a>
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
</div>
@endsection
