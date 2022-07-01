<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 1;?>

<!-- Protocolo para el envio de factura mensual -->
<?php
  $procentFees = ObtenerFEES();
  $ordernoPM = rand(00000000,99999999);
	$today = date('d');

	$dateNowDayBefore = date('Y-m-d');
    $date_past = strtotime('-1 month', strtotime($dateNowDayBefore));
	$date_past = date('m', $date_past);
?>
<?php
	$query_DatosMonthlyBilling = sprintf("SELECT * FROM monthly_billing WHERE id_event=%s AND month=%s",
											GetSQLValueString($_GET['eventno'], "int"),
											GetSQLValueString($date_past, "int")); 
	$DatosMonthlyBilling = mysqli_query($con, $query_DatosMonthlyBilling) or die(mysqli_error($con));
	$row_DatosMonthlyBilling = mysqli_fetch_assoc($DatosMonthlyBilling);
	$totalRows_DatosMonthlyBilling = mysqli_num_rows($DatosMonthlyBilling);
?>
<?php   
	$monthlyIN = ObtenerMontoMensual($_GET['eventno'], $date_past);
	// $monthlyIN = ObtenerMontoMensual($_GET['eventno'], 5);

	$feesPM = $monthlyIN/100 * $procentFees;

	if($today == 5 && $totalRows_DatosMonthlyBilling == 0) {  
		 InsertarMontoMensual($_GET['eventno'], $date_past, $ordernoPM, $monthlyIN, $feesPM, 1);	
	}
?>
<!-- Fin del Protocolo para el envio de factura mensual -->

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
  $editFormAction = $_SERVER['PHP_SELF'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  }
  if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formevent")) {
      
      $updateSQL = sprintf("UPDATE events SET foto=%s, summary=%s, description=%s WHERE id_event=%s",
                            GetSQLValueString($_POST["foto"], "text"),
                            GetSQLValueString($_POST["summary"], "text"),
                            GetSQLValueString($_POST["description"], "text"),
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
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#description',
    height: 300,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor'
    ],
    toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link '
  });
</script>
<script>
  // tinymce.init({
  //   // mode : "textareas",
  //   selector: '#description',
  //   // selector: '#description2',
  //   // width: 545,
  //   height: 300,
  //   menubar: 'file edit view insert format tools table',
  //   plugins: [
  //     'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap emoticons'
  //   ],
  //   toolbar: 'undo redo | bold italic underline charmap emoticons removeformat | alignleft aligncenter alignright alignjustify | outdent indent | fontselect fontsizeselect formatselect | numlist bullist | fullscreen  preview print | image media link codesample | ltr rtl'
  // });
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_details.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>