<?php
    session_start();
    include "koneksi.php";
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));

    if(!isset($_SESSION['username']) || $_SESSION['level'] != "Pengguna"){
        echo "<script>alert('Maaf, Anda Belum Login'); history.back() </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Pengguna</title>
</head>

<body>
<a href="act_login.php?op=out">LogOut</a>
    <table border="0">
        <form action="act_jualbeli.php?jenis=jual" method="POST">
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
                    <td><input type="reset" value="Reset"></td>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>

        </form>
    </table>

</body>

</html>