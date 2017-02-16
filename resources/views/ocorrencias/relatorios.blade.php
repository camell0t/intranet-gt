@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="text-center">Relatórios de ocorrências</h3>               
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('ocorrencias.index')}}">Ocorrências de ponto</a></li>
                    <li class="active">Relatórios de ocorrências</li>
                </ol>
                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="{{ route('ocorrencias.relatorio_finalizadas') }}">
                        {{ csrf_field() }}                            
                        <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label for="usuario" class="col-md-4 control-label">Usuário: </label>
                            <div class="col-md-6">
                            <select name="usuario" id="empresa" class="form-control {{ $errors->has('usuario') ? ' has-error' : '' }}">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->sobrenome }}</option>
                                @endforeach
                            </select>
                                @if ($errors->has('usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Data inicial</label>
                            <div class="col-md-6">
                                <input type="text" id="date" name="data_inicio" class="form-control">
                            </div>                            
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-4">Data final</label>
                            <div class="col-md-6">
                                <input id="date2" type="text" name="data_fim" class="form-control">
                            </div>                            
                        </div>                    
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
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
