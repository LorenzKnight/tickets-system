<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 2;?>
<?php
    // $dateNow = date("Y-m-d");
    $dateNow = date('Y-m-d H:i:s');
?>
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
 $query_DatosOrg = sprintf("SELECT * FROM users WHERE id_user=%s", GetSQLValueString($_SESSION['tks_UserId'], "int")); 
 $DatosOrg = mysqli_query($con, $query_DatosOrg) or die(mysqli_error($con));
 $row_DatosOrg = mysqli_fetch_assoc($DatosOrg);
 $totalRows_DatosOrg = mysqli_num_rows($DatosOrg);
?>
<?php
 $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
 $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
 $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
 $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
//  $query_DatosTickets = sprintf("SELECT * FROM tickets WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
//  $DatosTickets = mysqli_query($con, $query_DatosTickets) or die(mysqli_error($con));
//  $row_DatosTickets = mysqli_fetch_assoc($DatosTickets);
//  $totalRows_DatosTickets = mysqli_num_rows($DatosTickets);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formevent")) {

  $startdatetime = $_POST["event_start"].' '.$_POST["time_start"];
  $enddatetime = $_POST["event_end"].' '.$_POST["time_end"];
     
  $updateSQL = sprintf("UPDATE events SET event_name=%s, type=%s, category=%s, organizer=%s, venue_status=%s, event_adress=%s, event_start=%s, time_start=%s, start_datetime=%s, event_end=%s, time_end=%s, end_datetime=%s, id_user=%s, status=%s WHERE id_event=%s",
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
                      GetSQLValueString($_POST["id_user"], "int"),
                      GetSQLValueString($_POST["status"], "int"),
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

    <?php $eventNum = $row_DatosEvent['id_event']; ?>

    <?php if($row_DatosEvent['end_datetime'] < $dateNow) { ?>
        <?php ActualizacionEventStatus(2, $eventNum); ?>
        <?php //ActualizacionTicketStatus(1, $row_DatosTickets['id_ticket'], $_GET['eventno'], 0); ?>
    <?php } ?>

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
<?php include("inc/wrapper_event.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>