<?php 
  include "inc/koneksi.php";
  session_start();
    if (@$_SESSION['userweb'] !="" ) {
      if ($_SESSION['level']="admin") {
        header('location:admin/index.php');
      }
      elseif ($_SESSION['level']="user") {
        header('location:user/index.php'); 
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Login</title>  
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
  <br><br>
    <div class="container">
      <center>
        <div class="col-md-5 col-md-offset-3">

          <div class="panel panel-success">
            <div class="panel-heading">
            <h2><b><span class="glyphicon glyphicon-plus"></span> Kartu Indonesia Sehat</b></h2>
            <hr>
            </div>

              <div class="panel-body">
              <br>

                <div class="col-md-12">
                  <form method="post">
                <div class="input-group">
                    <span class="glyphicon glyphicon-user input-group-addon"> :</span>
                    <input type="text" name="user" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required="required">
                </div>
                <br> 
                <div class="input-group">
                    <span class="glyphicon glyphicon-lock input-group-addon" id="basic-addon1"> :</span>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required="required">
                </div>
                <br>
             

                    <input type="submit" name="login" class="btn btn-block btn-success" value="Login">
                  </form>
                
                  <?php 
                    if (isset($_POST['login'])) {
                      $user = $_POST['user'];
                      $password = $_POST['password'];

                      $login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$user' AND password=('$password')");
                      $cek = mysqli_num_rows($login);
                      $data = mysqli_fetch_array($login);

                      if ($cek < 1) {
                      ?>
                      <br>
                      <div class="alert alert-danger">
                        Maaf Username atau Password Salah !
                      </div>

                      <?php
                      }
                      else {
                        if ($data['status']=="Tidak Aktif") {
                      ?>
                      
                      <br>
                      <div class="alert alert-danger">
                        Maaf User anda tidak aktif !
                      </div>  

                      <?php
                        }
                        else if ($data['status']=="Aktif") {
                          $_SESSION['userweb']=$data['id'];

                          if ($data['akses']=="admin") {
                            $_SESSION['level']="admin";

                            header("location:admin/index.php");
                          }
                          else if($data['akses']=="user") {
                            $_SESSION['level']="user";

                            header("location:user/index.php");
                          }
                        }
                      }
                    }
                   ?>

                </div>
          </div>
        </div>
      </center>
    </div>


    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
