@extends('perfil.info')
@section('content')

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                	<h3>Gerenciamento de Postagens</h3>
                </div>
                <div class="panel-body ">                   
                    <div style="padding-left:15px; padding-right: 15px;"">
                     <p>
                        <a class="btn btn-default" href="{{ route('postagem.adicionar')}}">Adicionar postagem</a>
                    </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th style="width: 30%;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                           	@foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ $post->titulo}}</td>
                                    <td class="text-center">
                                    <a class="btn btn-default" href="{{ route('postagem.editar', $post->id) }}">Editar</a>
                                    <a class="btn btn-default" href="#">Detalhes</a>
                                    <a class="btn btn-default text-danger glyphicon glyphicon-trash" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('postagem.deletar', $post->id )}}' : console.log('false'))"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        {!! $posts->links() !!}
                    </div>  
                    
                </div>
            </div>

@endsection