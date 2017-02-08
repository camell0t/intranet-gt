@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                <h2>Lista de clientes</h2>
                </div>

                <div class="panel-body ">
                    <p>
                        <a class="btn btn-primary" href="{{ route('cliente.adicionar') }}">Adicionar</a>
                    </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Endereço</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->email}}</td>
                                    <td>{{ $cliente->endereco }}</td>
                                    <td>
                                    <a class="btn btn-default" href="{{ route('cliente.detalhe', $cliente->id) }}">Detalhe</a>
                                        <a class="btn btn-default" href="{{ route('cliente.editar', $cliente->id) }}">Alterar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('cliente.deletar', $cliente->id)}}' : console.log('false'))">Deletar</a>

                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    <div align="center">
                        {!! $clientes->links() !!}
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
