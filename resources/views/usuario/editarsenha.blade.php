@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2 class="text-center">Alterar Senha</h2>               
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('usuario.index')}}">Usuários</a></li>
                    <li class="active">Alterar senha</li>
                </ol>
                <div class="panel-body ">
                <p><strong>Usuário: </strong>{{$usuario->name}}  {{$usuario->sobrenome}}</p>
                <p><strong>E-mail: </strong>{{$usuario->email}}</p>
                <br/>
                    <form class="form-horizontal" method="POST" action="{{ route('usuario.atualizarsenha', $usuario->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>          
                        
                       
             
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>                             
                        </div>
                    </form>                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
