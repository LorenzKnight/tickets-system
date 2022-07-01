
<?php require_once('connections/conexion.php');?>
<?php    
    $updateSQL = sprintf("UPDATE events SET status=%s WHERE id_event=%s",
                        GetSQLValueString(1, "int"),
                        GetSQLValueString($_GET["postpone"], "int"));
            

    $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

    $updateGoTo = "manage.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
    
?>