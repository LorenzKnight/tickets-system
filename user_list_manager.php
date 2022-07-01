<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 2;?>
<?php
  $query_DatosClients = sprintf("SELECT * FROM users"); 
  $DatosClients = mysqli_query($con, $query_DatosClients) or die(mysqli_error($con));
  $row_DatosClients = mysqli_fetch_assoc($DatosClients);
  $totalRows_DatosClients = mysqli_num_rows($DatosClients);
?>
<?php
  $query_DatosClientEdit = sprintf("SELECT * FROM users WHERE id_user=%s", 
                                    GetSQLValueString($_GET['editID'], "int")); 
  $DatosClientEdit = mysqli_query($con, $query_DatosClientEdit) or die(mysqli_error($con));
  $row_DatosClientEdit = mysqli_fetch_assoc($DatosClientEdit);
  $totalRows_DatosClientEdit = mysqli_num_rows($DatosClientEdit);
?>
<?php
  $query_DatosClientChild = sprintf("SELECT * FROM users WHERE id_admin=%s", 
                                    GetSQLValueString($_GET['editID'], "int")); 
  $DatosClientChild = mysqli_query($con, $query_DatosClientChild) or die(mysqli_error($con));
  $row_DatosClientChild = mysqli_fetch_assoc($DatosClientChild);
  $totalRows_DatosClientChild = mysqli_num_rows($DatosClientChild);
?>










<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formtickets")) {
  $year = date("Y");
	$month = date("m");
	$day = date("d");
  $insertSQL = sprintf("INSERT INTO tickets(id_event, id_user, date, type, single_couple, ticket_name, stock, price, start_date, start_time, sales_end, end_time, description, visibility, sales_type, status) 
                        VALUES (%s, %s, NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["id_event"], "int"),                      
                        GetSQLValueString($_POST["id_user"], "int"),
                        GetSQLValueString($_POST["type"], "int"),
                        GetSQLValueString($_POST["single_couple"], "int"),
                        GetSQLValueString($_POST["ticket_name"], "text"),
                        GetSQLValueString($_POST["stock"], "int"),
                        GetSQLValueString($_POST["price"], "text"),
                        GetSQLValueString($_POST["start_date"], "text"),
                        GetSQLValueString($_POST["start_time"], "text"),
                        GetSQLValueString($_POST["sales_end"], "text"),
                        GetSQLValueString($_POST["end_time"], "text"),
                        GetSQLValueString($_POST["description"], "text"),
                        GetSQLValueString($_POST["visibility"], "int"),
                        GetSQLValueString($_POST["sales_type"], "int"),
                        GetSQLValueString($_POST["status"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
  
  $insertGoTo = $_SERVER['HTTP_REFERER'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php
 $query_DatosTicketEdit = sprintf("SELECT * FROM tickets WHERE id_ticket=%s ORDER BY id_ticket DESC" , GetSQLValueString($_GET['editTicket'], "int")); 
 $DatosTicketEdit = mysqli_query($con, $query_DatosTicketEdit) or die(mysqli_error($con));
 $row_DatosTicketEdit = mysqli_fetch_assoc($DatosTicketEdit);
 $totalRows_DatosTicketEdit = mysqli_num_rows($DatosTicketEdit);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formediti")) {
     
     $updateSQL = sprintf("UPDATE tickets SET user_edit=%s, date_edit=NOW(), type=%s, single_couple=%s, ticket_name=%s, stock=%s, price=%s, start_date=%s, start_time=%s, sales_end=%s, end_time=%s, description=%s, visibility=%s, sales_type=%s WHERE id_ticket=%s",
                          GetSQLValueString($_SESSION['tks_UserId'], "int"),
                          GetSQLValueString($_POST["type"], "int"),
                          GetSQLValueString($_POST["single_couple"], "int"),
                          GetSQLValueString($_POST["ticket_name"], "text"),
                          GetSQLValueString($_POST["stock"], "int"),
                          GetSQLValueString($_POST["price"], "text"),
                          GetSQLValueString($_POST["start_date"], "text"),
                          GetSQLValueString($_POST["start_time"], "text"),
                          GetSQLValueString($_POST["sales_end"], "text"),
                          GetSQLValueString($_POST["end_time"], "text"),
                          GetSQLValueString($_POST["description"], "text"),
                          GetSQLValueString($_POST["visibility"], "int"),
                          GetSQLValueString($_POST["sales_type"], "int"),
                          GetSQLValueString($_POST["id_ticket"], "int"));
		

$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

//$eventoE = $row_DatosEventoActual['id_event'];
$updateGoTo = "edit_done.php?ticket=1";
// $updateGoTo = $_SERVER['HTTP_REFERER'];
if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<?php
    $query_DatosUsuario = sprintf("SELECT * FROM users WHERE id_user=%s", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
    $DatosUsuario = mysqli_query($con, $query_DatosUsuario) or die(mysqli_error($con));
    $row_DatosUsuario = mysqli_fetch_assoc($DatosUsuario);
    $totalRows_DatosUsuario = mysqli_num_rows($DatosUsuario);
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
    function asegurar_borrado()
    {
            rc = confirm("Är du säkert på den här ändring?");
            return rc;
    }
</script>
<script>
    function mostrar() {
    event.stopPropagation()
    document.getElementById("popup1").style.display="block";
    }
    function ocurtar() {
    event.stopPropagation()
    document.getElementById("popup1").style.display="none";
    }
</script>
<script>
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_user_list_manager.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>