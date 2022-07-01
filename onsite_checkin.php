<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 6;?>
<?php
    $query_DatosGuests = sprintf("SELECT * FROM cart WHERE id_event=%s AND checkin > 0 AND discountcode IS NULL",
                                    GetSQLValueString($_GET['eventno'], "int")); 
    $DatosGuests = mysqli_query($con, $query_DatosGuests) or die(mysqli_error($con));
    $row_DatosGuests = mysqli_fetch_assoc($DatosGuests);
    $totalRows_DatosGuests = mysqli_num_rows($DatosGuests);
?>
<?php
    $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s",
                                    GetSQLValueString($_GET['eventno'], "int")); 
    $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
    $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
    $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formticket")) {

    $query_DatosCheckin = sprintf("SELECT * FROM cart WHERE transaction_made=%s",
    GetSQLValueString(ConvertiraOrderNo($_POST["ticketsearch"]), "int")); 
    $DatosCheckin = mysqli_query($con, $query_DatosCheckin) or die(mysqli_error($con));
    $row_DatosCheckin = mysqli_fetch_assoc($DatosCheckin);
    $totalRows_DatosCheckin = mysqli_num_rows($DatosCheckin);
     
if (comprobarcheckinSumar(ConvertiraOrderNo($_POST["ticketsearch"]), $row_DatosCheckin["checkin"])) {

        $time=time()+7200; //2 hours
        date("H:i:s",$time);
    $hora = date("H:i",$time);
    $updateSQL = sprintf("UPDATE cart SET checkin = checkin + 1, checkin_date=NOW(), checkin_time=%s WHERE transaction_made=%s",
                        GetSQLValueString($hora, "text"),
                        GetSQLValueString(ConvertiraOrderNo($_POST["ticketsearch"]), "int"));
		

    $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

    $eventoNo = $row_DatosCheckin['id_event'];
    $updateGoTo = "onsite_checkin.php?eventno=$eventoNo&scan=1";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
 } else {
     $eventoNo = $row_DatosCheckin['id_event'];
    $updateGoTo = "onsite_checkin.php?eventno=$eventoNo&scan=2";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
  }
}
?>
<?php
    $time=time()+7200; //2 hours
    date("H:i:s",$time);
    $hora = date("H:i",$time);
    $date = date("Y-m-d",$time);
    
    $query_DatosGuestsIn = sprintf("SELECT * FROM cart WHERE transaction_made=%s AND id_event=%s ORDER BY id_counter DESC",
                                    GetSQLValueString(ConvertiraOrderNo($_GET['scan']), "int"),
                                    GetSQLValueString($_GET['eventno'], "int"));
    $DatosGuestsIn = mysqli_query($con, $query_DatosGuestsIn) or die(mysqli_error($con));
    $row_DatosGuestsIn = mysqli_fetch_assoc($DatosGuestsIn);
    $totalRows_DatosGuestsIn = mysqli_num_rows($DatosGuestsIn);
?>
<html>
<head>
<meta charset="iso-8859-1">
<title><?php echo $pageName; ?></title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="icon" href="img/sys/tg_icon.png">

<script>
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_onsite_checkin.php"); ?>
<?php include("inc/foot.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/dynamic_search.js"></script> -->
</body>
</html>