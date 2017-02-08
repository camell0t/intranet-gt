@extends('perfil.info')
@section('content')
<div class="container">
	<div class="col-md-6 well">
		<div class="col-md-4 text-center">
			<img src="/uploads/perfil/{{ $user->avatar }}" class="img-circle" width="150" height="150">
			<div style="padding-bottom: 5px;"></div>
			<form action="{{ route('perfil.atualizaravatar')}}" enctype="multipart/form-data" method="POST" >
		    <label class="btn btn-default btn-file">
		        Nova imagem <input type="file" name="avatar" style="display: none; ">
		    </label>		    	
		    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	<div style="padding-top:5px;"></div>
		    	<input type="submit" class="btn btn-sm btn-primary btn-block" value="Alterar">
		    </form>
	    </div>
		<div class="col-md-8" id="box-toggle">
		    <h3>Bem vindo {{ $user->name }}</h3>
		    
		</div>
	</div>
</div>


@endsection
