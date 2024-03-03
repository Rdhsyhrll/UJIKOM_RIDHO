<?php

error_reporting(E_ALL ^E_NOTICE);

include_once '../controllers/C_login.php';

if ($_SESSION['role'] == 'petugas')
{
    echo "";
}elseif ($_SESSION['role'] == 'admin') {
    
    echo "";
}else{
    header("location: ../index.php");
}

?>