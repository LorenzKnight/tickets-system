<?php require_once('connections/conexion.php');?>
<?php
$query_Delete = sprintf("DELETE FROM tickets WHERE id_ticket=%s", GetSQLValueString($_GET["ticketID"], "int"));
echo $query_Delete;
$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

  $insertGoTo = $_SERVER['HTTP_REFERER'];
  header(sprintf("Location: %s", $insertGoTo));
  mysqli_free_result($Result1);
?>