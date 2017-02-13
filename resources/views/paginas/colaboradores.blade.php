@extends('layouts.nav')

@section('content')

<div class="col-md-9">
    <div class="postagem col-md-12">
     <h2>Colaboradores</h2>
     <hr>     
        @foreach($usuarios as $usuario)        
            <div class="col-md-2">
                <img src="/uploads/perfil/{{ $usuario->avatar }}" class="img-circle img-responsive" style="width:85px; height: 85px;">
            </div>
            <div class="col-md-10">
                <b>Nome: </b> <a>{{ $usuario->name }} {{ $usuario->sobrenome }}</a><br>
                <b>Setor: </b>{{ $usuario->setor->nome }}<br>
                <b>Função: </b>{{ $usuario->funcao }}<br>
                <b>E-mail: </b>{{ $usuario->email }}<br>                
                <hr> 
            </div>        
        @endforeach
         <div align="center">
            {!! $usuarios->links() !!}
        </div>
    </div>
</div>

@include('layouts.sidebar')
          
<div class="row">
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; G TRIGUEIRO 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>
</div>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
@endsection


