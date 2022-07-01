<?
// PHP 5.1
// if($_SESSION['MM_Username'] == ""){
// header(sprintf("Location:../login.php"));
// exit();
// }
?>
<?php
// PHP 7.0
if (isset($_SESSION['MM_Username']) && $_SESSION['MM_Username'] == true) {
    //echo "<h3 style='color: #FFF; text-align: center;'> Obs. El modulo de seguridad esta activo!</h3>";
    }
    else
    { 
        header(sprintf("Location: index.php")); exit; 
    }
?>