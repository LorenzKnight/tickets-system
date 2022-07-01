<?php require_once('connections/conexion.php');?>
<?php
	$query_DatosPurchase = sprintf("SELECT * FROM purchase WHERE id_purchase=%s", GetSQLValueString($_GET['purchaseID'], "int")); 
	$DatosPurchase = mysqli_query($con, $query_DatosPurchase) or die(mysqli_error($con));
	$row_DatosPurchase = mysqli_fetch_assoc($DatosPurchase);
	$totalRows_DatosPurchase = mysqli_num_rows($DatosPurchase);
?>
<?php
	$query_DatosOrgMail = sprintf("SELECT * FROM users WHERE id_user=%s", 
						GetSQLValueString($_SESSION['tsys_UserId'], "int")); 
	$DatosOrgMail = mysqli_query($con, $query_DatosOrgMail) or die(mysqli_error($con));
	$row_DatosOrgMail = mysqli_fetch_assoc($DatosOrgMail);
	$totalRows_DatosOrgMail = mysqli_num_rows($DatosOrgMail);
?>
<?php
    $asunto = 'Order Notification for ' .$row_DatosPurchase['event_name'];
    
    $contenido ='</td>
        </tr>	
        <tr height="">
            <td nowrap="nowrap" align="center">
                <img src="'.$dominio.'/img/sys/ticketsgenerator.png" alt="" id="" style="width:70%; margin:5px auto 20px;">
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap" align="center"><h2>'.ObtenerEventName($row_DatosPurchase['id_event']).'</h2></td>
        </tr>
        <tr>
            <td nowrap="nowrap" align="center">
                <img src="'.$dominio.'/img/news/'.ObtenerEventBanner($row_DatosPurchase['id_event']).'" alt="" id="" style="width:90%; margin:5px auto;">
            </td>
        </tr>
        <tr height="">
            <td nowrap="nowrap" align="left" style="padding:0 30px;">
            <br/>
                <h4>'.$row_DatosPurchase['name'].' '.$row_DatosPurchase['surname'].' / '.$row_DatosPurchase['p_name'].' '.$row_DatosPurchase['p_surname'].'</h4>
                <h4>Your ticket is a "'.ticket_name(cart_product_id($row_DatosPurchase['id_purchase'])).'"</h4>
            </td>
        </tr>
        <tr height="">
            <td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
                Order total: '.$row_DatosPurchase['total'].' '.ObtenerCurrency(20).'<br/>
                '.ObtenerEventStart($row_DatosPurchase['id_event']).' at '.ObtenerEventTimeStart($row_DatosPurchase['id_event']).' - '.ObtenerEventEnd($row_DatosPurchase['id_event']).' at '.ObtenerEventTimeEnd($row_DatosPurchase['id_event']).'<br/>
                '.ObtenerEventAdress($row_DatosPurchase['id_event']).'
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap" align="center">
                <br/>
                <img src="'.$dominio.'/img/qr_img/'.$row_DatosPurchase['qr_bar_code'].'" width="200"/>
                <br/>
                <h3>Order Number: '.$row_DatosPurchase['order_number'].'</h3>';
?>
<?php $bcc = 'Bcc: '.$row_DatosOrgMail['email'].'' . "\n"; ?>
<?php $bcc .= 'Bcc: '.$row_DatosPurchase['p_email'].'' . "\n"; ?>
<?php //$bcc .= 'Bcc: '.$row_DatosOrgMult['email'].'' . "\n"; ?>
<?php //$bcc .= 'Bcc: joel4_15@yahoo.com' . "\n"; ?>
<?php SendMailHtml($row_DatosPurchase['email'], $contenido, $asunto, $bcc); ?>

<?php funcionDone($row_DatosPurchase['id_user']); ?>
<?php ticketConfirmed($row_DatosPurchase['id_user']); ?>
<?php
    $evento = $row_DatosPurchase['id_event'];
    $customer = $row_DatosPurchase['id_user'];
    $updateGoTo = "attendee.php?eventno=$evento&forwarded=$customer";
    //$updateGoTo = "attendee.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
      }
      header(sprintf("Location: %s", $updateGoTo));
?>