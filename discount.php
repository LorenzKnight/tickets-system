<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 7;?>
<?php
 $query_DatosDiscount = sprintf("SELECT * FROM adm_discount_list WHERE id_event = %s ORDER BY id_adm_disc",
                                  GetSQLValueString($_GET['eventno'], "int")); 
 $DatosDiscount = mysqli_query($con, $query_DatosDiscount) or die(mysqli_error($con));
 $row_DatosDiscount = mysqli_fetch_assoc($DatosDiscount);
 $totalRows_DatosDiscount = mysqli_num_rows($DatosDiscount);
?>
<?php
 $query_DatosTickets = sprintf("SELECT * FROM tickets WHERE id_event=%s ORDER BY id_ticket DESC", 
                                GetSQLValueString($_GET['eventno'], "int")); 
 $DatosTickets = mysqli_query($con, $query_DatosTickets) or die(mysqli_error($con));
 $row_DatosTickets = mysqli_fetch_assoc($DatosTickets);
 $totalRows_DatosTickets = mysqli_num_rows($DatosTickets);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//$password=md5($_POST["password"]);
    
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formdiscount")) {

    if (comprobarcodeunico($_POST["code"], $_POST["id_event"])) {

      $insertSQL = sprintf("INSERT INTO adm_discount_list(id_event, code, percent, money, show_hidden_tickets, quanti, start_date, stop_date) 
                            VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($_POST["id_event"], "int"),
            GetSQLValueString($_POST["code"], "text"),
            GetSQLValueString($_POST["percent"], "int"),
            GetSQLValueString($_POST["money"], "int"),
            GetSQLValueString($_POST["show_hidden_tickets"], "int"),
            GetSQLValueString($_POST["quanti"], "int"),
            GetSQLValueString($_POST['start_date'], "text"),
            GetSQLValueString($_POST["stop_date"], "text"));


      $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

        if($_POST['id_ticket'] != "") {

                if(is_array($_POST['id_ticket'])) {

                    // realizamos el ciclo de los checkbox selccionados
                    while(list($key,$value) = each($_POST['id_ticket'])) {

                        $insertSQL = sprintf("INSERT INTO discount(id_code, code, id_ticket, percent, money, show_hidden_tickets, quanti, start_date, stop_date) 
                                                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                                                GetSQLValueString(discID($_POST["code"]), "int"),
                                                GetSQLValueString($_POST["code"], "text"),                   
                                                GetSQLValueString($value, "int"),
                                                GetSQLValueString(discPerc($_POST["code"]), "int"), 
                                                GetSQLValueString(discMoney($_POST["code"]), "int"),
                                                GetSQLValueString(shtickets($_POST["code"]), "int"),
                                                GetSQLValueString(discQuan($_POST["code"]), "int"), 
                                                GetSQLValueString(discStartd($_POST["code"]), "text"), 
                                                GetSQLValueString(discStopd($_POST["code"]), "text"));

                        $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

                        $insertGoTo = $_SERVER['HTTP_REFERER'];
                        //$insertGoTo = "discountcodes.php";
                        if (isset($_SERVER['QUERY_STRING'])) {
                            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                            $insertGoTo .= $_SERVER['QUERY_STRING'];
                        }
                        header(sprintf("Location: %s", $insertGoTo));
                    }
                }
        } else {

            $insertGoTo = $_SERVER['HTTP_REFERER'];
            //$insertGoTo = "discount.php";
            if (isset($_SERVER['QUERY_STRING'])) {
                $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                $insertGoTo .= $_SERVER['QUERY_STRING'];
            }
            header(sprintf("Location: %s", $insertGoTo));
    
        }
    
    } else {

        //$existeD = "?existe=1";
        $insertGoTo = "discount.php";
        if (isset($_SERVER['QUERY_STRING'])) {
            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
            $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));

    }
}      
?>
<?php
 $query_DatosDiscountEdit = sprintf("SELECT * FROM adm_discount_list WHERE id_adm_disc=%s ORDER BY id_adm_disc DESC", 
                                      GetSQLValueString($_GET['editDiscount'], "int")); 
 $DatosDiscountEdit = mysqli_query($con, $query_DatosDiscountEdit) or die(mysqli_error($con));
 $row_DatosDiscountEdit = mysqli_fetch_assoc($DatosDiscountEdit);
 $totalRows_DatosDiscountEdit = mysqli_num_rows($DatosDiscountEdit);
