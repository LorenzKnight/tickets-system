<?php require_once('connections/conexion.php');?>

<?php $menuactive= 3;?>
<?php
  $query_DatosAllEvents = sprintf("SELECT * FROM events"); 
  $DatosAllEvents = mysqli_query($con, $query_DatosAllEvents) or die(mysqli_error($con));
  $row_DatosAllEvents = mysqli_fetch_assoc($DatosAllEvents);
  $totalRows_DatosAllEvents = mysqli_num_rows($DatosAllEvents);
?>
<?php
  $query_DatosEventAmp = sprintf("SELECT * FROM events WHERE id_event=%s", 
                                    GetSQLValueString($_GET['editID'], "int")); 
  $DatosEventAmp = mysqli_query($con, $query_DatosEventAmp) or die(mysqli_error($con));
  $row_DatosEventAmp = mysqli_fetch_assoc($DatosEventAmp);
  $totalRows_DatosEventAmp = mysqli_num_rows($DatosEventAmp);
?>
<?php
  $query_DatosEventPMonth = sprintf("SELECT * FROM monthly_billing WHERE id_event=%s", 
                                      GetSQLValueString($_GET['editID'], "int")); 
  $DatosEventPMonth = mysqli_query($con, $query_DatosEventPMonth) or die(mysqli_error($con));
  $row_DatosEventPMonth = mysqli_fetch_assoc($DatosEventPMonth);
  $totalRows_DatosEventPMonth = mysqli_num_rows($DatosEventPMonth);
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
<?php include("inc/wrapper_events_list_manager.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>