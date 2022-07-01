<?php require_once('connections/conexion.php');?>
<?php
 $query_DatosType = sprintf("SELECT * FROM type_event WHERE status=1"); 
 $DatosType = mysqli_query($con, $query_DatosType) or die(mysqli_error($con));
 $row_DatosType = mysqli_fetch_assoc($DatosType);
 $totalRows_DatosType = mysqli_num_rows($DatosType);
?>
<?php
 $query_DatosCat = sprintf("SELECT * FROM category_event WHERE status=1"); 
 $DatosCat = mysqli_query($con, $query_DatosCat) or die(mysqli_error($con));
 $row_DatosCat = mysqli_fetch_assoc($DatosCat);
 $totalRows_DatosCat = mysqli_num_rows($DatosCat);
?>
<?php
 $query_DatosCountry = sprintf("SELECT * FROM countries WHERE status=1"); 
 $DatosCountry = mysqli_query($con, $query_DatosCountry) or die(mysqli_error($con));
 $row_DatosCountry = mysqli_fetch_assoc($DatosCountry);
 $totalRows_DatosCountry = mysqli_num_rows($DatosCountry);
?>
<?php
 $query_DatosOrg = sprintf("SELECT * FROM users WHERE id_user=%s", GetSQLValueString($_SESSION['tks_UserId'], "int")); 
 $DatosOrg = mysqli_query($con, $query_DatosOrg) or die(mysqli_error($con));
 $row_DatosOrg = mysqli_fetch_assoc($DatosOrg);
 $totalRows_DatosOrg = mysqli_num_rows($DatosOrg);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formevent")) {

  $startdatetime = $_POST["event_start"].' '.$_POST["time_start"];
  $enddatetime = $_POST["event_end"].' '.$_POST["time_end"];

  $insertSQL = sprintf("INSERT INTO events(event_name, type, category, organizer, venue_status, event_adress, event_start, time_start, start_datetime, event_end, time_end, end_datetime, country, currency, paypal_email, id_user, acount_no, status) 
                        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["event_name"], "text"),                      
                        GetSQLValueString($_POST["type"], "int"),
                        GetSQLValueString($_POST["category"], "int"),
                        GetSQLValueString($_POST["organizer"], "int"),
                        GetSQLValueString($_POST["venue_status"], "int"),
                        GetSQLValueString($_POST["event_adress"], "text"),
                        GetSQLValueString($_POST["event_start"], "text"),
                        GetSQLValueString($_POST["time_start"], "text"),
                        GetSQLValueString($startdatetime, "text"),
                        GetSQLValueString($_POST["event_end"], "text"),
                        GetSQLValueString($_POST["time_end"], "text"),
                        GetSQLValueString($enddatetime, "text"),
                        GetSQLValueString($_POST["country"], "int"),
                        GetSQLValueString($_POST["currency"], "int"),
                        GetSQLValueString($_POST["paypal_email"], "text"),
                        GetSQLValueString($_POST["id_user"], "int"),
                        GetSQLValueString($_POST["acount_no"], "int"),
                        GetSQLValueString($_POST["status"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
  
  
  $insertGoTo = "manage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
<?php include("inc/wrapper_create.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>