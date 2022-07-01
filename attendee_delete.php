<?php require_once('connections/conexion.php');?>
<?php
  $query_Delete = sprintf("DELETE FROM purchase WHERE id_purchase=%s", GetSQLValueString($_GET["purchaseID"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


  $query_Delete = sprintf("DELETE FROM cart WHERE transaction_made=%s", GetSQLValueString($_GET["purchaseID"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

  
    $insertGoTo = $_SERVER['HTTP_REFERER'];
    header(sprintf("Location: %s", $insertGoTo));
    mysqli_free_result($Result1);
?>