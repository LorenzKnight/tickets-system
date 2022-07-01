<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 4;?>
<?php
  // $query_DatosGuests = sprintf("SELECT * FROM cart WHERE id_event=%s AND checkin > 0",
  //                                 GetSQLValueString($_GET['eventno'], "int")); 
  // $DatosGuests = mysqli_query($con, $query_DatosGuests) or die(mysqli_error($con));
  // $row_DatosGuests = mysqli_fetch_assoc($DatosGuests);
  // $totalRows_DatosGuests = mysqli_num_rows($DatosGuests);
?>
<?php
  $procent = ObtenerFEES();
?>
<?php
if ((isset($_GET["MM_search"])) && ($_GET["MM_search"]=="formsearch"))
{   

  $query_DatosPurchase = sprintf("SELECT * FROM purchase WHERE order_number LIKE %s OR name LIKE %s OR surname LIKE %s OR p_name LIKE %s OR p_surname LIKE %s OR email LIKE %s OR p_email LIKE %s AND id_event=%s ORDER BY id_purchase ASC",
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString("%".$_GET["search"]."%", "text"),
                          GetSQLValueString($_GET['eventno'], "int"));
}
else
{
  $query_DatosPurchase = sprintf("SELECT * FROM purchase WHERE id_event=%s ORDER BY id_purchase DESC", 
                                  GetSQLValueString($_GET['eventno'], "int")); 
}
  $DatosPurchase = mysqli_query($con, $query_DatosPurchase) or die(mysqli_error($con));
  $row_DatosPurchase = mysqli_fetch_assoc($DatosPurchase);
  $totalRows_DatosPurchase = mysqli_num_rows($DatosPurchase);
?>
<?php
	$query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
	$DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
	$row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
	$totalRows_DatosEvent = mysqli_num_rows($DatosEvent);

  $identificador = $row_DatosEvent['id_event'];
?>
<?php
	$query_DatosTickets = sprintf("SELECT * FROM tickets WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
	$DatosTickets = mysqli_query($con, $query_DatosTickets) or die(mysqli_error($con));
	$row_DatosTickets = mysqli_fetch_assoc($DatosTickets);
	$totalRows_DatosTickets = mysqli_num_rows($DatosTickets);
?>
<?php
	$query_DatosCart = sprintf("SELECT * FROM cart WHERE id_event=%s AND id_user=%s AND transaction_made=%s", 
						GetSQLValueString($_GET['eventno'], "int"),
						GetSQLValueString($_SESSION['tks_UserId'], "int"),
						0); 
	$DatosCart = mysqli_query($con, $query_DatosCart) or die(mysqli_error($con));
	$row_DatosCart = mysqli_fetch_assoc($DatosCart);
	$totalRows_DatosCart = mysqli_num_rows($DatosCart);
?>
<?php
	$query_DatosCountry = sprintf("SELECT * FROM countries ORDER BY country_name ASC"); 
	$DatosCountry = mysqli_query($con, $query_DatosCountry) or die(mysqli_error($con));
	$row_DatosCountry = mysqli_fetch_assoc($DatosCountry);
	$totalRows_DatosCountry = mysqli_num_rows($DatosCountry);
?>

<?php
	$query_DatosEventBack = sprintf("SELECT * FROM purchase WHERE id_user=%s ORDER BY id_purchase DESC", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
	$DatosEventBack = mysqli_query($con, $query_DatosEventBack) or die(mysqli_error($con));
	$row_DatosEventBack = mysqli_fetch_assoc($DatosEventBack);
	$totalRows_DatosEventBack = mysqli_num_rows($DatosEventBack);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formcheckout")) {
      $year = date('Y');
      $month = date('m');
      $day = date('d');

     $insertSQL = sprintf("INSERT INTO purchase (date, year, month, day, time, order_number, qr_bar_code, id_user, id_event, name, surname, email, adress1, adress2, city, post, country, sex, p_name, p_surname, p_email, total, done, status)
                          VALUES (NOW(), %s, %s, %s, NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 1, %s)",
                          GetSQLValueString($year, "text"),
                          GetSQLValueString($month, "text"),
                          GetSQLValueString($day, "text"),
                          GetSQLValueString($_POST["order_number"], "int"),
                          GetSQLValueString($_POST["qr_bar_code"], "text"),
                          GetSQLValueString($_SESSION['tks_UserId'], "int"),
                          GetSQLValueString($_POST["id_event"], "int"),
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
                          GetSQLValueString($_POST["status"], "int"));
		

$Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));

$ultimacompra = mysqli_insert_id($con);
ActualizacionCarrito2($ultimacompra);

$evento = $row_DatosEventBack['id_event'];
$insertGoTo = "attendee.php?eventno=$evento&done=1";
//$updateGoTo = "attendee.php";
if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php
	$query_DatosQR = sprintf("SELECT * FROM purchase WHERE id_user=%s ORDER BY id_purchase DESC", 
									          GetSQLValueString($_SESSION['tks_UserId'], "int")); 
	$DatosQR = mysqli_query($con, $query_DatosQR) or die(mysqli_error($con));
	$row_DatosQR = mysqli_fetch_assoc($DatosQR);
	$totalRows_DatosQR = mysqli_num_rows($DatosQR);
