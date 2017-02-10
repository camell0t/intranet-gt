@extends('perfil.info')

@section('content')   
  

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                <h3>Nova postagem</h3>
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('postagens.index')}}">Postagens</a></li>
                    <li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <form action="{{ route('postagem.salvar', $id) }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título da postagem">
                            @if($errors->has('titulo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>                        
                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="titulo">Descrição</label>
                            <input type="text" name="descricao" class="form-control" placeholder="Descrição da postagem">
                            @if($errors->has('descricao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descricao') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">                           
                            <label for="" class="form-label">Imagem destacada: </label>
                            
                                <input type="file" name="img">                                   
                            
                             <br/><small>A imagem deve ter dimensões aproximadamente de 240x150</small>                
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div style="padding-top:5px;"></div>                                                            
                        </div>
                        <div class="form-group {{ $errors->has('corpo') ? 'has-error' : '' }}">
                            <label for="corpo">Conteúdo</label>
                            <textarea name="corpo" id="summernote" cols="30" rows="3" class="form-control" placeholder="Conteúdo da postagem"></textarea>                           
                            @if($errors->has('corpo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('corpo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form form-group text-center">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                        </div>
                    </form>
                    </div>                                   
                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
          height:300,
        });
    });
</script>
@endsection
