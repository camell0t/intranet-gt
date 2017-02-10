@extends('perfil.info')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">
        <h3>Envio de contracheques</h3>
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
                            <th>Mês / ano - referência</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <form action="{{ route('contracheque.salva') }}" enctype="multipart/form-data" method="POST" > 
                            <tr>
                                <th scope="row">{{ $usuario->id }}</th>
                                <td>{{ $usuario->name }} {{$usuario->sobrenome}}</td>
                                <td>
                                    <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">                                
                                        <input id="name" type="text" class="form-control" name="referencia" value="{{ date('m-Y') }}">
                                        @if ($errors->has('referencia'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('referencia') }}</strong>
                                            </span>
                                        @endif                                
                                    </div>
                                </td>
                                <td width="40%">
                                     <div class="col-md-8 col-md-offset-2">                                     
                                        <input type="file" name="contracheque">                                        
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                                        <div style="padding-top:2px;"></div>
                                        <button type="submit" class="btn btn-primary"><b>Enviar</b></button>
                                        </form> 
                                         <a href="{{ route('contracheque.envios', $usuario->id) }}">
                                            <button class="btn btn-primary"><b>Envios anteriores</b></button>
                                        </a>                                           
                                    </div>

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