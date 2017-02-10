@extends('perfil.info')
@section('content')
<section style="padding-bottom: 20px;" class="content-header">
    <h1>
   Contracheques
    <small></small>
    </h1>
</section>
    
    
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-body box-profile">                
                <ul class="list-group list-group-unbordered">

                    @forelse($contracheques as $contracheque)
                    <li class="list-group-item">
                        <p><b>Nome: </b>{{ $contracheque->user->name }} {{ $contracheque->user->sobrenome }}</p>
                        <p>
                            <b>Referência: </b>{{ $contracheque->referencia }}
                             <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('contracheque.delete', $contracheque->id) }}' : console.log('false'))">
                                <button class="btn btn-primary pull-right">Deletar</button>
                            </a>
                            <a href="{{ route('contracheque.download', $contracheque->id) }}">
                                <button class="btn btn-primary pull-right">Download</button>
                            </a>                            
                        </p>
                        <p><b>Data de envio: </b>{{ $contracheque->created_at }}</p>
                    </li>
                    @empty
                    <p>Nenhum registro disponível</p>                    
                    @endforelse                                    
                </ul>
                <div align="center">
                    {!! $contracheques->links() !!}
                </div>
                                
            </div>          
        </div>
    </div>


    

@endsection
