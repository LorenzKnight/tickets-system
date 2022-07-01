<?php require_once('../connections/conexion.php');?>
<?php
  $query_Delete = sprintf("DELETE FROM cart WHERE id_user=%s AND id_event=%s AND id_product=%s AND transaction_made=%s",
                            GetSQLValueString($_SESSION['tsys_UserId'], "int"),
                            GetSQLValueString($_GET["eventno"], "int"),
                            GetSQLValueString($_GET["ticketID"], "int"),
                            0);
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

  $insertGoTo = $_SERVER['HTTP_REFERER'];
  header(sprintf("Location: %s", $insertGoTo));
  mysqli_free_result($Result1);
?>