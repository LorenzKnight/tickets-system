<?php require_once('connections/conexion.php');?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$valorRespuesta = comprobarProductoSumar($_GET["ticketID"], $_GET["eventno"]);
if ($valorRespuesta != 0)
{
  $insertSQL = sprintf("UPDATE cart SET quantity = quantity + 1 WHERE id_counter=%s",
                          GetSQLValueString($valorRespuesta, "int"));

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
  
  
  $insertGoTo = $_SERVER['HTTP_REFERER'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));

}
else
{
  $insertSQL = sprintf("INSERT INTO cart(id_user, id_event, id_product, product_type, quantity, date) 
                        VALUES (%s, %s, %s, %s, %s, NOW())",
                        GetSQLValueString($_SESSION['tks_UserId'], "int"),
                        GetSQLValueString($_GET["eventno"], "int"),
                        GetSQLValueString($_GET["ticketID"], "int"),
                        GetSQLValueString(singleCouple($_GET["ticketID"]), "int"),
                        1);


  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = $_SERVER['HTTP_REFERER'];
  if (isset($_SERVER['QUERY_STRING'])) {
  $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
  $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));

}
?>