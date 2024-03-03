<?php
include_once '../controllers/C_login.php';

$login = new C_login();

    //untuk mengecek apakah action pada form register mengirimkan aksi register
    //tanda tanya aksi klo di pindah ke role akan jadi dolar get
    if ($_GET['aksi'] == 'register') {
        
        $id_login = $_POST['id_login'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        //hash password = enskripsi password
        //agar pass nya aman sehingga defeloper tidak mengetahui pass yg di inputkna
        $password = password_hash($password, PASSWORD_DEFAULT);
        
         //memanggil method/fungsi register ke dalam r_login
         $login->register($id_login, $user, $password, $role);
         echo "<script>alert('Data Berhasil ');window.location='../index.php'</script>";
    }
    elseif ($_GET['aksi'] == 'login') {

        $user = $_POST['user'];
        $pass = $_POST['password'];

        //memanggil method login
        $login->login($user, $pass);

        //logout
    }
    elseif ($_GET['aksi'] == 'logout'){
        
        $login->logout();
    }

?>