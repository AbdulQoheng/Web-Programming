<?php
    include "koneksi.php";
    
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$konfpassword = md5($_POST['konfpassword']);
	$email = $_POST['email'];
	$namaLengkap = $_POST['namaLengkap'];
	$level = $_POST['level'];
    
    if($password == $konfpassword){
        $sql = "INSERT INTO login(username, password, email, namalengkap, level) VALUES ('" . $username . "','" . $password . "','" . $email . "','" . $namaLengkap . "','" . $level . "')";
        $a = $koneksi->query($sql);

        if ($a == true) {
            echo "<script>alert('Anda Sukses Registrasi'); history.back() </script>";
        } else {
            echo "Error !";
        }
    }else{
        echo "<script>alert('Ulangi, Password Anda tidak sama'); history.back() </script>";
    }

	
?>