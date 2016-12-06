<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Halaman Login | OLSHOP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>style/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>style/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>style/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /
        <!-- Theme style -->


  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>WELCOME!!!</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <!-- <span><?php echo $id_user; ?></span> -->
        <p class="login-box-msg" class="uppercase"><?php echo $info; ?></p>

        <form action="<?php echo base_url(); ?>login/login" id="form-login" method="post" accept-charset="utf-8">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="nama_user" placeholder="Nama Pengguna" required/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" value="" name="password" id="pass_user" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-4">
              <input type="submit" value="Login" id="submit-login" class="btn btn-primary btn-block btn-flat" />
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </body>
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>style/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>style/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


</html>
