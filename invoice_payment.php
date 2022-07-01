<?php require_once('connections/conexion.php');?>
<?php
 $query_DatosInvoice = sprintf("SELECT * FROM monthly_billing WHERE acount_no = %s AND status=1", 
                                GetSQLValueString(acountNoFromMail($_GET['mail']), "text")); 
 $DatosInvoice = mysqli_query($con, $query_DatosInvoice) or die(mysqli_error($con));
 $row_DatosInvoice = mysqli_fetch_assoc($DatosInvoice);
 $totalRows_DatosInvoice = mysqli_num_rows($DatosInvoice);
//  echo $query_DatosInvoice;
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
<?php include("inc/wrapper_invoice_payment.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>