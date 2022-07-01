<?php require_once('connections/conexion.php');?>
<?php
  $query_Delete = sprintf("DELETE FROM adm_discount_list WHERE id_adm_disc=%s", GetSQLValueString($_GET["id"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


  $query_Delete = sprintf("DELETE FROM discount WHERE id_code=%s", GetSQLValueString($_GET["id"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


  $insertGoTo = $_SERVER['HTTP_REFERER'];
  header(sprintf("Location: %s", $insertGoTo));
  mysqli_free_result($Result1);
?>