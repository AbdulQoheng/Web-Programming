<?php
    session_start();
    include "koneksi.php";
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));

    if(!isset($_SESSION['username']) || $_SESSION['level'] != "Admin"){
        echo "<script>alert('Maaf, Anda Belum Login'); history.back() </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Admin</title>
</head>

<body>
    <a href="act_login.php?op=out">LogOut</a>
    <table border="0">
        <tr>
            <td width="400px">
                <form action="act_tambah_barang.php" method="POST">
                    <table>
                        <p>Form Barang Baru</p>
                        <tr>
                            <td>ID Barang</td>
                            <td><input type="text" name="id_barang"></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" name="nama_barang"></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><input type="text" name="stok"></td>
                        </tr>
                        <tr>
                            <td>Harga Satuan</td>
                            <td><input type="text" name="harga"></td>
                        </tr>
                        <tr>
                            <td><input type="reset" value="Reset"></td>
                            <td><input type="submit" value="Submit"></td>
                        </tr>
                    </table>

                </form>
            </td>
            <td>
                <form action="act_jualbeli.php?jenis=beli" method="POST">
                    <table>
                        <p>Form Pembelian Barang </p>
                        <tr>
                            <td>ID Barang</td>
                            <td><input type="text" name="id_barang" size="27"></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><select name="tgl">
                                    <?php
                                        for($i=1; $i<=31; $i++){
                                            ?>
                                    <option value="<?php echo"$i"; ?>"><?php echo"$i"; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>

                                <select name="bln" id="">
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <input type="text" name="thn" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td><input type="text" name="jumlah" size="27"></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td><input type="text" name="harga" size="27"></td>
                        </tr>
                        <tr>
                            <td><input type="reset" value="Reset"></td>
                            <td><input type="submit" value="Submit"></td>
                        </tr>
                    </table>

                </form>
            </td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td valign="top">
                <p>Data Barang</p>
                <table border="1">
                    <tr>
                        <td>ID Barang</td>
                        <td>Nama Barang</td>
                        <td>Stok Barang</td>
                        <td>Harga Satuan</td>
                    </tr>
                        <?php
                            $no = 1;
                            include "koneksi.php";
                            $a = "SELECT * FROM barang";
                            $b = mysqli_query($koneksi, $a);
                            while ($c = mysqli_fetch_array($b)) { 
                        ?>
                    <tr>
                            <td><?php echo $c['id_barang']; ?></td>
                            <td><?php echo $c['nama_barang']; ?></td>
                            <td><?php echo $c['stok']; ?></td>
                            <td><?php echo $c['harga']; ?></td>
                    </tr>
                        <?php
                        }
                        ?>
                </table>
            </td>
            <td valign="top">
                <p>Data Pembelian</p>
                <table border="1">
                    <tr>
                        <td>ID Barang</td>
                        <td>Nama Barang</td>
                        <td>Tanggal </td>
                        <td>Jumlah </td>
                        <td>Total Harga</td>
                    </tr>
                        <?php
                            $no = 1;
                            include "koneksi.php";
                            $a = "SELECT id_barang, nama_barang, tgl, jumlah, total_harga FROM barang NATURAL JOIN jual_beli WHERE jenis = 'beli' ";
                            $b = mysqli_query($koneksi, $a);
                            while ($c = mysqli_fetch_array($b)) { 
                        ?>
                    <tr>
                            <td><?php echo $c['id_barang']; ?></td>
                            <td><?php echo $c['nama_barang']; ?></td>
                            <td><?php echo $c['tgl']; ?></td>
                            <td><?php echo $c['jumlah']; ?></td>
                            <td><?php echo $c['total_harga']; ?></td>
                    </tr>
                        <?php
                        }
                        ?>
                </table>
            </td>
            <td valign="top">
                <p>Data Penjulanan</p>
                <table border="1">
                    <tr>
                        <td>ID Barang</td>
                        <td>Nama Barang</td>
                        <td>Tanggal </td>
                        <td>Jumlah </td>
                        <td>Total Harga</td>
                    </tr>
                        <?php
                            $no = 1;
                            include "koneksi.php";
                            $a = "SELECT id_barang, nama_barang, tgl, jumlah, total_harga FROM barang NATURAL JOIN jual_beli WHERE jenis = 'jual' ";
                            $b = mysqli_query($koneksi, $a);
                            while ($c = mysqli_fetch_array($b)) { 
                        ?>
                    <tr>
                            <td><?php echo $c['id_barang']; ?></td>
                            <td><?php echo $c['nama_barang']; ?></td>
                            <td><?php echo $c['tgl']; ?></td>
                            <td><?php echo $c['jumlah']; ?></td>
                            <td><?php echo $c['total_harga']; ?></td>
                    </tr>
                        <?php
                        }
                        ?>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>