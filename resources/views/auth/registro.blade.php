<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intranet - Grupo G Trigueiro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.css">
   <script src="../js/jquery.js"></script> 
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
@if(Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                    {{ Session::get('flash_message')['msg'] }}
                </div>
            </div>
        </div>
    </div>
@endif  
<div class="login-box">
  <div class="login-logo">
   <b>Intranet</b><br>
   <p style="font-size: 28px;">Grupo G Trigueiro</p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Confirme seus dados para proseguir com o cadastro</p>

    <form action="{{ route('registro.verifica') }}" method="get">
    {{ csrf_field() }}
    <label class="label-control">CPF: </label>
       
          <div class="form-group has-feedback {{ $errors->has('cpf') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Insira seu CPF" name="cpf">
            <small>Exemplo: 27487463176</small>
            @if ($errors->has('cpf'))
              <span class="help-block">
                  <strong>{{ $errors->first('cpf') }}</strong>
              </span>
            @endif
            <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      
    <label class="label-control">Nascimento: </label>
      
          <div class="form-group has-feedback {{ $errors->has('nascimento') ? ' has-error' : '' }}">
            <input type="text" id="date" class="form-control" placeholder="Data de nascimento" name="nascimento">
            <small>Exemplo: 01/01/1989</small>
            @if ($errors->has('nascimento'))
              <span class="help-block">
                  <strong>{{ $errors->first('nascimento') }}</strong>
              </span>
           @endif
            <span class="glyphicon glyphicon glyphicon-calendar form-control-feedback"></span>
          </div>
      
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Continuar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
