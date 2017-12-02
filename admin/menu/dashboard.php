<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
	<h2>Kartu Indonesia Sehat</h2>
	<hr>
	<h5><b>Selamat Datang <i><?php echo $profil['nama']; ?></i></b></h5>
	<hr>
	
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">Data User</div>
					<div class="panel-body">
						<center>	
							<h3>
							<span class="glyphicon glyphicon-user"></span>
								<?php
									$quser = mysqli_query($koneksi,"SELECT * FROM user");
									$jumlah_user = mysqli_num_rows($quser);
									echo $jumlah_user;
								?>
							</h3>
						</center>
					</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">Data Kartu Indonesia Sehat</div>
					<div class="panel-body">
						<center>	
							<h3>
							<span class="glyphicon glyphicon-plus"></span>
							<?php
								$qkis = mysqli_query($koneksi,"SELECT * FROM kis");
								$jumlah_kis = mysqli_num_rows($qkis);
								echo $jumlah_kis;
							?>
							</h3>
						</center>
					</div>
			</div>
		</div>

	</div>

</body>
</html>