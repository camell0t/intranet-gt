@extends('perfil.info')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center">Alterar e-mail</h3>
                </div>
                  <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('perfil.index')}}">Painel</a></li>
                    <li class="active">Alterar e-mail</li>
                </ol>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('perfil.atualizaremail', $usuario->id) }}">
                        {{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
                        <div class="form-group">
                        	<label for="" class="col-md-4 control-label">Nome:</label>
                        	<label style="padding-left:15px; color: #404040" class="control-label">{{$usuario->name}}  {{ $usuario->sobrenome }}</label>                    
                        </div>                                       
                        <div class="form-group">
                        	<label for="" class="col-md-4 control-label">E-mail atual:</label>
                        	<label style="padding-left:15px; color: #404040" class="control-label">{{$usuario->email}}</label>                    
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Novo endereço de e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group" >
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
