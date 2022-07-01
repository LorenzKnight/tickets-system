<?php require_once('../connections/conexion.php'); ?>
<!--///////////////////////////////////// cart cleaner /////////////////////////////////////-->
<?php
	$fecha_actual = date('Y-m-d');
	$datePass = date('Y-m-d',strtotime($fecha_actual.'-2 days'));

	$query_DatosCleaner = sprintf("SELECT * FROM cart WHERE date <= %s AND transaction_made=0", 
									GetSQLValueString($datePass, "text")); 
	$DatosCleaner = mysqli_query($con, $query_DatosCleaner) or die(mysqli_error($con));
	$row_DatosCleaner = mysqli_fetch_assoc($DatosCleaner);
	$totalRows_DatosCleaner = mysqli_num_rows($DatosCleaner);

	if ($totalRows_DatosCleaner != 0) {
		$query_Delete = sprintf("DELETE FROM cart WHERE date <= %s AND transaction_made = 0",
								GetSQLValueString($datePass, "text"));
		// echo $query_Delete;
		$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());
	}
?>
<!--////////////////////////////////////////////////////////////////////////////////////////-->
<?php
	$procentFees = ObtenerFEES();
	$ordernoPM = rand(00000000,99999999);
	$today = date('d');

	$dateNowDayBefore = date('Y-m-d');
    $date_past = strtotime('-1 month', strtotime($dateNowDayBefore));
	$date_past = date('n', $date_past);

	$date_topay = strtotime('+16 day', strtotime($dateNowDayBefore));
	$date_topay = date('d-M-Y', $date_topay);
