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
		<center><h3>Kartu Indonesia Sehat</h3></center>
		<br><br>

			<div class="col-md-10">

				<div class="panel panel-info">
						<div class="panel-heading">
						<h3>Kartu Indonesia Sehat</h3>
						</div>
						<div class="panel-body">
							<table class="table" cellpadding="8" cellspacing="8">
								<tr>
									<th>Nama </th> <td>:</td> <td><?php echo $data['nama']; ?></td>
								</tr>
								<tr>
									<th>Alamat </th> <td>:</td> <td><?php echo $data['alamat']; ?></td>
								</tr>
								<tr>
									<th>Lahir </th> <td>:</td> <td><?php echo $data['lahir']; ?></td>
								</tr>
								<tr>
									<th>NIK </th> <td>:</td> <td><?php echo $data['nik']; ?></td>
								</tr>
								<tr>
									<th>Faskes </th> <td>:</td> <td><?php echo $data['faskes']; ?></td>
								</tr>
							</table>
							<a class="btn btn-primary" href="?menu=data_kis">Kembali</a>
							<button onClick="window.print();" class="btn btn-success glyphicon glyphicon-print"> Print</button>
						</div>
					</div>

					

				</form>

			</div>
	</div>	
</body>
</html>