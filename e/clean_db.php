<?php require_once('../connections/conexion.php');?>

<?php if($_GET["close"]):?>
<?php
	$query_Delete = sprintf("DELETE FROM cart WHERE id_user=%s", 
							GetSQLValueString($_SESSION['tsys_UserId'], "int"));
	    echo $query_Delete;
	$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


	$query_Delete = sprintf("DELETE FROM temp_user WHERE id_temp=%s", 
							GetSQLValueString($_SESSION['tsys_UserId'], "int"));
	    echo $query_Delete;
	$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


	// $_SESSION['MM_Username']="";
    // $_SESSION['MM_UserGroup']="";
    $_SESSION['tsys_UserId']="";
    $_SESSION['tsys_Mail']="";
    $_SESSION['tsys_Nivel']="";

    // unset($_SESSION['MM_Username']);
    // unset($_SESSION['MM_UserGroup']);
    unset($_SESSION['tsys_UserId']);
    unset($_SESSION['tsys_Mail']);
    unset($_SESSION['tsys_Nivel']);
    // session_start();
    session_destroy();


	$evento = $_GET["close"];
	$insertGoTo = "events.php?eventno=$evento";
	header(sprintf("Location: %s", $insertGoTo));
	mysqli_free_result($Result1);
?>
<?php endif ?>
<!-- limpiador de base de datos -->
<?php if($_GET["logout"]):?>
<?php
    $_SESSION['MM_Username']="";
    $_SESSION['MM_UserGroup']="";
    $_SESSION['tsys_UserId']="";
    $_SESSION['tsys_Mail']="";
    $_SESSION['tsys_Nivel']="";

    unset($_SESSION['MM_Username']);
    unset($_SESSION['MM_UserGroup']);
    unset($_SESSION['tsys_UserId']);
    unset($_SESSION['tsys_Mail']);
    unset($_SESSION['tsys_Nivel']);
    // session_start();
    session_destroy();

    $logOut = $_GET['logout'];
    header("Location: events.php?eventno=$logOut");
    exit;
?>
<?php endif ?>
<!-- Fin del limpiador de base de datos -->