?>
<?php
	$query_DatosMonthlyBilling = sprintf("SELECT * FROM monthly_billing WHERE id_event=%s AND month=%s ORDER BY id_billing DESC",
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

	if ($today >= 5 && $totalRows_DatosMonthlyBilling == 0) {

		$asunto = 'Order Notification for ' .$ordernoPM;
                    
		$contenido ='<div style="width:600px; background-color:#FFF; overflow: auto; margin: 20px auto; padding:20px 0;">
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:; margin: 0 auto 40px; border-radius:5px;">
				<tr>
					<td width="50%" nowrap="nowrap" align="left" valign="middle" style="padding: 0;">
						<img src="'; $contenido.=$dominio; $contenido.='/img/sys/ticketsgenerator.png" style="width:80%; margin:0;">
					</td>
					<td width="50%" nowrap="nowrap" align="right" valign="middle" style="color:#999; font-size:2rem; font-weight: 200; padding: 0;">
						Faktura
					</td>
				</tr>
			</table>
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FaFaFa; margin: 0 auto 40px; border-radius:5px;">
				<tr height="50">
					<td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
						<p style="font-size:11px; margin:0;">Acount No.</p>
						<p style="margin:0;">'; $contenido.=ObtenerEventAcountNo($_GET['eventno']); $contenido.='</p>
					</td>
				</tr>
				<tr height="50">
					<td width="25%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 0 0 30px;">
						<p style="font-size:11px; margin:0;">Invoice date</p>
						<p style="margin:0;">'; $contenido.=$dateNowDayBefore; $contenido.='</p>
					</td>
					<td width="25%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 0 0 30px;">
						<p style="font-size:11px; margin:0;">Invoice number</p>
						<p style="margin:0;">'; $contenido.=$ordernoPM; $contenido.='</p>
					</td>
					<td width="25%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 0 0 30px;">
						<p style="font-size:11px; margin:0;">Invoice to</p>
						<p style="margin:0;">'; $contenido.=eventUserName(ObtenerEventAcountNo($_GET['eventno'])); $contenido.=' '; $contenido.=eventUserSurname(ObtenerEventAcountNo($_GET['eventno'])); $contenido.='</p>
					</td>
					<td width="25%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 0 0 30px;">
						<p style="font-size:11px; margin:0;">-</p>
						<p style="margin:0;">'; $contenido.=eventUserMail(ObtenerEventAcountNo($_GET['eventno'])); $contenido.='</p>
					</td>
				</tr>
			</table>
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; margin: 0 auto 40px; border-radius:5px;">
				<tr height="">
					<td width="35%" nowrap="nowrap" align="left" valign="middle" style="color:#666; font-size:14px; padding:0 5px;">
						<img src="'; $contenido.=$dominio; $contenido.='/img/news/'; $contenido.=eventBanner($_GET['eventno']); $contenido.='" style="width:95%; margin:5px auto 20px;">
					</td>
					<td width="40%" nowrap="nowrap" valign="top" align="left" style="color:#666; font-size:14px; padding-top: 5px; border-right:1px solid #F0F0F0;">
						<h3 style="color:#000; font-weight: 400;">'; $contenido.=eventName($_GET['eventno']); $contenido.='</h3>
						<p>Start Date: '; $contenido.=eventStart($_GET['eventno']); $contenido.='</p>
						<p>End Date: '; $contenido.=eventStop($_GET['eventno']); $contenido.='</p>
					</td>
					<td width="25%" nowrap="nowrap" align="right" style="color:#666; font-size:14px; padding:0 30px;">
						<p>Income of '; $contenido.= month($date_past); $contenido.= '.: '; $contenido.= $monthlyIN; $contenido.='</p>
						<p>Fees: '; $contenido.= $feesPM; $contenido.='</p>
					</td>
				</tr>
				<tr height="50">
					<td width="40%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px; border-top:1px solid #F0F0F0; border-bottom:1px solid #F0F0F0;">

					</td>
					<td width="35%" nowrap="nowrap" align="right" style="color:#666; font-size:20px; padding:0 30px; border-top:1px solid #F0F0F0; border-bottom:1px solid #F0F0F0; border-right:1px solid #F0F0F0;">
						Total:
					</td>
					<td width="25%" nowrap="nowrap" align="right" style="color:#000; font-size:22px; padding:0 30px; border-top:1px solid #F0F0F0; border-bottom:1px solid #F0F0F0;">
						'; $contenido.= $feesPM; $contenido.='
					</td>
				</tr>
			</table>
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FaFaFa; margin: 0 auto 40px; border-radius:5px;">
				<tr height="40">
					<td width="40%" nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">

					</td>
					<td width="35%" nowrap="nowrap" align="right" style="color:#666; font-size:14px; padding:0 30px; border-right:1px solid #F0F0F0;">
						Due Date:
					</td>
					<td width="25%" nowrap="nowrap" align="right" style="color:#666; font-size:14px; padding:0 30px;">
						'; $contenido.= $date_topay; $contenido.='
					</td>
				</tr>
			</table>
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto 0; border-radius:5px;">
				<tr>
					<td colspan="3" nowrap="nowrap" align="center">
						<a style="color:blue;" href="'; $contenido.=$dominio; $contenido.='/invoice_payment.php?eventno='; $contenido.=$_GET['eventno']; $contenido.='&invoiceNo='; $contenido.=$ordernoPM; $contenido.='&mail='; $contenido.=eventUserMail(ObtenerEventAcountNo($_GET['eventno'])); $contenido.='">
							<button style="width:100%; height:50px; background-color:#d8420c; color:#FFF; font-size:14px; border:0; border-radius:4px; cursor: pointer;">Click here to pay this invoice</button>
						</a>
					</td>
				</tr>
			</table>
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto 0; border-radius:5px;">
				<tr>
					<td colspan="3" nowrap="nowrap" align="center">
						<p style="font-size:12px; color:#666;"> Start selling in minutes with Ticketsgenerator <br/> 
						<a style="color:#999; font-size:14px;" href="http://www.ticketsgenerator.com">www.ticketsgenerator.com</a> <br/>
						questions? <a style="color:#999; font-size:12px;" href="mailto:info@ticketsgenerator.com">info@ticketsgenerator.com</a> </p>
					</td>
				</tr>
			</table>
		</div>';
                     
		InsertarMontoMensual($_GET['eventno'], ObtenerEventAcountNo($_GET['eventno']), $date_past, $ordernoPM, $monthlyIN, $feesPM, 1, $contenido, $asunto);	
	}
?>
<!-- Fin del Protocolo para el envio de factura mensual -->
<?php
	$query_DatosTemp = sprintf("SELECT * FROM temp_user WHERE id_temp=%s ORDER BY id_temp DESC", 
									GetSQLValueString($_SESSION['tsys_UserId'], "int")); 
	$DatosTemp = mysqli_query($con, $query_DatosTemp) or die(mysqli_error($con));
	$row_DatosTemp = mysqli_fetch_assoc($DatosTemp);
	$totalRows_DatosTemp = mysqli_num_rows($DatosTemp);
?>
<?php
  $editFormAction = $_SERVER['PHP_SELF'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  }

  if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "discountrequest")) {

    $query_DatosPromoCodeControl = sprintf("SELECT * FROM cart WHERE discountcode = %s AND transaction_made != 0 ORDER BY discountcode ASC",
                                GetSQLValueString($_POST["discountcode"], "int")); 
    $DatosPromoCodeControl = mysqli_query($con, $query_DatosPromoCodeControl) or die(mysqli_error($con));
    $row_DatosPromoCodeControl = mysqli_fetch_assoc($DatosPromoCodeControl);
    $totalRows_DatosPromoCodeControl = mysqli_num_rows($DatosPromoCodeControl);

	$startD = date("Y-m-d");

    if (comprobarDiscountCode($_POST["discountcode"]) && quantiCode($_POST["discountcode"], $totalRows_DatosPromoCodeControl) && dateConfirm($_POST["discountcode"], $startD, $startD) && eventConfirm($_POST["discountcode"], $row_DatosTemp['id_event']))
    {

        $insertSQL = sprintf("INSERT INTO cart(id_event, id_user, discountcode, date) 
							  VALUES (%s, %s, %s, NOW())",
							  GetSQLValueString($row_DatosTemp['id_event'], "int"),
                              GetSQLValueString($_SESSION['tsys_UserId'], "int"),
							  GetSQLValueString($_POST["discountcode"], "text"));

        
        $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
        
		
		$evento = $row_DatosTemp['id_event'];
		$insertGoTo = "events.php?eventno=$evento&new=1";
        if (isset($_SERVER['QUERY_STRING'])) {
          $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
          $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));

    } else {
		$evento = $row_DatosTemp['id_event'];
		$insertGoTo = "events.php?eventno=$evento&discount=2";
        if (isset($_SERVER['QUERY_STRING'])) {
          $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
          $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));
    }
  }
