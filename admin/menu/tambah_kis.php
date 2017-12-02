<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

	<div class="row">
		<center><h3>Tambah Kartu Indonesia Sehat</h3></center>
		<br><br>
			<div class="col-md-10">

				<form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nomor_kartu">Nomor Kartu :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" name="nomor_kartu" id="nomor_kartu" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor Kartu">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama">Nama :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="nama" id="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="alamat">Alamat :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="alamat" id="alamat" required="required" class="form-control col-md-7 col-xs-12" placeholder="Alamat">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Lahir :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <div class="input-group date">
                              <input type="date" class="form-control" name="lahir" required="required">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nik">NIK :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" name="nik" id="nik" required="required" class="form-control col-md-7 col-xs-12" placeholder="NIK">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="photo">Photo :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="file" name="photo" id="photo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Photo">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="faskes">Faskes :</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="faskes" id="faskes" required="required" class="form-control col-md-7 col-xs-12" placeholder="Faskes">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-sm btn-danger" href="?menu=data_kis">Kembali</a>
                          <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                        </div>
                      </div>
				</form>

				<?php
					if (isset($_POST['fsimpan'])) {
						$nomor = $_POST['nomor_kartu'];
						$nama = $_POST['nama'];
						$alamat = $_POST['alamat'];
						$lahir = $_POST['lahir'];
						$nik = $_POST['nik'];
						$faskes = $_POST['faskes'];
						$fileName = $_FILES['photo']['name'];

						//$folder = "gambar";
						//$tmp_name = $_FILES["photo"]["tmp_name"];
						//$name = $folder."/".$_FILES["photo"]["name"];

						//move_uploaded_file($tmp_name, $name);
						move_uploaded_file($_FILES['photo']['tmp_name'], "photo/".$_FILES['photo']['name']);

						//$uploaddir = '/photo/';
						//$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

						//move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);


						$q ="INSERT INTO kis(nomor_kartu, nama, alamat, lahir, nik, photo, faskes) VALUES ('$nomor','$nama','$alamat','$lahir','$nik','$uploadfile','$faskes')";
						mysqli_query($koneksi,$q);
						?>
						<script type="text/javascript">
							alert('Berhasil !');
							document.location.href="?menu=data_kis";
						</script>
						<?php
					}
				?>

			</div>
	</div>	
</body>
</html>