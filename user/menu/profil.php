<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
</head>
<body>
	<h3>Profil Anda</h3>
	
		<div class="row">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
						<h3>Informasi tentang anda</h3>
						</div>
						<div class="panel-body">
							<table class="table" cellpadding="8" cellspacing="8">
								<tr>
									<th>Nama </th> <td>:</td> <td><?php echo $profil['nama']; ?></td>
								</tr>
								<tr>
									<th>Alamat </th> <td>:</td> <td><?php echo $profil['alamat']; ?></td>
								</tr>
								<tr>
									<th>Telepon </th> <td>:</td> <td><?php echo $profil['telepon']; ?></td>
								</tr>
								<tr>
							</table>
							<a class="btn btn-sm btn-primary" href="?menu=edit_profil">Edit</a>
						</div>
					</div>
				</div>				
			</div>
</body>
</html>