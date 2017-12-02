<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$id = $_GET['id'];
	$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$id'");
	$data = mysqli_fetch_array($query);
	?>
	<div class="row">
		<center><h3>Edit User</h3></center>
		<br><br>

			<div class="col-md-10">

				<form method="post">
					<div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama">Nama :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="nama" id="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama" value="<?php echo $data['nama']; ?>">
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
                          <input type="text" name="user" id="user" required="required" class="form-control col-md-7 col-xs-12" placeholder="Username" value="<?php echo $data['username']; ?>">
                        </div>
                      </div>

					

			    	<input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
					<a class="btn btn-sm btn-danger" href="?menu=data_user">Kembali</a>

				</form>

				<?php
					if (isset($_POST['fsimpan'])) {
						$nama = $_POST['nama'];
						$status = $_POST['status'];
						$user = $_POST['user'];

						$q ="UPDATE user SET nama='$nama', status='$status', username='$user' WHERE id='$id'";
						
						mysqli_query($koneksi,$q);
						?>

						<script type="text/javascript">
							alert('Berhasil merubah data !');
							document.location.href="?menu=data_user";
						</script>
						<?php
					}
				?>

			</div>
	</div>	
</body>
</html>