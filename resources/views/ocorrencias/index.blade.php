@extends('perfil.info')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3>Minhas ocorrências de ponto</h3>
    </div>
         <ol class="breadcrumb panel-heading" >
            <li><a href="{{route('perfil.index')}}">Painel</a></li>
            <li class="active">Minhas ocorrências de ponto</li>
        </ol>  
        <div class="panel-body ">
            <div style="padding-left:15px; padding-right: 15px;">
            <a href="{{ route('ocorrencias.registro') }}"><button class="btn btn-default">Nova ocorrência</button></a>
            <a href="{{ route('ocorrencias.finalizadas_usuario') }}"><button class="btn btn-default">Finalizadas</button></a>    
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
                            <td>{{ $ocorrencia->situacao }}</td>
                            <td width="15%">
                            <a class="btn btn-default" href="#">Editar</a>
                            <a class="btn btn-default glyphicon glyphicon-trash text-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('ocorrencias.delete', $ocorrencia->id) }}' : console.log('false'))"></a>

                            </td>
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