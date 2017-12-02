<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

	<div class="row">
		<center><h3>Tambah User</h3></center>
		<br><br>
			<div class="col-md-10">

				<form method="post" class="form-horizontal form-label-left">
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama">Nama :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="nama" id="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama">
                        </div>
                      </div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Status :</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
				    		<select name="status" class="form-control" required="required" id="status" class="form-control">
				    			<option class="form-control">Aktif</option>
				    			<option class="form-control">Tidak Aktif</option>
				    		</select>
				    	</div>
					</div>

					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="user">Username :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="user" id="user" required="required" class="form-control col-md-7 col-xs-12" placeholder="Username">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pass">Password :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="password" name="pass" id="pass" required="required" class="form-control col-md-7 col-xs-12" placeholder="Password">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-sm btn-danger" href="?menu=data_user">Kembali</a>
                          <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                        </div>
                      </div>
				</form>

				<?php
					if (isset($_POST['fsimpan'])) {
						$nama = $_POST['nama'];
						$status = $_POST['status'];
						$user = $_POST['user'];
						$pass = $_POST['pass'];
						$akses = "user";

						$q ="INSERT INTO user(nama, status, username, password, akses) VALUES ('$nama','$status','$user','$pass','$akses')";
						mysqli_query($koneksi,$q);
						?>
						<script type="text/javascript">
							alert('Berhasil !');
							document.location.href="?menu=data_user";
						</script>
						<?php
					}
				?>

			</div>
	</div>	
</body>
</html>