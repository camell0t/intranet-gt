<div class="col-xs-3">
        <div style="padding-bottom: 10px;">
            <a href="{{ route('perfil.index') }}" class="btn btn-app"><i class="fa fa-user""></i>Meu perfil</a>
            <a href="{{ route('colaboradores.index') }}" class="btn btn-app"><i class="fa fa-users""></i>Colaboradores</a>
            <a href="#" class="btn btn-app"><i class="fa fa-file-text-o""></i>Documentos</a>            
            <a href="#" class="btn btn-app"><i class="fa fa-calendar-check-o""></i>Calendário</a>
            <a href="#" class="btn btn-app"><i class="fa fa-files-o""></i>Manuais</a>
            <a href="#" class="btn btn-app"><i class="fa fa-pencil-square-o"></i>Solicitações</a>
        </div>
            
        <!-- INICIO ANIVERSARIANTES -->            
        @if($countMes > 0)
        <div class="box box-danger">
            <div class="box-body box-profile text-center">
                <h4 style="font-size: 21px;"><i class="fa fa-birthday-cake "></i>  Aniversariantes do mês</h4>
                <div class="col-md-12" id="scroll">                                    
                     @foreach($aniversarioMes as $userMes)
                        <div class="row">
                            <div class="profile-header-container">                                   
                                <div class="profile-header-img col-md-4 nopadding-right">          
                                    <img src="/uploads/perfil/{{ $userMes->avatar }}" class="img-circle">
                                    <div class="rank-label-container">
                                        <span class="label label-default rank-label" style="font-size: 10px; color:white;"><b>{{ $userMes->nascimento }}</b></span>
                                    </div>
                                </div>                                   
                                <div class="profile-header-name col-md-8 nopadding-right nopadding-left">
                                    {{ $userMes->name }} {{ $userMes->sobrenome}}<br>
                                    <small>{{ $userMes->funcao }}</small>
                                </div>
                            </div>
                        </div> 
                    @endforeach                                         
                </div>                              
           </div>
        </div>
        @endif
        <!-- FIM ANIVERSARIANTES -->
        <!-- INICIO ENQUETES -->
        @foreach($enquetes as $enquete)
            <div class="box box-danger">
                <div class="box-body box-profile"> 
                <h4 style="font-size:21px;"class="text-center">O que você achou da nova intranet?</h4>                    
                    <ul>                             
                        <form action="{{ route('enquete.salvar', $enquete->id) }}" method="post"> 
                            {{ csrf_field() }}                            
                            <div class="form-check">                                                        
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="resposta" value="{{$enquete->opcao1}}" checked> {{$enquete->opcao1}}
                                </label>
                            </div>
                            <div class="form-check">
                                 <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="resposta" value="{{$enquete->opcao2}}"> {{$enquete->opcao2}}
                                </label>
                            </div>
                            <div class="form-check">
                                 <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="resposta" value="{{$enquete->opcao3}}"> {{$enquete->opcao3}}
                                </label>
                            </div>
                            <div class="form-check">
                                 <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="resposta" value="{{$enquete->opcao4}}"> {{$enquete->opcao4}}
                                </label>
                            </div>
                            <div class="form-check">
                                 <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="resposta" value="{{$enquete->opcao5}}"> {{$enquete->opcao5}}
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input type="submit" value="Votar" class="btn btn-danger btn-block">
                                    </div>
                                </div>
                            </div>                                                                     
                        </form>
                    </ul>
                </div>
            </div>

                               
        @endforeach
        <!-- FIM ENQUETES -->
        <!-- INICIO FORMULARIOS -->
        @foreach($sugestoes as $sugestao)
            <div class="box box-danger">
                <div class="box-body box-profile text-center">
                <h4 style="font-size: 21px">Deixe aqui sua opnião</h4>
                    <div class="col-md-12">                            
                         <form action="{{ route('formulario.salvar', $sugestao->id) }}" method="post"> 
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('mensagem') ? ' has-error' : '' }}">
                                <p>{{ $sugestao->corpo }}</p>
                                <textarea name="mensagem" cols="30" rows="3" class="form-control" placeholder="Sugestão"></textarea>
                                @if ($errors->has('mensagem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mensagem') }}</strong>
                                    </span>
                                @endif                                
                            </div>                            
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" value="Enviar" class="btn btn-danger btn-block">
                                </div>
                            </div>
                        </form>                            
                    </div>
                </div>                                
            </div>
        @endforeach
</div>