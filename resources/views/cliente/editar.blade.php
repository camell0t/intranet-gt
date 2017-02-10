@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                <h2>Atualizar registro</h2>
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('cliente.index')}}">Lista de clientes</a></li>
                    <li class="active">Alterar</li>
                </ol>
                <div class="panel-body ">
                    <form action="{{ route('cliente.atualizar', $cliente->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do cliente" value="{{ $cliente->nome }}">                            
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="Endereço de e-mail do cliente" value="{{ $cliente->email }}">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente" value="{{ $cliente->endereco }}">                       
                        </div>
                        <button class="btn btn-success" type="submit">Atualizar</button>
                    </form>                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
