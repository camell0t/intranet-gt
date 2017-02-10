@extends('perfil.info')


@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center">Cadastro de usuário</h3>
                </div>
                  <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('usuario.index')}}">Usuários</a></li>
                    <li class="active">Cadastro de usuário</li>
                </ol>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('perfil.registro.salvar') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sobrenome') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Sobrenome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="sobrenome" value="{{ old('sobrenome') }}" >

                                @if ($errors->has('sobrenome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sobrenome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" >

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nascimento</label>
                            <div class="col-md-6">                        
                                    <div class="">
                                        <input size="16" type="text" value="" class="form-control" id="date" name="nascimento">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    <small>Exemplo: 01/01/1999</small>                                     
                                                                    
                                    @if ($errors->has('nascimento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nascimento') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('setor') ? ' has-error' : '' }}">
                            <label for="funcao" class="col-md-4 control-label">Setor</label>

                            <div class="col-md-6">
                                <input id="setor" type="text" class="form-control {{ $errors->has('setor') ? ' has-error' : '' }}" name="setor" value="{{ old('setor') }}" >
                                @if ($errors->has('setor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('setor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('funcao') ? ' has-error' : '' }}">
                            <label for="funcao" class="col-md-4 control-label">Função</label>

                            <div class="col-md-6">
                                <input id="funcao" type="text" class="form-control {{ $errors->has('funcao') ? ' has-error' : '' }}" name="funcao" value="{{ old('funcao') }}" >
                                @if ($errors->has('funcao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('funcao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        
                        <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label for="funcao" class="col-md-4 control-label">Empresa</label>

                            <div class="col-md-6">
                            <select name="empresa" id="empresa" class="form-control {{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <option value="">Selecione uma empresa</option>
                                <option value="G TRIGUEIRO TECNOLOGIA LTDA">G TRIGUEIRO TECNOLOGIA LTDA</option>
                                <option value="G TRIGUEIRO BRASIL SERVIÇOS TECNOLÓGICOS LTDA">G TRIGUEIRO BRASIL SERVIÇOS TECNOLÓGICOS LTDA</option>
                                <option value="MAQUINAS E EQUIPAMENTOS COMERCIAL LTDA">MAQUINAS E EQUIPAMENTOS COMERCIAL LTDA</option>
                                <option value="MAQUIP LOCAÇÃO E SERVIÇOS EIRELI - EPP">MAQUIP LOCAÇÃO E SERVIÇOS EIRELI - EPP</option>
                            </select>                               
                                @if ($errors->has('empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço de e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                            <label for="password-confirm" class="col-md-4 control-label ">Confirme sua senha</label>
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



@endsection
