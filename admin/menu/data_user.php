<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="row">
	<div class="col-xs-12 col-md-8">
		<h3>Data User</h3>
		<?php  
			$qjumlah = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='user' ");
			$jumlah = mysqli_num_rows($qjumlah);
		?>
		<a class="btn btn-sm btn-success" href="?menu=tambah_user">Tambah Data</a>
		<button class="btn btn-sm btn-default">Jumlah Data <span class="badge"><?php echo $jumlah; ?></span></button>
		<a class="btn btn-sm btn-primary glyphicon glyphicon-refresh" href="?menu=data_user"></a>
	</div>
	
	<div class="col-xs-6 col-md-4">
		    <form method="post">
		    <div class="input-group">
		      <input name="inputan" type="text" class="form-control" placeholder="Cari Berdasarkan Nama...">
		      <span class="input-group-btn">
		        <input name="cari" class="btn btn-default" value="Cari" type="submit"></button>
		      </span>
		    </div><!-- /input-group -->
		    </form>
  	</div><!-- /.col-lg-6 -->
	</div>
	<br>
	<table class="table table-hover">
		
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1; 
			$inputan=$_POST['inputan'];
			if($_POST['cari']){
				if($inputan=="") {
					$q = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='user' ");
				}
				else if ($inputan !="") {
					$q = mysqli_query($koneksi,"SELECT * FROM user WHERE nama LIKE '%$inputan%'");
				}
			}
			else {
				$q = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='user' ");
			}
			
			$cek = mysqli_num_rows($q);

			if ($cek < 1){
			?>
			<tr>
				<td colspan="7">
					Maaf, data yang anda cari tidak ada !
					<a href="" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-refresh"></span></a>
				</td>
			</tr>
            <?php
			}
			else {

			

			while ($data = mysqli_fetch_array($q)){
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['status']; ?></td>
				<td>
				
				<a title="Edit" href="?menu=edit_user&id=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a onclick="return confirm('Apakah anda yakin akan menghapusnya ?');" title="Edit" href="?menu=hapus_user&id=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				
				</td>
			</tr>
			<?php } } ?>
		</tbody>

	</table>
</body>
</html>