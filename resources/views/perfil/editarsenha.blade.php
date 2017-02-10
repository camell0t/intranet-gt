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
              
                    <form class="form-horizontal" method="POST" action="{{ route('perfil.atualizarsenha', $usuario->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nome:</label>
                            <label style="padding-left:15px; color: #404040" class="control-label">{{$usuario->name}}  {{ $usuario->sobrenome }}</label>                    
                        </div>                  
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">E-mail:</label>
                            <label style="padding-left:15px; color: #404040" class="control-label">{{$usuario->email}}</label>                    
                        </div>
                         <div class="form-group {{ $errors->has('senhaatual') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha atual</label>

                            <div class="col-md-6">
                                <input id="senhaatual" type="password" class="form-control" name="senhaatual">

                                @if ($errors->has('senhaatual'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senhaatual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nova senha</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a nova senha</label>

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
