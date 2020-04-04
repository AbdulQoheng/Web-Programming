<?php
    include "koneksi.php";

    $jenis = $_GET['jenis'];
    $total_harga;
    
    $id_barang = $_POST['id_barang'];
	$tgl = $_POST['tgl']."-".$_POST['bln']."-".$_POST['thn'];
	$jumlah = $_POST['jumlah'];
    $stok_barang;
    $nama_barang;
    
    $sql1 = "SELECT id_barang, nama_barang, harga, stok FROM barang WHERE id_barang  = $id_barang";
    $c = $koneksi->query($sql1);
    
    if($a = mysqli_fetch_array($c)){
        $stok_barang= $a['stok'];
        $nama_barang = $a['nama_barang'];
                
        if($jenis == 'jual'){
            $harga_barang= $a['harga'];
            $total_harga = $harga_barang*$jumlah;
        }else if($jenis == 'beli'){
            $total_harga = $_POST['harga'];
        }

        
        $sql2 = "INSERT INTO jual_beli (id_barang, tgl, jenis, jumlah, total_harga) VALUES ('".$id_barang."','".$tgl."-".$bln."-".$thn."','".$jenis."','".$jumlah."','".$total_harga."')";
        $m = $koneksi->query($sql2);
        if ($m == true) {
            if($jenis == 'beli'){
                header("location:FormAdmin.php");
            }else if($jenis == 'jual'){
                if($stok_barang > $jumlah){
                    header("location:hasil_penjualan.php?id_barang=$id_barang&nama_barang=$nama_barang&tgl=$tgl&harga=$harga_barang&jumlah=$jumlah&total=$total_harga");
                }else{
                    
                    echo "<script>alert('Jumlah Stok Tidak Cukup'); history.back() </script>";
                }
            }
        } else {
            echo "Error !";
        }
    }else{
        echo "<script>alert('ID Barang $id_barang tidak di temukan'); history.back() </script>";
    }

	
?>