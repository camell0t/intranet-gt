@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="text-center">Registro de nova ocorrência</h3>               
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('ocorrencias.index')}}">Minhas ocorrências</a></li>
                    <li class="active">Registro de ocorrência</li>
                </ol>
                <div class="panel-body ">
                <p><strong>Solicitante: </strong>{{$usuario->name}}  {{$usuario->sobrenome}}</p>
                <p><strong>Setor: </strong>{{$usuario->setor->nome}}</p>
                    <form class="form-horizontal" method="POST" action="{{ route('ocorrencias.salvar')}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$usuario->setor->id}}" name="setor">
                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">Data da ocorrência: </label>                            
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="data" >
                                <small>Exemplo: 01/01/2017</small>
                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('horario') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">Horário: </label>                            
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="horario" >
                                <small>Exemplo: 08:20</small>
                                @if ($errors->has('horario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('horario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('periodo') ? ' has-error' : '' }}">
                            <label for="periodo" class="col-md-4 control-label">Período: </label>
                            <div class="col-md-6">
                            <select name="periodo" id="empresa" class="form-control {{ $errors->has('periodo') ? ' has-error' : '' }}">
                                <option value="Manhã - Início">-</option>                           
                                <option value="Manhã - Início">Manhã - Início</option>
                                <option value="Manhã - Término">Manhã - Término</option>
                                <option value="Tarde - Início">Tarde - Início</option>
                                <option value="Tarde - Término">Tarde - Término</option>
                                <option value="Intermediário - Início">Intermediário - Início</option>
                                <option value="Intermediário - Término">Intermediário - Término</option>
                            </select>
                            <small>Não preencher para ausência</small>                               
                                @if ($errors->has('periodo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('periodo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('justificativa') ? ' has-error' : '' }}">
                            <label for="justificativa" class="col-md-4 control-label">Justificativa: </label>
                            <div class="col-md-6">
                            <select name="justificativa" id="empresa" class="form-control {{ $errors->has('justificativa') ? ' has-error' : '' }}">                       
                              <option value="Batida fora do horário">Batida fora do horário</option>
                              <option value="Batida não registrada">Batida não registrada</option>
                              <option value="Ausência">Ausência</option>
                              <option value="Viagem">Viagem</option>
                              <option value="Outra">Outra</option>
                            </select>            
                                @if ($errors->has('justificativa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('justificativa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group {{ $errors->has('complemento') ? 'has-error' : '' }}">
                            <label for="complemento" class="col-md-4 control-label" >Complemento: </label>
                            <div class="col-md-6">
                                <textarea name="complemento" cols="30" rows="3" class="form-control" maxlength="60" placeholder="Limite de 60 caracteres"></textarea>                           
                                @if($errors->has('complemento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-3 text-center">
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
