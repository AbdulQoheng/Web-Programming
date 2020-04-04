<?php
$a=$_POST['nim'];
$b=$_POST['nama'];
$c=$_POST['alamat'];
$d=$_POST['tgl'];
$e=$_POST['bulan'];
$f=$_POST['tahun'];
$g=$_POST['jk'];
$h=$_POST['jurusan'];
$i=$_POST['tempat'];
?>
<html>
<head>
	<title>Contoh pembuatan Form</title>
</head>
<body>
	<table border="1">
		<tr>
			<thead>
				<th>NIM</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Tempat Tanggal Lahir</th>
				<th>Jenis Kelamain</th>
				<th>jurusan</th>
			</thead>
		</tr>
		<tr>
			<tbody>
				<th><?php echo $a; ?></th>
				<th><?php echo $b; ?></th>
				<th><?php echo $c; ?></th>
				<th><?php echo $i.", ".$d."-".$e."-".$f; ?></th>
				<th><?php echo $g; ?></th>
				<th><?php echo $f; ?></th>
			</tbody>
		</tr>
	</table>

</body>
</html>