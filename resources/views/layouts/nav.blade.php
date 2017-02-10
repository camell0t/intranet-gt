<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intranet - Grupo G Trigueiro</title>
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/aniversariantes.css">

  <script src="/js/jquery.js"></script> 
  <script src="/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" style="padding-bottom: 50px;">



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Intranet - Grupo G Trigueiro</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Início</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Eventos</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                class="glyphicon glyphicon-list-alt"></span>Widgets <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://www.jquery2dotnet.com">Action</a></li>
                    <li><a href="http://www.jquery2dotnet.com">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                class="glyphicon glyphicon-search"></span>Search <b class="caret"></b></a>
                <ul class="dropdown-menu" style="min-width: 300px;">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="navbar-form navbar-left" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            Go!</button>
                                    </span>
                                </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">            
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('perfil.index') }}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
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
       
    
        
        <div class="container" style="padding-top: 70px;">
            <div class="col-md-12">
                <div class="row">
                    @if(Session::has('flash_message'))
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                                        {{ Session::get('flash_message')['msg'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                </div>                
            </div>
        </div>
           
   

    <!-- Scripts -->
    
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="js/bootstrap.min.js"></script>
    

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