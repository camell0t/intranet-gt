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
                    @foreach($contracheques as $contracheque)
                    <li class="list-group-item">
                        <p>
                            <b>Referência: </b>{{ $contracheque->referencia }}
                            <a href="{{ route('contracheque.download', $contracheque->id) }}">
                                <button class="btn btn-primary pull-right">Download</button>
                            </a>                            
                        </p>
                    </li>                    
                    @endforeach                                    
                </ul>
                <div align="center">
                    {!! $contracheques->links() !!}
                </div>
                                
            </div>          
        </div>
    </div>


    

@endsection
