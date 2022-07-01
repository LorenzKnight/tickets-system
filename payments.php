<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 5;?>
<?php
 $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
 $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
 $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
 $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
 $query_DatosCountry = sprintf("SELECT * FROM countries WHERE status=1"); 
 $DatosCountry = mysqli_query($con, $query_DatosCountry) or die(mysqli_error($con));
 $row_DatosCountry = mysqli_fetch_assoc($DatosCountry);
 $totalRows_DatosCountry = mysqli_num_rows($DatosCountry);
?>
<?php
 $query_DatosCurrency = sprintf("SELECT * FROM currency WHERE status=1"); 
 $DatosCurrency = mysqli_query($con, $query_DatosCurrency) or die(mysqli_error($con));
 $row_DatosCurrency = mysqli_fetch_assoc($DatosCurrency);
 $totalRows_DatosCurrency = mysqli_num_rows($DatosCurrency);
?>

<?php
//  $query_DatosOrg = sprintf("SELECT * FROM users WHERE id_user=%s", GetSQLValueString($_SESSION['tks_UserId'], "int")); 
//  $DatosOrg = mysqli_query($con, $query_DatosOrg) or die(mysqli_error($con));
//  $row_DatosOrg = mysqli_fetch_assoc($DatosOrg);
//  $totalRows_DatosOrg = mysqli_num_rows($DatosOrg);
?>

<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formevent")) {
     
     $updateSQL = sprintf("UPDATE events SET country=%s, currency=%s, paypal_email=%s WHERE id_event=%s",
                          GetSQLValueString($_POST["country"], "int"),
                          GetSQLValueString($_POST["currency"], "int"),
                          GetSQLValueString($_POST["paypal_email"], "text"),
                          GetSQLValueString($_POST["id_event"], "int"));
		

$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

$updateGoTo = $_SERVER['HTTP_REFERER'];
if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<html>
<head>
<meta charset="iso-8859-1">
<title><?php echo $pageName; ?></title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="icon" href="img/sys/tg_icon.png">

<link rel="stylesheet" type="text/css" href="simple_calendar/tcal.css" />
<script type="text/javascript" src="simple_calendar/tcal.js"></script>

<script>
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_payments.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>