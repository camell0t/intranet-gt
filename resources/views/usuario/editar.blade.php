@extends('perfil.info')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                <h2>Atualizar registro</h2>
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('usuario.index')}}">Usuários</a></li>
                    <li class="active">Atualizar</li>
                </ol>
                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="{{ route('usuario.atualizar', $usuario->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" >

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
                                <input id="name" type="text" class="form-control" name="sobrenome" value="{{ $usuario->sobrenome }}" >

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
                                <input id="name" type="text" class="form-control" name="cpf" value="{{ $usuario->cpf }}" >

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">Data de nascimento</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="nascimento" value="{{ implode('/',array_reverse(explode('-',$usuario->nascimento))) }}" >

                                @if ($errors->has('nascimento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('setor') ? ' has-error' : '' }}">
                            <label for="setor" class="col-md-4 control-label">Setor</label>

                            <div class="col-md-6">
                                <input id="setor" type="text" class="form-control {{ $errors->has('setor') ? ' has-error' : '' }}" name="setor" value="{{ $usuario->setor }}" >
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
                                <input id="funcao" type="text" class="form-control {{ $errors->has('funcao') ? ' has-error' : '' }}" name="funcao" value="{{ $usuario->funcao }}" >
                                @if ($errors->has('funcao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('funcao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label for="empresa" class="col-md-4 control-label">Empresa</label>

                            <div class="col-md-6">
                            <select name="empresa" id="empresa" class="form-control {{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <option value="{{ $usuario->empresa }}">{{ $usuario->empresa }}</option>
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
                        <div class="col-md-6 col-md-offset-3">
                        <div class="form-group" >
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>                             
                        </div>
                    </form>                                
                </div>
            </div>
    
@endsection
