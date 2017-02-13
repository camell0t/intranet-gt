@extends('layouts.nav')

@section('content')

<div class="col-md-9">         
     <div class="col-md-12 postagem">    
        <div style="padding-bottom: 15px;">              
            <h3>
                <a href="#">{{ $post->titulo}}</a>
            </h3>
            <p><span class="glyphicon glyphicon-time"></span> Postado em {{ $post->created_at }}</p>
            <div style="padding-top: 10px;">
                {!!($post->corpo) !!}
            </div>
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
@endsection
