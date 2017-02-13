@extends('perfil.info')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3>Ocorrências de ponto pendentes</h3>
    </div>
         <ol class="breadcrumb panel-heading" >
            <li><a href="{{route('perfil.index')}}">Painel</a></li>
            <li class="active">Ocorrências pendentes</li>
        </ol>  
        <div class="panel-body ">
            <div style="padding-left:15px; padding-right: 15px;">
            <a href="{{ route('ocorrencias.finalizadas') }}"><button class="btn btn-default">Ocorrências finalizadas</button></a>
            <div style="padding-bottom: 15px;"></div>        
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Período</th>
                            <th>Horário</th>
                            <th>Justificativa</th>
                            <th>Complemento</th>
                            <th>Situação</th>
                            <th>Observação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ocorrencias as $ocorrencia)
                        <tr>
                            <th scope="row">{{ $ocorrencia->user->name }}</th>
                            <td>{{ $ocorrencia->data }}</td>
                            <td>{{ $ocorrencia->periodo }}</td>
                            <td>{{ $ocorrencia->horario }}</td>
                            <td>{{ $ocorrencia->justificativa }}</td>
                            <td>{{ $ocorrencia->complemento }}</td>
                            <form action="{{ route('ocorrencias.finalizar', $ocorrencia->id) }}">
                            {{ csrf_field() }}
                                <td width="12%">
                                    <select name="situacao" id="situacao" class="form-control">
                                        <option value="{{ $ocorrencia->situacao }}">{{ $ocorrencia->situacao }}</option>
                                        <option value="Acatar">Acatar</option>
                                        <option value="Abonar">Abonar</option>
                                        <option value="Banco de horas">Banco de horas</option>
                                        <option value="Indeferida">Indeferida</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="obs" id="" cols="20" class="form-control" rows="1"></textarea>
                                </td>                          
                                <td width="15%">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </td>
                            </form>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        <div align="center">
            {!! $ocorrencias->links() !!}
        </div>                 
    </div>
</div>

@endsection