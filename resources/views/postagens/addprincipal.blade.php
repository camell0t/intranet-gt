@extends('perfil.info')

@section('content')   
  

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                <h3>Nova postagem principal</h3>
                </div>
                <ol class="breadcrumb panel-heading" >
                    <li><a href="{{route('postagemprincipal.index')}}">Postagens</a></li>
                    <li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
                    <div class="col-md-5 col-md-offset-3">
                         <form action="{{ route('postagemprincipal.salvar')}}" enctype="multipart/form-data" method="POST" >                        
                             <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                <label for="titulo" class="form-label">Titulo: </label>
                                <input type="text" name="titulo" class="form-control" placeholder="Título">
                                @if($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                                <label for="titulo" class="form-label">Descrição: </label>
                                <input type="text" name="descricao" class="form-control" placeholder="Descrição">
                                @if($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('referencia') ? 'has-error' : '' }}">
                                <label for="titulo" class="form-label">Link de outra postagem (Opcional): </label>
                                <input type="text" name="referencia" class="form-control" placeholder="http://intranet.gtrigueiro.com.br/postagem/25">
                                @if($errors->has('referencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group">                           
                                <label for="" class="form-label">Selecione uma imagem: </label>
                                
                                    <input type="file" name="img">                                   
                                
                                 <br/><small>A imagem deve ter dimensões aproximadamente de 770x300</small>                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div style="padding-top:5px;"></div>                                                            
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Adicionar">
                            </div>
                        </form>
                    </div>                                
                
                </div>
            </div>


@endsection
