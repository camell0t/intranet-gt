<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intranet - Grupo G Trigueiro</title>

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
 
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   
    <script src="/js/jquery.js"></script> 
    <script src="/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script src="/js/jquery-ui.js"></script>
    
    

  <script>

  $(document).ready(function() {
            $("#date").keyup(function(){
                if ($(this).val().length == 2){
                    $(this).val($(this).val() + "/");
                }else if ($(this).val().length == 5){
                    $(this).val($(this).val() + "/");
                }
            });
});
  </script>



  
   
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body  >

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        
        <a class="navbar-brand" href="/">Intranet - Grupo G Trigueiro</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/"><span class="glyphicon glyphicon-home"></span> Início</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">            
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('perfil.index') }}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
                    <li class="divider"></li>
                    
                    <li><a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span> Sair</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
           
<div class="col-md-12"> 
    <div class="col-md-2">
            <div class="row">
                <div class="">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-user-circle">
                                    </span> Meu perfil</a>
                                </h4>
                            </div>
                            <style>
                               
                            </style>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <i style="padding-right: 6px;" class="fa fa-tachometer" aria-hidden="true"></i><a href="{{ route('perfil.index') }}">Dashboard</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i style="padding-right: 5px;" class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="{{ route('perfil.editaremail') }}">Alterar e-mail</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i style="padding-right: 10px;" class="fa fa-lock" aria-hidden="true"></i><a href="{{ route('perfil.editarsenha') }}">Alterar senha</a>
                                            </td>
                                        </tr>                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="fa fa-th-list">
                                    </span> Sistemas</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <a href="#">Teste</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">Teste 2</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">Teste 3</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->can('Administrador'))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="fa fa-users">
                                    </span> Usuários</a>
                                </h4>
                            </div>                            
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <span style="padding-right: 10px;" class="fa fa-user"></span><a href="{{ route('usuario.index') }}">Usuários cadastrados</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <span style="padding-right: 6px;" class="fa fa-user-plus"></span><a href="{{ route('perfil.registro') }}">Cadastro de usuário</a>
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                            </div>                             
                        </div>
                        @endif
                        @if (Auth::user()->can('Qualidade'))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="fa fa-newspaper-o">
                                    </span> Postagens</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-list-alt"></span><a href="{{ route('postagens.index') }}">Postagens</a>
                                            </td>
                                        </tr>                                        
                                         <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-list-alt"></span><a href="{{ route('postagemprincipal.index') }}">Postagens principais</a>
                                            </td>
                                        </tr>                                                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-10">
        @if(Session::has('flash_message'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                            {{ Session::get('flash_message')['msg'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endif  
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</body>
</html>