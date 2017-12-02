<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="row">
	<div class="col-xs-12 col-md-8">
		<h3>Data Kartu Indonesia Sehat</h3>
		<?php  
			$qjumlah = mysqli_query($koneksi,"SELECT * FROM kis");
			$jumlah = mysqli_num_rows($qjumlah);
		?>
		<button class="btn btn-sm btn-default">Jumlah Data <span class="badge"><?php echo $jumlah; ?></span></button>
		<a class="btn btn-sm btn-primary glyphicon glyphicon-refresh" href="?menu=data_kis"></a>
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
				<th>Nomor kartu</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Lahir</th>
				<th>Nik</th>
				<th>Photo</th>
				<th>Faskes</th>
				<th>Print</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1; 
			$inputan=$_POST['inputan'];
			if($_POST['cari']){
				if($inputan=="") {
					$q = mysqli_query($koneksi,"SELECT * FROM kis");
				}
				else if ($inputan !="") {
					$q = mysqli_query($koneksi,"SELECT * FROM kis WHERE nama LIKE '%$inputan%'");
				}
			}
			else {
				$q = mysqli_query($koneksi,"SELECT * FROM kis");
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
				<td><?php echo $data['nomor_kartu']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['lahir']; ?></td>
				<td><?php echo $data['nik']; ?></td>
				<td><?php echo "<img src='photo/".$data['photo']."' width='50px' height='50px'/>"; ?></td>
				<td><?php echo $data['faskes']; ?></td>
				<td><a title="Print KIS" href="?menu=print_kis&nomor_kartu=<?php echo $data['nomor_kartu']; ?>"><span class="glyphicon glyphicon-file" aria-hidden="true">Print</span></a></td>
			</tr>
			<?php } } ?>
		</tbody>

	</table>
</body>
</html>