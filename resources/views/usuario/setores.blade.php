@extends('perfil.info')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="text-center">Editar nível de Acesso</h3>               
    </div>
        <ol class="breadcrumb panel-heading" >
            <li><a href="{{route('usuario.index')}}">Usuários</a></li>
            <li class="active">Acesso</li>
        </ol>
    <div class="panel-body ">
        <div class="col-md-4">
            <div class="well">
               
                <p>Adicionar permissão:</p>
                <div style="padding-left: 20px; padding-right:20px;">
                             <form class="form-horizontal" method="POST" action="#">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                    <div class="form-group">
                                        <select name="usuario" class="form form-control text-center">
                                        @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>                 
                            </div>
                            <div style="padding-left: 20px; padding-right:20px;">
                             
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                    <div class="form-group">
                                        <select name="setor" class="form form-control text-center">
                                        @foreach($setores as $setor)
                                            <option value="{{$setor->id}}">{{$setor->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="padding-top:0px;">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Adicionar
                                            </button>
                                        </div>                             
                                    </div>                   
                            </form>
                </div>
            </div>
        </div>
         
        <div class="col-md-8" style="padding-left: 15px; padding-right: 15px;">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Perfis de acesso</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($setores as $setor)
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="#"></a></td>
                </tr>
            @endforeach
            </tbody>                     
            </table>
        </div>            
    </div>
</div>
@endsection
