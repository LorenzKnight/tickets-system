<?php require_once('connections/conexion.php');?>
<?php
    $query_DatosCheckin = sprintf("SELECT * FROM cart WHERE transaction_made=%s",
    GetSQLValueString($_GET["purchaseID"], "int")); 
    $DatosCheckin = mysqli_query($con, $query_DatosCheckin) or die(mysqli_error($con));
    $row_DatosCheckin = mysqli_fetch_assoc($DatosCheckin);
    $totalRows_DatosCheckin = mysqli_num_rows($DatosCheckin);
     
if (comprobarcheckinDone($_GET["purchaseID"], $row_DatosCheckin["checkin"])) {

        $time=time()+7200; //2 hours
        date("H:i:s",$time);
    $hora = date("H:i",$time);
    $updateSQL = sprintf("UPDATE cart SET checkin = checkin + 1, checkin_date=NOW(), checkin_time=%s WHERE transaction_made=%s",
                        GetSQLValueString($hora, "text"),
                        GetSQLValueString($_GET["purchaseID"], "int"));
		

    $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

    $eventoNo = $row_DatosCheckin['id_event'];
    $updateGoTo = "attendee.php?eventno=$eventoNo&scan=1";
    // $insertGoTo = $_SERVER['HTTP_REFERER'];
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
 } else {
     $eventoNo = $row_DatosCheckin['id_event'];
    $updateGoTo = "attendee.php?eventno=$eventoNo&scan=2";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
  }
?>