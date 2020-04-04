 
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Penjualan</title>
</head>
<body>
	[<a href="FormPengguna.php">Kembali</a>]
	<table border="1">
		<tr>
			<thead>
				<td>ID Barang</td>
				<th>Nama Barang</th>
				<th>tgl</th>
				<th>Harga</th>
				<th>jumlah</th>
				<th>Total Harga</th>
			</thead>
		</tr>
		<tbody>
			<?php
                $id_barang = $_GET['id_barang'];
                $nama_barang = $_GET['nama_barang'];
                $tgl = $_GET['tgl'];
                $harga = $_GET['harga'];
                $jumlah = $_GET['jumlah'];
                $total_harga = $_GET['total'];
			?>
				<tr>
					<th><?php echo $id_barang; ?></th>
					<th><?php echo $nama_barang; ?></th>
					<th><?php echo $tgl; ?></th>
					<th><?php echo $harga; ?></th>
					<th><?php echo $jumlah; ?></th>
					<th><?php echo $total_harga; ?></th>
				</tr>
		
		</tbody>
	</table>
</body>
</html>