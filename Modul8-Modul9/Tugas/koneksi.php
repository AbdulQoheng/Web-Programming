<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "tugas_web";
	$koneksi = mysqli_connect($host, $username, $password, $database);

	if ($koneksi) {
		echo "";
	} else {
		echo "Server not connected";
	}
?>