?>
<?php
 $query_DatosTicketsEdit = sprintf("SELECT * FROM tickets WHERE id_event=%s ORDER BY id_ticket DESC", 
                                GetSQLValueString($_GET['eventno'], "int")); 
 $DatosTicketsEdit = mysqli_query($con, $query_DatosTicketsEdit) or die(mysqli_error($con));
 $row_DatosTicketsEdit = mysqli_fetch_assoc($DatosTicketsEdit);
 $totalRows_DatosTicketsEdit = mysqli_num_rows($DatosTicketsEdit);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
} 
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formcodeedit")) {

        $updateSQL = sprintf("UPDATE adm_discount_list SET code=%s, percent=%s, money=%s, show_hidden_tickets=%s, quanti=%s, start_date=%s, stop_date=%s, user_edit=%s, date_edit=NOW() WHERE id_adm_disc=%s",
                              GetSQLValueString($_POST["code"], "text"),
                              GetSQLValueString($_POST["percent"], "int"),
                              GetSQLValueString($_POST["money"], "int"),
                              GetSQLValueString($_POST["show_hidden_tickets"], "int"),
                              GetSQLValueString($_POST["quanti"], "int"),
                              GetSQLValueString($_POST["start_date"], "text"),
                              GetSQLValueString($_POST["stop_date"], "text"),
                              GetSQLValueString($_SESSION['tks_UserId'], "int"),
                              GetSQLValueString($_POST["id_adm_disc"], "int"));
          

        $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));


        $query_Delete = sprintf("DELETE FROM discount WHERE id_code=%s", GetSQLValueString($_POST["id_adm_disc"], "int"));
        echo $query_Delete;
        $Result2 = mysqli_query($con, $query_Delete) or die(mysqli_error($con));


        if($_POST['id_ticket'] != "") {

                if(is_array($_POST['id_ticket'])) {

                    // realizamos el ciclo de los checkbox selccionados
                    while(list($key,$value) = each($_POST['id_ticket'])) {

                      $insertSQL = sprintf("INSERT INTO discount(id_code, code, id_ticket, percent, money, show_hidden_tickets, quanti, start_date, stop_date) 
                                              VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                                              GetSQLValueString(discID($_POST["code"]), "int"),
                                              GetSQLValueString($_POST["code"], "text"),                   
                                              GetSQLValueString($value, "text"),
                                              GetSQLValueString(discPerc($_POST["code"]), "int"), 
                                              GetSQLValueString(discMoney($_POST["code"]), "int"),
                                              GetSQLValueString(shtickets($_POST["code"]), "int"),
                                              GetSQLValueString(discQuan($_POST["code"]), "int"), 
                                              GetSQLValueString(discStartd($_POST["code"]), "text"), 
                                              GetSQLValueString(discStopd($_POST["code"]), "text"));

                        $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

                        
                        $insertGoTo = "edit_done.php?code=1";
                        // $insertGoTo = $_SERVER['HTTP_REFERER'];
                        if (isset($_SERVER['QUERY_STRING'])) {
                            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                            $insertGoTo .= $_SERVER['QUERY_STRING'];
                        }
                        header(sprintf("Location: %s", $insertGoTo));

                    }
                }
        } else {
            $insertGoTo = $_SERVER['HTTP_REFERER'];
            //$insertGoTo = "discount.php";
            if (isset($_SERVER['QUERY_STRING'])) {
                $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                $insertGoTo .= $_SERVER['QUERY_STRING'];
            }
            header(sprintf("Location: %s", $insertGoTo));
        }  
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
<script type="text/javascript" src="simple_calendar/tcal.js"></script>
<script>
    function asegurar_borrado()
    {
            rc = confirm("Är du säkert på den här ändring?");
            return rc;
    }
</script>
<script>
    function upgrade() {
    event.stopPropagation()
    document.getElementById("popup-upgrade").style.display="block";
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
<?php include("inc/wrapper_discount.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>