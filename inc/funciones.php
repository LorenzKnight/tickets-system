<?php 

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  global $con;
  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con, $theValue) : mysqli_escape_string($con,$theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobaremailunico($email)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT email FROM users WHERE email = %s ",
		 GetSQLValueString($email, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerNombreUsuario($nombre)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT name FROM users WHERE id_user = %s ",
		 GetSQLValueString($nombre, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerApellidoUsuario($apellido)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT surname FROM users WHERE id_user = %s ",
		 GetSQLValueString($apellido, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["surname"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEmailUsuario($Uemail)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT email FROM users WHERE id_user = %s ",
		 GetSQLValueString($Uemail, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["email"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerNumeroOrdenlUsuario($Uorden)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT acount_no FROM users WHERE id_user = %s ",
		 GetSQLValueString($Uorden, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["acount_no"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticket_name($ticket)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT ticket_name FROM tickets WHERE id_ticket = %s ",
		 GetSQLValueString($ticket, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["ticket_name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function cart_product_id($purchaseID)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT id_product FROM cart WHERE transaction_made = %s ",
		 GetSQLValueString($purchaseID, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["id_product"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticket_id($purInfo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE transaction_made = %s ",
		 GetSQLValueString($purInfo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	?>
	<?php
	if ($totalRows_ConsultaFuncion > 0) {
	do {
	?> 
			<?php echo $row_ConsultaFuncion['quantity'];?> <?php echo ticket_name($row_ConsultaFuncion['id_product']);?><br/>
	<?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticketsTyp($purchase_Id)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT product_type FROM cart WHERE transaction_made = %s ",
		 GetSQLValueString($purchase_Id, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["product_type"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticket_price($price)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT price FROM tickets WHERE id_ticket = %s ",
		 GetSQLValueString($price, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["price"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerCurrency($currency)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT exchange FROM currency WHERE id_currency = %s ",
		 GetSQLValueString($currency, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["exchange"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarProductoSumar($ProductoSuma, $eventSuma)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_product = %s AND id_user = %s AND id_event = %s",
		 GetSQLValueString($ProductoSuma, "int"),
		 GetSQLValueString($_SESSION['tsys_UserId'], "int"),
		 GetSQLValueString($eventSuma, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return $row_ConsultaFuncion["id_counter"];
	else return 0;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function singleCouple($singleCouple)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT single_couple FROM tickets WHERE id_ticket = %s ",
		 GetSQLValueString($singleCouple, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["single_couple"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function visibility($GetVStatus)
{
	if ($GetVStatus == 0) return "On sale";
	if ($GetVStatus == 1) return "Ended";
	if ($GetVStatus == 2) return "Hidden";
	if ($GetVStatus == 3) return "Hidden/On sale";
	if ($GetVStatus == 4) return "Waiting";
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function visibilityEvent($GetEStatus)
{
	if ($GetEStatus == 0) return "On sale";
	if ($GetEStatus == 1) return "Postponed";
	if ($GetEStatus == 2) return "Ended";
	if ($GetEStatus == 3) return "Draft";
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerFEES()
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT percent FROM fees WHERE id_fees = 1");
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["percent"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEmailTemp($emailTemp)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT email FROM temp_user WHERE id_temp = %s ",
	GetSQLValueString($emailTemp, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["email"];	
	
	mysqli_free_result($ConsultaFuncion);
}


////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEmailPartnerTemp($pemailTemp)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT p_email FROM temp_user WHERE id_temp = %s ",
	GetSQLValueString($pemailTemp, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["p_email"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventno($eventno)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT id_event FROM temp_user WHERE id_temp = %s ",
	GetSQLValueString($eventno, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventName($eventName)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_name FROM events WHERE id_event = %s ",
	GetSQLValueString($eventName, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventStart($eventStart)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_start FROM events WHERE id_event = %s ",
	GetSQLValueString($eventStart, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_start"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventStop($eventStop)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_end FROM events WHERE id_event = %s ",
	GetSQLValueString($eventStop, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_end"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventBanner($eventNum)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT foto FROM events WHERE id_event = %s ",
	GetSQLValueString($eventNum, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["foto"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventUserName($userOrderNo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT name FROM users WHERE acount_no = %s ",
	GetSQLValueString($userOrderNo, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventUserSurname($userOrderNo2)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT surname FROM users WHERE acount_no = %s ",
	GetSQLValueString($userOrderNo2, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["surname"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventUserMail($userOrderNo3)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT email FROM users WHERE acount_no = %s ",
	GetSQLValueString($userOrderNo3, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["email"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarticketdoble($idUserTicket)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT product_type FROM cart WHERE product_type = 2 AND transaction_made = 0 AND id_user = %s",
	GetSQLValueString($idUserTicket, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion != 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ActualizacionCarrito($Inscription)
{
	global $con;
		$updateSQL = sprintf("UPDATE cart SET transaction_made=%s WHERE id_user=%s AND transaction_made= 0",
			$Inscription,
			$_SESSION['tsys_UserId']);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ConfirmacionPago($ano, $mes, $dia, $hora, $order_number, $qr_bar_code, $id_user, $id_event, $name, $surname, $email, $adress1, $adress2, $city, $post, $country, $sex, $p_name, $p_surname, $p_email, $payment, $total)
{
	global $con;
	
	$insertSQL = sprintf("INSERT INTO purchase (date, year, month, day, time, order_number, qr_bar_code, id_user, id_event, name, surname, email, adress1, adress2, city, post, country, sex, p_name, p_surname, p_email, payment, total, done, status) 
									VALUES (NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
									 GetSQLValueString($ano, "text"),
									 GetSQLValueString($mes, "text"),
									 GetSQLValueString($dia, "text"),
									 GetSQLValueString($hora, "text"),
									 GetSQLValueString($order_number, "int"),
									 GetSQLValueString($qr_bar_code, "text"),
									 GetSQLValueString($id_user, "int"),
									 GetSQLValueString($id_event, "int"),
									 GetSQLValueString($name, "text"),
									 GetSQLValueString($surname, "text"),
									 GetSQLValueString($email, "text"),
									 GetSQLValueString($adress1, "text"),
									 GetSQLValueString($adress2, "text"),
									 GetSQLValueString($city, "text"),
									 GetSQLValueString($post, "text"),
									 GetSQLValueString($country, "int"),
									 GetSQLValueString($sex, "int"),
									 GetSQLValueString($p_name, "text"),
									 GetSQLValueString($p_surname, "text"),
									 GetSQLValueString($p_email, "text"),
									 GetSQLValueString($payment, "int"),
									 GetSQLValueString($total, "text"),
									 0,
									 1);
	//echo $insertSQL;
	$Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
	$ultimacompra = mysqli_insert_id($con);
	ActualizacionCarrito($ultimacompra);
	
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function funcionDone($customentDone)
{
	global $con;
		$updateSQL = sprintf("UPDATE purchase SET done=1 WHERE id_user=%s AND done=0",
			$customentDone);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticketConfirmed($ticketConfirmed)
{
	global $con;
		$updateSQL = sprintf("UPDATE cart SET confirmed=1 WHERE id_user=%s AND confirmed=0",
			$ticketConfirmed);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventName($idevent)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_name FROM events WHERE id_event = %s ",
	GetSQLValueString($idevent, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventAdress($ideventAdress)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_adress FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventAdress, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_adress"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventBanner($ideventBanner)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT foto FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventBanner, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["foto"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventAcountNo($acountNo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT acount_no FROM events WHERE id_event = %s ",
	GetSQLValueString($acountNo, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["acount_no"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventStart($ideventStart)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_start FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventStart, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_start"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventTimeStart($ideventTimeStart)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT time_start FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventTimeStart, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["time_start"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventEnd($ideventEnd)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT event_end FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventEnd, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["event_end"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventTimeEnd($ideventTimeEnd)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT time_end FROM events WHERE id_event = %s ",
	GetSQLValueString($ideventTimeEnd, "int"));
		 
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["time_end"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerIdParaEmailMultiuser($acountNo, $permissions)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM multi_user_access WHERE acount_no=%s AND permissions=%s", 
							GetSQLValueString($acountNo, "int"),
							GetSQLValueString($permissions, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
		if ($totalRows_ConsultaFuncion > 0) {
			do {
	?>
			
		<?php ObtenerEmailUsuario($row_ConsultaFuncion["id_user"]); ?>

	<?php
			} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
		} 

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function SendMailHtml($destinatario, $contenido, $asunto, $bcc)
{
	$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Documento sin título</title>
</head>

<body>
		<table width="70%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0F0F0; margin: 20px auto;">
			<tr height="50">
				<td nowrap="nowrap" align="center">
					<br/>'; 
					$mensaje.= $QRcode;
					':
					<br/>
					<p>';
					$mensaje.= $contenido;
					$mensaje.='</p>
					<br/><br/>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" align="center">
					<p style="color:#666; font-size:14px;">Do you organize events?</p>
					<p style="font-size:12px; color:#666;"> Start selling in minutes with<br/> 
					<a style="color:#999; font-size:14px;" href="http://www.ticketsgenerator.com">www.ticketsgenerator.com</a> <br/>
					questions? <a style="color:#999; font-size:12px;" href="mailto:info@ticketsgenerator.com">info@ticketsgenerator.com</a> </p>
				</td>
			</tr>
			<tr height="50">
				<td nowrap="nowrap" align="center">
					
				</td>
			</tr>
		</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: order@ticketsgenerator.com' . "\n";
	// $cabeceras .= 'Bcc: joellorenzo.k@gmail.com' . "\n";
	$cabeceras .= 'Bcc: '.$bcc.'' . "\n";
	
	// Enviarlo
	mail($destinatario, $asunto, $mensaje, $cabeceras);
	// echo $mensaje;
	
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function organizersMulti($acountNumb)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM users WHERE acount_no = %s ",
		 GetSQLValueString($acountNumb, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	?>
	<?php
	if ($totalRows_ConsultaFuncion > 0) {
	do {
	?> 
			<?php $row_ConsultaFuncion['email'];?>
	<?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerStock($idTicket)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_product = %s AND transaction_made != 0 AND confirmed != 0",
		 GetSQLValueString($idTicket, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	
	$cantidad = $row_ConsultaFuncion["quantity"] - 1;
	$realstock = $totalRows_ConsultaFuncion;

	$resultado = $realstock + $cantidad;

	if ($resultado < 0)
		return $resultado + 1;
		else $resultado;

	return $resultado;	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerStockReal($idTicket)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_product = %s AND confirmed != 0 AND transaction_made != 0",
		 GetSQLValueString($idTicket, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $totalRows_ConsultaFuncion;	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function stockSoldout($idTicketSold)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_product = %s AND transaction_made != 0",
		 GetSQLValueString($idTicketSold, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $totalRows_ConsultaFuncion;	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

// function updateDisponProduct($ticketsoldout, $ticketstock)
// {
// 	global $con;
// 		$updateSQL = sprintf("UPDATE tickets SET visibility=1 WHERE visibility != 1 AND id_ticket=%s AND stock = %s",
// 			$ticketsoldout,
// 			$ticketstock);
  
//   $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
// }

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function updatetoActivProduct($ticketupdated, $ticketstock2)
{
	global $con;
		$updateSQL = sprintf("UPDATE tickets SET visibility=0 WHERE visibility = 1 AND id_ticket=%s AND stock > %s",
			$ticketupdated,
			$ticketstock2);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ActualizacionTicketStatus($ticketStatus, $ticketID, $eventID, $visib)
{
	global $con;
		$updateSQL = sprintf("UPDATE tickets SET visibility=%s WHERE id_ticket=%s AND id_event=%s AND visibility=%s",
			$ticketStatus,
			$ticketID,
			$eventID,
			$visib);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ticketsWaiting($ticketsStatus, $ticketsID, $eventsID)
{
	global $con;
		$updateSQL = sprintf("UPDATE tickets SET visibility=%s WHERE id_ticket=%s AND id_event=%s",
			$ticketsStatus,
			$ticketsID,
			$eventsID);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerGross($idEvento)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM purchase WHERE id_event=%s AND done=%s", 
							$idEvento,
							1);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
		if ($totalRows_ConsultaFuncion > 0) {
			do {
	?>
			
		<?php $precioTotal = $precioTotal + $row_ConsultaFuncion["total"]; ?>

	<?php
			} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
		} else { 
			return "0";
		}

		return $precioTotal;

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerTicketsKvant($idEvents)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tickets WHERE id_event=%s AND visibility<%s", 
							$idEvents,
							2);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
		if ($totalRows_ConsultaFuncion > 0) {
		do {
		?> 
	<?php $cantidadTotal = $cantidadTotal + $row_ConsultaFuncion["stock"]; ?>

	<?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}	
	return $cantidadTotal;

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerTicketsVendido($idEvents)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_event=%s AND transaction_made != 0 AND confirmed != 0", 
							$idEvents);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
	if ($totalRows_ConsultaFuncion > 0) {
	do {
	?> 

	<?php $cantidadVendida = $cantidadVendida + $row_ConsultaFuncion["quantity"]; ?>

	<?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}
	else
	{
		$cantidadVendida = 0;
	}	

	return $cantidadVendida;

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerTipoTicketsVendido($idTicketTipo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_product=%s AND transaction_made != 0 AND confirmed != 0", 
							$idTicketTipo);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
	if ($totalRows_ConsultaFuncion > 0) {
	do {
	?> 

	<?php $cantidadTicketVendido = $cantidadTicketVendido + $row_ConsultaFuncion["quantity"]; ?>

	<?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
	}	
	else
	{
		$cantidadTicketVendido = 0;
	}
	return $cantidadTicketVendido;

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ActualizacionEventStatus($eventStatus, $eventNu)
{
	global $con;
		$updateSQL = sprintf("UPDATE events SET status=%s WHERE id_event=%s",
			$eventStatus,
			$eventNu);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventoEdit($idUserEvent)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tickets WHERE user_edit = %s ORDER BY date_edit DESC",
		 GetSQLValueString($idUserEvent, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventoCreate($idUserEvent2)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tickets WHERE id_user = %s ORDER BY date DESC",
		 GetSQLValueString($idUserEvent2, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventoEditFcode($idUserCode)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM adm_discount_list WHERE user_edit = %s ORDER BY date_edit DESC",
		 GetSQLValueString($idUserCode, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventoEditedAttendee($idUserAttendee)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM purchase WHERE user_edit = %s ORDER BY date_edit DESC",
		 GetSQLValueString($idUserAttendee, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerEventoprenumeration($idUserPrenumeration, $idEventPrenumeration)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tickets WHERE id_user = %s AND id_event = %s",
		 GetSQLValueString($idUserPrenumeration, "int"),
		 GetSQLValueString($idEventPrenumeration, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	return $row_ConsultaFuncion["id_event"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function MasDeUnticket($currentEvent)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM tickets WHERE id_event = %s ",
		 GetSQLValueString($currentEvent, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion < 1) 
		return false;
	else return true;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function PrenumerationUpdate($PreLevel, $prenumerationUser, $PreIdEvent)
{
	global $con;
		$updateSQL = sprintf("UPDATE events SET prenumeration=%s, prenumeration_date=NOW() WHERE acount_no=%s AND id_event=%s AND prenumeration=%s",
			$PreLevel,
			$prenumerationUser,
			$PreIdEvent,
			0);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerNombreGuest($guestName)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT name FROM purchase WHERE id_user = %s ",
		 GetSQLValueString($guestName, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerApellidoGuest($guestSurname)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT surname FROM purchase WHERE id_user = %s ",
		 GetSQLValueString($guestSurname, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["surname"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerNombrePGuest($pGuestName)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT p_name FROM purchase WHERE id_user = %s ",
		 GetSQLValueString($pGuestName, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["p_name"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerApellidoPGuest($pGuestSurname)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT p_surname FROM purchase WHERE id_user = %s ",
		 GetSQLValueString($pGuestSurname, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["p_surname"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ConvertiraOrderNo($idPur)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT id_purchase FROM purchase WHERE order_number = %s ",
		 GetSQLValueString($idPur, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["id_purchase"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerOrderNo($orderNo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT order_number FROM purchase WHERE id_purchase = %s ",
		 GetSQLValueString($orderNo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["order_number"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarcheckinSumar($orderNo, $ticketType)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT checkin FROM cart WHERE transaction_made = %s AND product_type > %s",
									GetSQLValueString($orderNo, "int"),
									GetSQLValueString($ticketType, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;

	// if ($totalRows_ConsultaFuncion > 0) 
	// 	return $row_ConsultaFuncion["id_counter"];
	// else return 0;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarcheckinDone($transNo, $ticketTyp)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT checkin FROM cart WHERE transaction_made = %s AND product_type > %s",
									GetSQLValueString($transNo, "int"),
									GetSQLValueString($ticketTyp, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;

	// if ($totalRows_ConsultaFuncion > 0) 
	// 	return $row_ConsultaFuncion["id_counter"];
	// else return 0;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarTicketExiste($orderNo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT checkin FROM cart WHERE transaction_made = %s",
									GetSQLValueString($orderNo, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function rank($rank)
{
//Programador(es) y soportes
	if ($rank == 0) return "Owner";
	if ($rank == 1) return "Suport";
//Usuarios que se resgistran
	if ($rank == 2) return "Admin";
	if ($rank == 3) return "Coworker";
//No definidos
	if ($rank == 4) return "Volunteer/Contributor";
	if ($rank == 5) return "Subscriber";
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function recogerusuariomultiple($multiUserEmail)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT id_user FROM users WHERE email = %s ",
		 							GetSQLValueString($multiUserEmail, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["id_user"];	
	
	mysqli_free_result($ConsultaFuncion);
}

function emailToCompleteMultiuser($destinatario, $contenido, $asunto)
{
	$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Documento sin título</title>
</head>

<body>
		<table width="70%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important; margin: 20px auto;">
			<tr height="50">
				<td nowrap="nowrap" align="center">
					
				</td>
			</tr>	
			<tr height="50">
				<td nowrap="nowrap" align="center">
					<img src="https://ticketsgenerator.com/img/sys/ticketsgenerator.png" alt="" id="" style="margin:5px 40px 0;" width="33.33%" height="">
				</td>
			</tr>
			<tr height="50">
				<td nowrap="nowrap" align="center">
					
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" align="center">
					<br/>
					<p>';
					$mensaje.= $contenido;
					$mensaje.='</p>
					<br/><br/>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" align="center">
					<p style="color:#666; font-size:14px;">Do you organize events?</p>
					<p style="font-size:12px; color:#666;"> Start selling in minutes with Ticketsgenerator <br/> 
					<a style="color:#999; font-size:14px;" href="http://www.ticketsgenerator.com">www.ticketsgenerator.se</a> <br/>
					questions? <a style="color:#999; font-size:12px;" href="mailto:info@ticketsgenerator.com">info@ticketsgenerator.com</a> </p>
				</td>
			</tr>
			<tr height="50">
				<td nowrap="nowrap" align="center">
					
				</td>
			</tr>
		</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: help@ticketsgenerator.com' . "\n";
	$cabeceras .= 'Bcc: joellorenzo.k@gmail.com' . "\n";
	
	// Enviarlo
	mail($destinatario, $asunto, $mensaje, $cabeceras);
	echo $mensaje;
	
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function showPermissions($multiUserID, $permissionID)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM multi_user_access WHERE id_user = %s AND permissions = %s",
									GetSQLValueString($multiUserID, "int"),
									GetSQLValueString($permissionID, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarPasswordbasio($emailMulti)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT password FROM users WHERE email = %s ",
		 GetSQLValueString($emailMulti, "text"));
	echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerMontoMensual($idEventoMM, $monthMM)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM purchase WHERE id_event=%s AND month=%s", 
							GetSQLValueString($idEventoMM, "int"),
							GetSQLValueString($monthMM, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	?>
	<?php
		if ($totalRows_ConsultaFuncion > 0) {
			do {
	?>
			
		<?php $precioTotal = $precioTotal + $row_ConsultaFuncion["total"]; ?>

	<?php
			} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));
		} else { 
			return "0";
		}
		
		return $precioTotal;

	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function InsertarMontoMensual($id_eventPM, $acountNo, $mesPM, $ordernoPM, $monthlyIN, $feesPM, $statusPM, $contenido, $asunto)
{
	global $con;
	
	$insertSQL = sprintf("INSERT INTO monthly_billing (date, id_event, acount_no, month, order_number, monthly_income, fees, status) 
									VALUES (NOW(), %s, %s, %s, %s, %s, %s, %s)",
									 GetSQLValueString($id_eventPM, "int"),
									 GetSQLValueString($acountNo, "int"),
									 GetSQLValueString($mesPM, "int"),
									 GetSQLValueString($ordernoPM, "int"),
									 GetSQLValueString($monthlyIN, "text"),
									 GetSQLValueString($feesPM, "text"),
									 GetSQLValueString($statusPM, "int"));
	//echo $insertSQL;
	$Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
	$ultimacompra = mysqli_insert_id($con);

	// MandarFaktura($ultimacompra, $contenido, $asunto);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function MandarFaktura($destinatario, $contenido, $asunto)
{
	$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Documento sin título</title>
</head>

<body>';
	$mensaje.= $contenido;
	$mensaje.='
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: order@ticketsgenerator.com' . "\n";
	$cabeceras .= 'Bcc: joellorenzo.k@gmail.com' . "\n";
	
	// Enviarlo
	mail($destinatario, $asunto, $mensaje, $cabeceras);
	// echo $mensaje;
	
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function month($mes)
{
	if ($mes == 1 || $mes == '01') return "Jan";
	if ($mes == 2 || $mes == '02') return "Feb";
	if ($mes == 3 || $mes == '03') return "Mar";
	if ($mes == 4 || $mes == '04') return "Apr";
	if ($mes == 5 || $mes == '05') return "May";
	if ($mes == 6 || $mes == '06') return "Jun";
	if ($mes == 7 || $mes == '07') return "Jul";
	if ($mes == 8 || $mes == '08') return "Aug";
	if ($mes == 9 || $mes == '09') return "Sept";
	if ($mes == 10) return "Oct";
	if ($mes == 11) return "Nob";
	if ($mes == 12) return "Dec";
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ActualizacionCarrito2($Inscription)
{
	global $con;
		$updateSQL = sprintf("UPDATE cart SET transaction_made=%s WHERE id_user=%s AND transaction_made= 0",
			$Inscription,
			$_SESSION['tks_UserId']);
  
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarTipoTicket($idPurchase)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT product_type FROM cart WHERE transaction_made = %s ORDER BY id_counter DESC",
									GetSQLValueString($idPurchase, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["product_type"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function acountNoFromMail($invoiceEmail)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT acount_no FROM users WHERE email = %s",
									GetSQLValueString($invoiceEmail, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["acount_no"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarCheckin($purchaseId)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT checkin FROM cart WHERE transaction_made = %s",
									GetSQLValueString($purchaseId, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["checkin"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function codeUses($codeUses)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE discountcode = %s AND transaction_made != 0",
										 GetSQLValueString($codeUses, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $totalRows_ConsultaFuncion ;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarcodeunico($codeunico, $eventCode)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT code FROM adm_discount_list WHERE code = %s AND id_event = %s ",
										GetSQLValueString($codeunico, "text"),
										GetSQLValueString($eventCode, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discID($discID)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT id_adm_disc FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discID, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["id_adm_disc"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discPerc($discPe)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT percent FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discPe, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["percent"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discMoney($discMo)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT money FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discMo, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["money"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function shtickets($sh)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT show_hidden_tickets FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($sh, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["show_hidden_tickets"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discQuan($discQ)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT quanti FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discQ, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["quanti"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discStartd($discStd)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT start_date FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discStd, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["start_date"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function discStopd($discSpd)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT stop_date FROM adm_discount_list WHERE code=%s",
										 GetSQLValueString($discSpd, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["stop_date"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function showTicketPCode($pCodeID, $pTicketID)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE id_code = %s AND id_ticket = %s",
									GetSQLValueString($pCodeID, "int"),
									GetSQLValueString($pTicketID, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function comprobarDiscountCode($discountcode)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT code FROM discount WHERE code = %s ",
		 GetSQLValueString($discountcode, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function quantiCode($discCode, $cantidadcode)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE code = %s AND quanti > %s ",
			GetSQLValueString($discCode, "text"),
			GetSQLValueString($cantidadcode, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function dateConfirm($dCode, $startDate, $stopDate)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE code = %s AND start_date <= %s AND stop_date > %s",
										GetSQLValueString($dCode, "text"),
										GetSQLValueString($startDate, "text"),
										GetSQLValueString($stopDate, "text"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con, $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function eventConfirm($dcntCode, $dcntEvent)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM adm_discount_list WHERE code = %s AND id_event = %s",
										GetSQLValueString($dcntCode, "text"),
										GetSQLValueString($dcntEvent, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con, $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion!=0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function ObtenerDisc($userSec, $periodA)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT discountcode FROM cart WHERE id_user = %s AND id_event = %s",
										 GetSQLValueString($userSec, "int"),
										 GetSQLValueString($periodA, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["discountcode"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function getPorDiscount($porDiscount, $ticketDisc)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE code = %s AND id_ticket = %s",
									   GetSQLValueString($porDiscount, "text"),
									   GetSQLValueString($ticketDisc, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["percent"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function getMonDiscount($codDiscount, $ticketDescontado)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE code = %s AND id_ticket = %s",
									   GetSQLValueString($codDiscount, "text"),
									   GetSQLValueString($ticketDescontado, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["money"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function getHiddenTicket($showhidden, $ticketShow)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM discount WHERE code = %s AND id_ticket = %s AND show_hidden_tickets = 1",
									   GetSQLValueString($showhidden, "text"),
									   GetSQLValueString($ticketShow, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion > 0) 
		return true;
	else return false;	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function productosRestantes($idEve, $user, $idProd)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT * FROM cart WHERE id_event=%s AND id_user=%s AND id_product=%s AND transaction_made=%s AND discountcode IS NULL",
										GetSQLValueString($idEve, "int"),
										GetSQLValueString($user, "int"),
										GetSQLValueString($idProd, "int"),
										0);
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion==0) 
		return true;
	else return false;
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function billingMonth($orderN, $eventN)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT month FROM monthly_billing WHERE order_number = %s AND id_event = %s",
									   GetSQLValueString($orderN, "int"),
									   GetSQLValueString($eventN, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["month"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function totalIncome($orderNt, $eventNt)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT monthly_income FROM monthly_billing WHERE order_number = %s AND id_event = %s",
									   GetSQLValueString($orderNt, "int"),
									   GetSQLValueString($eventNt, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["monthly_income"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function FeesIncome($orderNf, $eventNf)
{
	global $con;
	
	$query_ConsultaFuncion = sprintf("SELECT fees FROM monthly_billing WHERE order_number = %s AND id_event = %s",
									   GetSQLValueString($orderNf, "int"),
									   GetSQLValueString($eventNf, "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion["fees"];	
	
	mysqli_free_result($ConsultaFuncion);
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function actInact($globalStatus)
{
	if ($globalStatus == 0) return "Inactive";
	if ($globalStatus == 1) return "Active";
}
?>