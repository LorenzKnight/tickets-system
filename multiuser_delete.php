<?php require_once('connections/conexion.php');?>
<?php
  $query_Delete = sprintf("DELETE FROM users WHERE id_user=%s", GetSQLValueString($_GET["multiUserID"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

  $query_Delete = sprintf("DELETE FROM multi_user_access WHERE id_user=%s", GetSQLValueString($_GET["multiUserID"], "int"));
  echo $query_Delete;
  $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());


    $insertGoTo = "multiuser.php";
    header(sprintf("Location: %s", $insertGoTo));
    mysqli_free_result($Result1);
?>