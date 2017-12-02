<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$id = $_GET['nomor_kartu'];
	$query = mysqli_query($koneksi,"SELECT * FROM kis WHERE nomor_kartu='$id'");
	$data = mysqli_fetch_array($query);
	?>
	<div class="row">
		<center><h3>Edit Kartu Indonesia Sehat</h3></center>
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
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="alamat">Alamat :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="alamat" id="alamat" required="required" class="form-control col-md-7 col-xs-12" placeholder="Alamat" value="<?php echo $data['alamat']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Lahir :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <div class="input-group date">
                              <input type="date" class="form-control" name="lahir" required="required" value="<?php echo $data['lahir']; ?>">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nik">NIK :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" name="nik" id="nik" required="required" class="form-control col-md-7 col-xs-12" placeholder="NIK" value="<?php echo $data['nik']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="photo">Photo :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="file" name="photo" id="photo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Photo" value="<?php echo $data['faskes']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="faskes">Faskes :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="faskes" id="faskes" required="required" class="form-control col-md-7 col-xs-12" placeholder="Faskes" value="<?php echo $data['faskes']; ?>">
                        </div>
                      </div>

					

			    	<input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
					<a class="btn btn-sm btn-danger" href="?menu=data_kis">Kembali</a>

				</form>

				<?php
					if (isset($_POST['fsimpan'])) {
						$nama = $_POST['nama'];
						$alamat = $_POST['alamat'];
						$lahir = $_POST['lahir'];
						$nik = $_POST['nik'];
						$faskes = $_POST['faskes'];
						$fileName = $_FILES['photo']['name'];

						move_uploaded_file($_FILES['photo']['tmp_name'], "photo/".$_FILES['photo']['name']);

						$q ="UPDATE kis SET nama='$nama', alamat='$alamat', lahir='$lahir', nik='$nik', photo='$fileName', faskes='$faskes' WHERE nomor_kartu='$id'";
						
						mysqli_query($koneksi,$q);
						?>

						<script type="text/javascript">
							alert('Berhasil merubah data !');
							document.location.href="?menu=data_kis";
						</script>
						<?php
					}
				?>

			</div>
	</div>	
</body>
</html>