@extends('layouts.nav')

@section('content')
<style>
 #scroll {
  
  height:200px;
  
  overflow:auto;
}
</style>

<!-- INICIO POSTAGENS-->
<div class="col-xs-9">
    <div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
      <!-- Indicators -->
        <ol class="carousel-indicators">
         <?php $ind = true ?>
            @for($i=0; $i<=count($postPrinc); $i++)
                
                <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ $ind ? ' active' : '' }}"></li>
                <?php $ind = false ?>
            @endfor

        </ol>
          <?php $isFirst = true ?>
           <div class="carousel-inner">
                @foreach($postPrinc as $post)                           
                <div class="item {{ $isFirst ? ' active' : '' }}">
                      <a href="{{ $post->referencia }}"><img src="/uploads/postprincipal/{{ $post->img}}" alt=""></a>
                    <div class="carousel-caption">
                        <h2>{{ $post->titulo}}</h2>
                        <p>{{ $post->descricao}}</p>
                    </div>
                </div>                       
                  <?php $isFirst = false ?>
                @endforeach
            </div>
             
      <!-- Wrapper for slides -->
       

      <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
    </div>
        <div style="padding-top: 10px; padding-bottom: 5px;">                
            <h2>Notícias recentes</h2>            
        </div>
        @forelse($posts as $post)
            <div>
                <div class="col-md-12 postagem">                         
                    <img  style="padding-right: 25px;" align="left" class="img-responsive" src="/uploads/post/{{ $post->img_destacada}}" alt="">                   
                        <h4 style="font-size: 22px;">
                            <a style="color: #333;" href="{{ route('home.postagem', $post->id) }}">{{ $post->titulo}}</a>
                        </h4>
                        <p><span class="glyphicon glyphicon-time"></span> Postado em {{ $post->created_at }}</p>                                    
                        <p>{!! str_limit(strip_tags($post->corpo,350)) !!}</p>                  
                        <div class="row">
                            <div style="padding-right: 25px;" >
                                <a class="btn btn-default pull-right" href="{{ route('home.postagem', $post->id) }}">Leia mais...<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>                
                </div>
            </div>                           
        @empty
        <p>Nenhum post cadastrado</p>

        @endforelse
        
        <div align="center">
            {!! $posts->links() !!}
        </div> 
</div>
<!-- FIM POSTAGENS--> 
<!-- INICIO SIDEBAR-->               
@include('layouts.sidebar')

<!-- FIM SIDEBAR-->




            
            

            <!-- Blog Sidebar Widgets Column -->
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
    



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
@endsection


  