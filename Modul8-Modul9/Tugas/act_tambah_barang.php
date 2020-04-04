<?php
    include "koneksi.php";
    
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
        
        $sql1 = "SELECT id_barang FROM barang WHERE id_barang   = $id_barang";
        $c = $koneksi->query($sql1);
    
    if($a = mysqli_fetch_array($c)){
        echo "<script>alert('ID Barang $id_barang telah di gunakan'); history.back() </script>";
    }else{
        $sql2 = "INSERT INTO barang (id_barang, nama_barang, stok, harga) VALUES ('" .$id_barang."','".$nama_barang."','".$stok."','".$harga."')";
        $a = $koneksi->query($sql2);

        if ($a == true) {
            header("location:FormAdmin.php");
        } else {
            echo "Error !";
        }
    }

	
?>