<?php
  include "../inc/koneksi.php";
  session_start();
  if ($_SESSION['userweb']=="") {
    header("location:../index.php");
  }
  if ($_SESSION['level']=="admin") {
    header("location:../admin/index.php");
  }
  $qprofil = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$_SESSION[userweb]'");
  $profil = mysqli_fetch_array($qprofil);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Toko Buku ( Kasir )</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Toko Buku</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $profil['nama']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?menu=profil"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="?menu=setting"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../inc/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
          </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
          <?php
            @$menu = $_GET['menu'];
          ?>

          <ul class="nav nav-sidebar">
            <li <?php if($menu==""){echo "class='active'";}?>> <a href="index.php">Beranda</a></li>
            <li <?php if($menu=="data_kis"){echo "class='active'";}?>> <a href="?menu=data_kis">Data Kartu Indonesia Sehat</a></li>
          </ul>

        </div>
        <!-- pengisian konten -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
          error_reporting(0);
          switch($_GET['menu']){

            case 'data_kis':
            include "menu/data_kis.php";
            break;

            case 'profil':
            include "menu/profil.php";
            break;

            case 'edit_profil':
            include "menu/edit_profil.php";
            break;

            case 'print_kis':
            include "menu/print_kis.php";
            break;

            case 'setting':
            include "menu/setting.php";
            break;

            default:
            include "menu/dashboard.php";
            break;
          }
        ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
