<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 0;?>
<?php
  $query_Datostickets = sprintf("SELECT * FROM tickets WHERE id_event=%s AND status = %s",
                                  GetSQLValueString($_GET['eventno'], "int"),
                                  1); 
  $Datostickets = mysqli_query($con, $query_Datostickets) or die(mysqli_error($con));
  $row_Datostickets = mysqli_fetch_assoc($Datostickets);
  $totalRows_Datostickets = mysqli_num_rows($Datostickets);
?>
<?php
  // $query_DatosticketsSold = sprintf("SELECT * FROM cart WHERE id_event=%s AND transaction_made != %s AND confirmed != %s",
  //                                 GetSQLValueString($_GET['eventno'], "int"),
  //                                 0,
  //                                 0); 
  // $DatosticketsSold = mysqli_query($con, $query_DatosticketsSold) or die(mysqli_error($con));
  // $row_DatosticketsSold = mysqli_fetch_assoc($DatosticketsSold);
  // $totalRows_DatosticketsSold = mysqli_num_rows($DatosticketsSold);
?>
<?php
  $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
  $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
  $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
  $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
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
<style>
  
</style>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_dashboard.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>