?>

<?php
	$query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
	$DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
	$row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
	$totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
	$query_DatosTickets = sprintf("SELECT * FROM tickets WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
	$DatosTickets = mysqli_query($con, $query_DatosTickets) or die(mysqli_error($con));
	$row_DatosTickets = mysqli_fetch_assoc($DatosTickets);
	$totalRows_DatosTickets = mysqli_num_rows($DatosTickets);
?>
<?php
	$query_DatosTicketsChange = sprintf("SELECT * FROM tickets WHERE id_event=%s", 
											GetSQLValueString($_GET['eventno'], "int")); 
	$DatosTicketsChange = mysqli_query($con, $query_DatosTicketsChange) or die(mysqli_error($con));
	$row_DatosTicketsChange = mysqli_fetch_assoc($DatosTicketsChange);
	$totalRows_DatosTicketsChange = mysqli_num_rows($DatosTicketsChange);
?>
<?php
	$query_DatosCart = sprintf("SELECT * FROM cart WHERE id_event=%s AND id_user=%s AND transaction_made=%s AND discountcode IS NULL", 
						GetSQLValueString($_GET['eventno'], "int"),
						GetSQLValueString($_SESSION['tsys_UserId'], "int"),
						0); 
	$DatosCart = mysqli_query($con, $query_DatosCart) or die(mysqli_error($con));
	$row_DatosCart = mysqli_fetch_assoc($DatosCart);
	$totalRows_DatosCart = mysqli_num_rows($DatosCart);
?>
<?php
	$query_DatosCartDiscount = sprintf("SELECT * FROM cart WHERE id_event=%s AND id_user=%s AND transaction_made=%s AND discountcode IS NOT NULL", 
						GetSQLValueString($_GET['eventno'], "int"),
						GetSQLValueString($_SESSION['tsys_UserId'], "int"),
						0); 
	$DatosCartDiscount = mysqli_query($con, $query_DatosCartDiscount) or die(mysqli_error($con));
	$row_DatosCartDiscount = mysqli_fetch_assoc($DatosCartDiscount);
	$totalRows_DatosCartDiscount = mysqli_num_rows($DatosCartDiscount);
?>
<?php
	$query_DatosCountry = sprintf("SELECT * FROM countries ORDER BY country_name ASC"); 
	$DatosCountry = mysqli_query($con, $query_DatosCountry) or die(mysqli_error($con));
	$row_DatosCountry = mysqli_fetch_assoc($DatosCountry);
	$totalRows_DatosCountry = mysqli_num_rows($DatosCountry);
?>
<?php
	$query_DatosPurchase = sprintf("SELECT * FROM purchase WHERE id_user=%s ORDER BY id_purchase DESC", 
										GetSQLValueString($_SESSION['tsys_UserId'], "int")); 
	$DatosPurchase = mysqli_query($con, $query_DatosPurchase) or die(mysqli_error($con));
	$row_DatosPurchase = mysqli_fetch_assoc($DatosPurchase);
	$totalRows_DatosPurchase = mysqli_num_rows($DatosPurchase);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formcheckout")) {
     
     $updateSQL = sprintf("UPDATE temp_user SET name=%s, surname=%s, email=%s, adress1=%s, adress2=%s, city=%s, post=%s, country=%s, sex=%s, p_name=%s, p_surname=%s, p_email=%s, total=%s WHERE id_temp=%s",
                          GetSQLValueString($_POST["name"], "text"),
                          GetSQLValueString($_POST["surname"], "text"),
						  GetSQLValueString($_POST["email"], "text"),
						  GetSQLValueString($_POST["adress1"], "text"),
						  GetSQLValueString($_POST["adress2"], "text"),
						  GetSQLValueString($_POST["city"], "text"),
						  GetSQLValueString($_POST["post"], "text"),
						  GetSQLValueString($_POST["country"], "int"),
						  GetSQLValueString($_POST["sex"], "int"),
						  GetSQLValueString($_POST["p_name"], "text"),
						  GetSQLValueString($_POST["p_surname"], "text"),
						  GetSQLValueString($_POST["p_email"], "text"),
						  GetSQLValueString($_POST["total"], "text"),
                          GetSQLValueString($_POST["id_temp"], "int"));
		

$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

$evento = $row_DatosTemp['id_event'];
$updateGoTo = "events.php?eventno=$evento&payment=1";
if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<?php
	$query_DatosOrgMail = sprintf("SELECT * FROM users WHERE acount_no=%s AND id_admin IS NULL", 
						GetSQLValueString($row_DatosEvent['acount_no'], "int")); 
	$DatosOrgMail = mysqli_query($con, $query_DatosOrgMail) or die(mysqli_error($con));
	$row_DatosOrgMail = mysqli_fetch_assoc($DatosOrgMail);
	$totalRows_DatosOrgMail = mysqli_num_rows($DatosOrgMail);
?>
<?php
	$perm = "TSYS-P0021";
	
	$query_DatosOrgMult = sprintf("SELECT * FROM multi_user_access WHERE acount_no=%s AND permissions=%s", 
						GetSQLValueString($row_DatosEvent['acount_no'], "int"),
						GetSQLValueString($perm, "text")); 
	$DatosOrgMult = mysqli_query($con, $query_DatosOrgMult) or die(mysqli_error($con));
	$row_DatosOrgMult = mysqli_fetch_assoc($DatosOrgMult);
	$totalRows_DatosOrgMult = mysqli_num_rows($DatosOrgMult);
?>
<?php if($_GET["payment"]):?>
	<?php
     require '../qrcode/qrlib.php';

	 $dir = '../img/qr_img/';
	 $qr_number = $row_DatosTemp['user_name'];

     if (!file_exists($dir))
            mkdir($dir);

            $filename = $dir. $qr_number.'.png';

            $tamanio = 10;
            $level = 'M';
            $frameSize = 3;
            $contenido = $qr_number;

            QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

            //echo '<img src="'.$filename.'" width="200"/>';
	?>
<?php endif ?>



<?php
	//$dateNow = date("d F Y");
	// $dateNow2 = date("Y-m-d");
	$dateNow = date('Y-m-d H:i:s');

	// $fecha2=time()+3600; //1 hours
    // $timeNow = date("H:i:s",$fecha2);
?>
<?php if ($totalRows_DatosTicketsChange > 0) {
	do { ?>
		<?php $quant = ObtenerStockReal($row_DatosTicketsChange['id_ticket']); ?>

		<?php if ($row_DatosTicketsChange['stock'] <= $quant) : ?>
				<?php ActualizacionTicketStatus(1, $row_DatosTicketsChange['id_ticket'], $_GET['eventno'], 0); ?>
		<?php endif ?>
		<?php if ($row_DatosTicketsChange['end_datetime'] <= $dateNow) : ?>
				<?php ActualizacionTicketStatus(1, $row_DatosTicketsChange['id_ticket'], $_GET['eventno'], 0); ?>
		<?php endif ?>
		<?php if ($row_DatosTicketsChange['start_datetime'] <= $dateNow) : ?>
				<?php ActualizacionTicketStatus(0, $row_DatosTicketsChange['id_ticket'], $_GET['eventno'], 4); ?>
		<?php endif ?>
<?php } while ($row_DatosTicketsChange = mysqli_fetch_assoc($DatosTicketsChange));
}
?>
<?php if($row_DatosEvent['end_datetime'] < $dateNow) { ?>
	<?php ActualizacionEventStatus(2, $_GET['eventno']); ?>
<?php } ?>


<html>
<head>
<meta charset="utf8mb4_unicode_ci">
<meta name="keywords" content="Biljtt, biljetthantering, event, skapa, biljetter, scanna, billigt, billig, QR, kod">
<meta name="description" content="Behöver du biljetter till ditt event? TicketsGenerator erbjuder smidig och billig biljettförsäljning online.">
<title><?php echo $row_DatosEvent['event_name']; ?> | <?php echo $pageName; ?></title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/style_front.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="icon" href="img/tg_icon.png">

<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<!-- <script src="../js/jquery-3.2.1.min.js" ></script> -->

<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v3"></script> -->
<!-- Paypal code -- Add meta tags for mobile and IE -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<script>
	var site="limpiador_carrito.php"
	limpiadorcarrito() {
		location.href=site;
	};
</script>
<script>
// Inicializa scroll
$(function()
{
	// Inicializando flotante rojo
	var $flotante = $('.buy');
	$flotante.hide();
	var altura = $('.buyfijo').offset().top;
	// Scroll
	$(window).scroll(function()
	{
		if ($(window).scrollTop() > altura)
		{
			$flotante.show();
			console.log('Ahora me ves');
		}
		else
		{
			$flotante.hide();
			console.log('Ahora no me ves');
		}
	});
});
</script>
</head>
<body onLoad='redireccionar()'>
<script>
    function promocode() {
		var styles = {
			// "background-color": "red",
			"opacity": "1",
			// "transition": "300ms ease-in-out 100ms",
			// "animation-delay": "0.1s",
			"display": "block"
		};
		var promoCode = document.getElementById("code");
		Object.assign(promoCode.style, styles);

		document.getElementById("info").style.display="none";
    }

    function ocurtar() {
		event.stopPropagation()
		document.getElementById("popup1").style.display="none";
    }
</script>

    <?php //include("inc/header.php"); ?>
	<?php include("inc/wrapper_events.php"); ?>
    <?php include("inc/foot.php"); ?>   
</body>
</html>