?>
<?php
 $query_DatosPurchaseMail = sprintf("SELECT * FROM purchase WHERE id_user=%s ORDER BY id_purchase DESC", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
 $DatosPurchaseMail = mysqli_query($con, $query_DatosPurchaseMail) or die(mysqli_error($con));
 $row_DatosPurchaseMail = mysqli_fetch_assoc($DatosPurchaseMail);
 $totalRows_DatosPurchaseMail = mysqli_num_rows($DatosPurchaseMail);
?>

<?php
  $query_DatosEditPurchase = sprintf("SELECT * FROM purchase WHERE id_purchase=%s ORDER BY id_purchase ASC", 
                              GetSQLValueString($_GET['idPurchase'], "int")); 
  $DatosEditPurchase = mysqli_query($con, $query_DatosEditPurchase) or die(mysqli_error($con));
  $row_DatosEditPurchase = mysqli_fetch_assoc($DatosEditPurchase);
  $totalRows_DatosEditPurchase = mysqli_num_rows($DatosEditPurchase);
?>
<?php
  $editFormAction = $_SERVER['PHP_SELF'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  }
  if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formediti")) {
      
      $updateSQL = sprintf("UPDATE purchase SET user_edit=%s, date_edit=NOW(), name=%s, surname=%s, email=%s, adress1=%s, adress2=%s, city=%s, post=%s, country=%s, p_name=%s, p_surname=%s, p_email=%s  WHERE id_purchase=%s",
                            GetSQLValueString($_SESSION['tks_UserId'], "int"),
                            GetSQLValueString($_POST["name"], "text"),
                            GetSQLValueString($_POST["surname"], "text"),
                            GetSQLValueString($_POST["email"], "text"),
                            GetSQLValueString($_POST["adress1"], "text"),
                            GetSQLValueString($_POST["adress2"], "text"),
                            GetSQLValueString($_POST["city"], "text"),
                            GetSQLValueString($_POST["post"], "text"),
                            GetSQLValueString($_POST["country"], "int"),
                            GetSQLValueString($_POST["p_name"], "text"),
                            GetSQLValueString($_POST["p_surname"], "text"),
                            GetSQLValueString($_POST["p_email"], "text"),
                            GetSQLValueString($_POST["id_purchase"], "int"));
      

  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  
  $updateGoTo = "edit_done.php?purchaseEdited=1";
  // $updateGoTo = $_SERVER['HTTP_REFERER'];
  if (isset($_SERVER['QUERY_STRING'])) {
      $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
      $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
  }
?>
<html>
<head>
<meta charset="utf8mb4_unicode_ci">
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

    function asegurar_reenviado()
    {
            rc = confirm("Är du säkert på att du vill skicka mail till den här person?");
            return rc;
    }
</script>
<script>
    // function mostrar() {
    // event.stopPropagation()
    // document.getElementById("popup1").style.display="block";
    // }
    // function ocurtar() {
    // event.stopPropagation()
    // document.getElementById("popup1").style.display="none";
    // }
</script>
<script>
  function cerraredit() {
    var tform = document.getElementById('editpurchase');

    var stylestform = {
      "width": "0px",
      "transition": "ease-out 0.2s"
    };

    Object.assign(tform.style, stylestform);
    document.getElementById("capsula1").style.display="none";
    
    setTimeout(volveraevento, 500);
    function volveraevento() {
      location.href="attendee.php?eventno=<?php echo $identificador;?>";
    }
  }

  function enviaredit() {
      var tform = document.getElementById('editpurchase');

      var stylestform = {
			  "width": "0px",
        "transition": "ease-out 0.2s"
		  };

      Object.assign(tform.style, stylestform);
      document.getElementById("capsula1").style.display="none";

      setTimeout(mandar, 500);
      function mandar() {
        form = document.getElementById('formediti');
        form.submit();
      }
    }
</script>
<?php if($_GET['idPurchase'] != "") { ?>
  <script>
    if (screen.width >= 280 && screen.width < 375) {
      document.addEventListener("DOMContentLoaded", function(){
        var tform = document.getElementById('editpurchase');

        var stylestform = {
          "width": "100%",
          "transition": "ease-out 0.2s"
        };

        Object.assign(tform.style, stylestform);
        document.getElementById("capsula1").style.display="block";
      });
    } else if (screen.width >= 375 && screen.width < 768) {
      document.addEventListener("DOMContentLoaded", function(){
        var tform = document.getElementById('editpurchase');

        var stylestform = {
          "width": "100%",
          "transition": "ease-out 0.2s"
        };

        Object.assign(tform.style, stylestform);
        document.getElementById("capsula1").style.display="block";
      });
    } else if (screen.width >= 768 && screen.width < 1024) {
      document.addEventListener("DOMContentLoaded", function(){
        var tform = document.getElementById('editpurchase');

        var stylestform = {
          "width": "400px",
          "transition": "ease-out 0.2s"
        };

        Object.assign(tform.style, stylestform);
        document.getElementById("capsula1").style.display="block";
      });
    } else if (screen.width >= 1024) {
      document.addEventListener("DOMContentLoaded", function(){
        var tform = document.getElementById('editpurchase');

        var stylestform = {
          "width": "400px",
          "transition": "ease-out 0.2s"
        };

        Object.assign(tform.style, stylestform);
        document.getElementById("capsula1").style.display="block";
      });
    }
  </script>
<?php } ?>
<script>
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_attendee.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>