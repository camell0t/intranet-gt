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
    <p class="login-box-msg">Preencha os dados para o cadastro</p>
    <label class="label-control">Nome: </label> {{ $user->name }} {{ $user->sobrenome }}
    <br>
    <label class="label-control">Setor: </label> {{ $user->setor->nome }}
    <br><br>
    <form  role="form" method="POST" action="{{ route('registro.salva') }}">
    {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $user->id }}">
      <label class="label-control">Nome de usuário: </label>
      <div class="form-group has-feedback {{ $errors->has('login') ? ' has-error' : '' }}">
        <input type="text" class="form-control" placeholder="Insira seu login" name="login">
          @if ($errors->has('login'))
            <span class="help-block">
              <strong>{{ $errors->first('login') }}</strong>
            </span>
          @endif
          <span class="glyphicon glyphicon-user form-control-feedback"></span>  
      </div>
      <label class="label-control">Endereço de e-mail: </label>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="text" class="form-control" placeholder="Insira seu e-mail" name="email" value="{{ $user->email }}">
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>  
      </div>
      
      <label for="password" class="control-label">Senha</label>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" placeholder="Insira a senha">
          @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label for="password-confirm" class="control-label ">Confirme sua senha</label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a senha">
          @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
          @endif 
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>          
      </div>    
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
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
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
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
