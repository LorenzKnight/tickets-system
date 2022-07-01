<?php
    $_SESSION['MM_Username']="";
    $_SESSION['MM_UserGroup']="";
    $_SESSION['tks_UserId']="";
    $_SESSION['tks_Mail']="";
    $_SESSION['tks_Nivel']="";

    unset($_SESSION['MM_Username']);
    unset($_SESSION['MM_UserGroup']);
    unset($_SESSION['tks_UserId']);
    unset($_SESSION['tks_Mail']);
    unset($_SESSION['tks_Nivel']);
    session_start();
    session_destroy();

    header("Location: index.php");
    exit;
?>