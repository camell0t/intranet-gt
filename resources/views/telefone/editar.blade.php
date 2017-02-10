@extends('perfil.info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('cliente.index')}}">Lista de clientes</a></li>
                    <li><a href="{{route('cliente.detalhe', $telefone->cliente->id)}}">Detalhe</a></li>
                    <li class="active">Editar telefone</li>
                </ol>
                <div class="panel-body ">
                <p><b>Cliente: </b>{{ $telefone->cliente->nome }}</p>
                    <form action="{{ route('telefone.atualizar', $telefone->id) }}" method="post">                   
                        {{ csrf_field() }}
                         <input type="hidden" name="_method" value="put">
                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo do telefone" value="{{ $telefone->titulo }}">         
                        </div>
                         <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                            <label for="numero">Número</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Número do telefone" value="{{ $telefone->telefone }}">         
                        </div>
                        <button class="btn btn-success" type="submit">Atualizar</button>
                    </form>                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
