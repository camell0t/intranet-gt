@extends('perfil.info')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3>Usuários cadastrados</h3>
    </div>
         <ol class="breadcrumb panel-heading" >
            <li><a href="{{route('perfil.index')}}">Painel</a></li>
            <li class="active">Usuários cadastrados</li>
        </ol>  
        <div class="panel-body ">
            <div style="padding-left:15px; padding-right: 15px;"">
            <a href="{{ route('perfil.registro') }}"><button class="btn btn-primary">Adicionar</button></a>            
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Função</th>
                            <th>E-mail</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $usuario->id }}</th>
                            <td>{{ $usuario->name }} {{$usuario->sobrenome}}</td>
                            <td>{{ $usuario->funcao}}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                            <a class="btn btn-default" href="{{ route('usuario.editar', $usuario->id) }}">Editar</a>
                            <a class="btn btn-default" href="{{ route('usuario.acesso', $usuario->id) }}">Acesso</a>
                            <a class="btn btn-default" href="{{ route('usuario.editarsenha', $usuario->id) }}">Alterar Senha</a>
                            <a class="btn btn-default glyphicon glyphicon-trash text-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('usuario.deletar', $usuario->id )}}' : console.log('false'))"></a>

                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        <div align="center">
            {!! $usuarios->links() !!}
        </div>                 
    </div>
</div>

@endsection