<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
</head>
<body>
	<h3>Ubah Profil Anda</h3>
	
		<div class="row">

				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>Edit Username</h3>
						</div>
						<div class="panel-body">
							<fieldset>
								<legend>Edit Username :</legend>
									<form class="form" method="post">
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"> :</span>
											  <input type="text" readonly class="form-control" value="<?php echo $profil['username']; ?>" aria-describedby="basic-addon1">
										</div>
										<br>
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"> :</span>
											  <input type="text" name="user_baru" class="form-control" placeholder="Username baru" aria-describedby="basic-addon1">
										</div>
										<br>
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"> :</span>
											  <input type="password" name="pass" class="form-control" placeholder="Password saat ini" aria-describedby="basic-addon1">
										</div>
										<br>
											  <input type="submit" name="edit_user" value="Simpan" class="btn btn-sm btn-success">
									</form>

							     <?php 
							     	if (isset($_POST['edit_user'])) {
							     		$user_baru = $_POST['user_baru'];
							     		$pass = $_POST['pass'];
							     		if (md5($pass)==$profil['password']) {
							     			mysqli_query($koneksi,"UPDATE kasir SET username='$user_baru' WHERE id_kasir='$profil[id_kasir]' ");
							     		?>
							     		<script type="text/javascript">
							     			alert ("Username anda berhasil dirubah !");
							     			document.location.href="../inc/logout.php";
							     		</script>
										<?php
							     		}
							     		else {
							     			echo "Password salah";
							     		}
							     	}
							     ?>		

							</fieldset>
							
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3>Edit Password </h3>
						</div>
						<div class="panel-body">
							<fieldset>
								<legend>Edit Password :</legend>
									<form class="form" method="post">
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"> :</span>
											  <input type="password" name="pass1" class="form-control" placeholder="Password baru" aria-describedby="basic-addon1">
										</div>
										<br>
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"> :</span>
											  <input type="password" name="pass2" class="form-control" placeholder="Ketik Ulang" aria-describedby="basic-addon1">
										</div>
										<br>
										<div class="input-group">
											  <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"> :</span>
											  <input type="password" name="pass_awal" class="form-control" placeholder="Password saat ini" aria-describedby="basic-addon1">
										</div>
										<br>
											  <input type="submit" name="edit_password" value="Simpan" class="btn btn-sm btn-success">
									</form>
								
								<?php 
							     	if(isset($_POST['edit_password'])) {
							     		$pass1 = md5($_POST['pass1']);
							     		$pass2 = md5($_POST['pass2']);
							     		$pass = $_POST['pass_awal'];
							     		if ($pass1 != $pass2) {
							     			echo "Passwordnya Tidak Cocok !";
							     		}
							     		else {
							     			if (md5($pass)==$profil['password']) {
							     			mysqli_query($koneksi,"UPDATE kasir SET password='$pass1' WHERE id_kasir='$profil[id_kasir]' ");
							     		?>
							     		<script type="text/javascript">
							     			alert ("Password anda berhasil dirubah !");
							     			document.location.href="../inc/logout.php";
							     		</script>
										<?php
							     		}
							     		else {
							     			echo "Password salah";
							     		}
							     		}
							     	}
							     ?>

							</fieldset>

						</div>
					</div>
				</div>
			</div>
</body>
</html>