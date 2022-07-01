<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>

<?php $menuactive= 3;?>
<?php
 $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s", 
                                GetSQLValueString($_GET['eventno'], "int")); 
 $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
 $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
 $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);

 $identificador = $row_DatosEvent['id_event'];
?>
<?php
  $query_DatosEventGlobal = sprintf("SELECT * FROM events WHERE id_event=%s", GetSQLValueString($_GET['eventno'], "int")); 
  $DatosEventGlobal = mysqli_query($con, $query_DatosEventGlobal) or die(mysqli_error($con));
  $row_DatosEventGlobal = mysqli_fetch_assoc($DatosEventGlobal);
  $totalRows_DatosEventGlobal = mysqli_num_rows($DatosEventGlobal);

  $currency = ObtenerCurrency($row_DatosEventGlobal['currency']);
?>
<?php
 $query_DatosTickets = sprintf("SELECT * FROM tickets WHERE id_event=%s", 
                                GetSQLValueString($_GET['eventno'], "int")); 
 $DatosTickets = mysqli_query($con, $query_DatosTickets) or die(mysqli_error($con));
 $row_DatosTickets = mysqli_fetch_assoc($DatosTickets);
 $totalRows_DatosTickets = mysqli_num_rows($DatosTickets);
?>
<?php
 $query_DatosUltimoTicket = sprintf("SELECT * FROM tickets WHERE id_user=%s ORDER BY id_ticket DESC" , GetSQLValueString($_SESSION['tks_UserId'], "int")); 
 $DatosUltimoTicket = mysqli_query($con, $query_DatosUltimoTicket) or die(mysqli_error($con));
 $row_DatosUltimoTicket = mysqli_fetch_assoc($DatosUltimoTicket);
 $totalRows_DatosUltimoTicket = mysqli_num_rows($DatosUltimoTicket);
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formtickets")) {

  $startdatetime = $_POST["start_date"].' '.$_POST["start_time"];
  $enddatetime = $_POST["sales_end"].' '.$_POST["end_time"];

  $insertSQL = sprintf("INSERT INTO tickets(id_event, id_user, date, type, single_couple, ticket_name, stock, price, start_date, start_time, start_datetime, sales_end, end_time, end_datetime, description, visibility, sales_type, status) 
                        VALUES (%s, %s, NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($_POST["id_event"], "int"),                      
                        GetSQLValueString($_POST["id_user"], "int"),
                        GetSQLValueString($_POST["type"], "int"),
                        GetSQLValueString($_POST["single_couple"], "int"),
                        GetSQLValueString($_POST["ticket_name"], "text"),
                        GetSQLValueString($_POST["stock"], "int"),
                        GetSQLValueString($_POST["price"], "text"),
                        GetSQLValueString($_POST["start_date"], "text"),
                        GetSQLValueString($_POST["start_time"], "text"),
                        GetSQLValueString($startdatetime, "text"),
                        GetSQLValueString($_POST["sales_end"], "text"),
                        GetSQLValueString($_POST["end_time"], "text"),
                        GetSQLValueString($enddatetime, "text"),
                        GetSQLValueString($_POST["description"], "text"),
                        GetSQLValueString($_POST["visibility"], "int"),
                        GetSQLValueString($_POST["sales_type"], "int"),
                        GetSQLValueString($_POST["status"], "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
  
  $insertGoTo ="edit_done.php?created=1";
  // $insertGoTo = $_SERVER['HTTP_REFERER'];
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

    $startdatetime = $_POST["start_date"].' '.$_POST["start_time"];
    $enddatetime = $_POST["sales_end"].' '.$_POST["end_time"];
     
    $updateSQL = sprintf("UPDATE tickets SET user_edit=%s, date_edit=NOW(), type=%s, single_couple=%s, ticket_name=%s, stock=%s, price=%s, start_date=%s, start_time=%s, start_datetime=%s, sales_end=%s, end_time=%s, end_datetime=%s, description=%s, visibility=%s, sales_type=%s WHERE id_ticket=%s",
                          GetSQLValueString($_SESSION['tks_UserId'], "int"),
                          GetSQLValueString($_POST["type"], "int"),
                          GetSQLValueString($_POST["single_couple"], "int"),
                          GetSQLValueString($_POST["ticket_name"], "text"),
                          GetSQLValueString($_POST["stock"], "int"),
                          GetSQLValueString($_POST["price"], "text"),
                          GetSQLValueString($_POST["start_date"], "text"),
                          GetSQLValueString($_POST["start_time"], "text"),
                          GetSQLValueString($startdatetime, "text"),
                          GetSQLValueString($_POST["sales_end"], "text"),
                          GetSQLValueString($_POST["end_time"], "text"),
                          GetSQLValueString($enddatetime, "text"),
                          GetSQLValueString($_POST["description"], "text"),
                          GetSQLValueString($_POST["visibility"], "int"),
                          GetSQLValueString($_POST["sales_type"], "int"),
                          GetSQLValueString($_POST["id_ticket"], "int"));
		

$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

$updateGoTo = "edit_done.php?ticket=1";
if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>

<?php if($_GET['prenumeration']) : ?>
  <?php
      PrenumerationUpdate(2, ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId']), $_GET['prenumeration']);

      // $evento = $_GET['prenumeration'];
      // $updateGoTo = "tickets.php?eventno=$evento";
      $updateGoTo = $_SERVER['HTTP_REFERER'];
      header(sprintf("Location: %s", $updateGoTo));
  ?>
<?php endif ?>

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
    function upgrade() {
    event.stopPropagation()
    document.getElementById("popup-upgrade").style.display="block";
    }
</script>

<?php if (MasDeUnticket($_GET["eventno"]) && ($row_DatosEvent["prenumeration"] == 0)) { ?>
  <script>
      function abrir() {
        document.getElementById("popup1").style.display="block";
      }
  </script>
<?php } else { ?>
  <script>
      if (screen.width >= 280 && screen.width < 375)
        function abrir() {
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "100%",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula1").style.display="block";
        }
      else if (screen.width >= 375 && screen.width < 768)
        function abrir() {
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "100%",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula1").style.display="block";
        }
      else if (screen.width >= 768 && screen.width < 1024)
        function abrir() {
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "400px",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula1").style.display="block";
        }
      else if (screen.width >= 1024)
        function abrir() {
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "400px",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula1").style.display="block";
        }
  </script>
<?php } ?>
<script>
    function enviarcrear() {
      var tform = document.getElementById('ticketsform');

      var stylestform = {
        "width": "0px",
        "transition": "ease-out 0.2s"
      };

      Object.assign(tform.style, stylestform);
      document.getElementById("capsula1").style.display="none";

      setTimeout(crear, 500);
      function crear() {
        form = document.getElementById('formtickets');
        form.submit();
      }
    }

    function cerrar() {
      var tform = document.getElementById('ticketsform');

      var stylestform = {
			  "width": "0px",
        "transition": "ease-out 0.2s"
		  };

      Object.assign(tform.style, stylestform);
      document.getElementById("capsula1").style.display="none";
      
      setTimeout(volveraevento, 500);
      function volveraevento() {
        location.href="tickets.php?eventno=<?php echo $identificador;?>";
      }
    }

    function cerraredit() {
      var tform = document.getElementById('ticketsform');

      var stylestform = {
			  "width": "0px",
        "transition": "ease-out 0.2s"
		  };

      Object.assign(tform.style, stylestform);
      document.getElementById("capsula2").style.display="none";

      setTimeout(volveraevento, 500);
      function volveraevento() {
        location.href="tickets.php?eventno=<?php echo $identificador;?>";
      }
    }

    function enviaredit() {
      var tform = document.getElementById('ticketsform');

      var stylestform = {
			  "width": "0px",
        "transition": "ease-out 0.2s"
		  };

      Object.assign(tform.style, stylestform);
      document.getElementById("capsula2").style.display="none";

      setTimeout(mandar, 500);
      function mandar() {
        form = document.getElementById('formediti');
        form.submit();
      }
    }
</script>

<?php if($_GET['editTicket'] != "") { ?>
  <script>
      if (screen.width >= 280 && screen.width < 375) {
        document.addEventListener("DOMContentLoaded", function(){
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "100%",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula2").style.display="block";
        });
      } else if (screen.width >= 375 && screen.width < 768) {
        document.addEventListener("DOMContentLoaded", function(){
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "100%",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula2").style.display="block";
        });
      } else if (screen.width >= 768 && screen.width < 1024) {
        document.addEventListener("DOMContentLoaded", function(){
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "400px",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula2").style.display="block";
        });
      } else if (screen.width >= 1024) {
        document.addEventListener("DOMContentLoaded", function(){
          var tform = document.getElementById('ticketsform');

          var stylestform = {
            "width": "400px",
            "transition": "ease-out 0.2s"
          };

          Object.assign(tform.style, stylestform);
          document.getElementById("capsula2").style.display="block";
        });
      }
  </script>
<?php } ?>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_tickets.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>