@extends('perfil.info')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3>Ocorrências finalizadas</h3>
    </div>
         <ol class="breadcrumb panel-heading" >
            <li><a href="{{route('ocorrencias.lista')}}">Ocorrências pendentes</a></li>
            <li class="active">Ocorrências finalizadas</li>
        </ol>  
        <div class="panel-body ">
            <div style="padding-left:15px; padding-right: 15px;">
                
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
                            <th>Finalizada</th>
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
                            <td>{{ $ocorrencia->situacao }}</td>
                            <td>{{ $ocorrencia->obs }}</td>
                            <td>{{ $ocorrencia->updated_at }}</td>                            
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