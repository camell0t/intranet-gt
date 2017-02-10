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
                <p><strong>Usuário: </strong>{{$usuario->name}}  {{$usuario->sobrenome}}</p>
                <p><strong>E-mail: </strong>{{$usuario->email}}</p><br/>
                <p>Adicionar permissão:</p>
                <div style="padding-left: 20px; padding-right:20px;">
                 <form class="form-horizontal" method="POST" action="{{ route('usuario.atualizaacesso', $usuario->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <select name="role_id" class="form form-control text-center">
                            @foreach($allroles as $allrole)
                                <option value="{{$allrole->id}}">{{$allrole->name}}</option>
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
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->label}}</td>
                    <td><a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('usuario.deletaracesso',[$usuario->id, $role->id])}}' : console.log('false'))" class="btn btn-default text-danger glyphicon glyphicon-trash"></a></td>
                </tr>
            @endforeach
            </tbody>                     
            </table>
        </div>            
    </div>
</div>
@endsection
