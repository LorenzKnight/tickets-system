<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>
<?php
    $query_DatosUsuario = sprintf("SELECT * FROM users WHERE id_user=%s", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
    $DatosUsuario = mysqli_query($con, $query_DatosUsuario) or die(mysqli_error($con));
    $row_DatosUsuario = mysqli_fetch_assoc($DatosUsuario);
    $totalRows_DatosUsuario = mysqli_num_rows($DatosUsuario);

    $acount_no = $row_DatosUsuario['acount_no'];
?>
<?php
    // $dateNow = date("Y-m-d");
    $dateNow = date('Y-m-d H:i:s');

    $fecha2=time()+3600; //1 hours
    $timeNow = date("H:i:s");
?>
<?php 
    $query_DatosEventstatus = sprintf("SELECT * FROM events ORDER BY id_event"); 
    $DatosEventstatus = mysqli_query($con, $query_DatosEventstatus) or die(mysqli_error($con));
    $row_DatosEventstatus = mysqli_fetch_assoc($DatosEventstatus);
    $totalRows_DatosEventstatus = mysqli_num_rows($DatosEventstatus);
?>
<?php
    if ($row_DatosUsuario['rank'] < 2) { 
        if ((isset($_GET["MM_search"])) && ($_GET["MM_search"]=="formsearch")) {   
            // BLOQUE BUSCADOR INTELIGENTE
                $porciones = explode(" ", $_GET["search"]);
                $longitud = count($porciones);
                $extramodelo =" event_name LIKE '%".$_GET["search"] ."%'";
                for($i=0; $i<$longitud; $i++)
            {
                $extramodelo.=" OR event_name LIKE '%".$porciones[$i] ."%'";
            }
            // FIN BLOQUE BUSCADOR INTELIGENTE

                $query_DatosEvent = "SELECT * FROM events WHERE ".$extramodelo."  ";
            // echo $query_DatosConsulta;
        } else if ((isset($_GET["MM_search"])) && ($_GET["MM_search"]=="formstatus")) {
            if ($_GET["status"] == "" ) {
                $query_DatosEvent = sprintf("SELECT * FROM events ORDER BY id_event ASC");
            } else {
                $query_DatosEvent = sprintf("SELECT * FROM events WHERE status = %s ORDER BY id_event ASC",
                                       GetSQLValueString($_GET["status"], "int"));
            }
        } else {
            $query_DatosEvent = sprintf("SELECT * FROM events WHERE status = 0 OR status = 3");
        }
            $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
            $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
            $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);

    } else {
        if ((isset($_GET["MM_search"])) && ($_GET["MM_search"]=="formsearch")) {   
            
                $query_DatosEvent = sprintf("SELECT * FROM events WHERE event_name LIKE %s AND acount_no = $acount_no ",
                                                GetSQLValueString("%".$_GET["search"]."%", "text"));
            
        } else if ((isset($_GET["MM_search"])) && ($_GET["MM_search"]=="formstatus")) {
            if ($_GET["status"] == "" ) {
                $query_DatosEvent = sprintf("SELECT * FROM events WHERE acount_no=%s ORDER BY id_event ASC",
                                                GetSQLValueString(ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId']), "int"));
            } else {
                $query_DatosEvent = sprintf("SELECT * FROM events WHERE acount_no=%s AND status = %s ORDER BY id_event ASC",
                                                GetSQLValueString(ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId']), "int"),
                                                GetSQLValueString($_GET["status"], "int"));
            }
        } else {
            $query_DatosEvent = sprintf("SELECT * FROM events WHERE acount_no=%s AND status = 0 OR status = 3",
                                            GetSQLValueString(ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId']), "int")); 
        }
            $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
            $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
            $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);

            // $identificador = $row_DatosEvent['id_event'];
    }
?>


<?php if ($row_DatosEventstatus > 0) { // Show if recordset not empty ?>
<?php do { ?>

    <?php $eventNum = $row_DatosEventstatus['id_event']; ?>

    <?php if($row_DatosEventstatus['end_datetime'] < $dateNow) { ?>
        <?php ActualizacionEventStatus(2, $eventNum); ?>
    <?php } ?>

<?php } while ($row_DatosEventstatus = mysqli_fetch_assoc($DatosEventstatus)); 
}
?>
<html>
<head>
<meta charset="iso-8859-1">
<title><?php echo $pageName; ?></title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="icon" href="img/sys/tg_icon.png">
<script>
    function validarForm()
    {
        form = document.getElementById('formstatus');
        form.submit();
    }
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_manage.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>