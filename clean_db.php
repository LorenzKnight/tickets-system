<?php require_once('connections/conexion.php');?>
<?php if($_GET["close"]):?>
<?php
	$query_Delete = sprintf("DELETE FROM cart WHERE id_user=%s AND transaction_made=%s", 
							GetSQLValueString($_SESSION['tks_UserId'], "int"),
                            0);
	    echo $query_Delete;
	$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

	$evento = $_GET["close"];
	$insertGoTo = "attendee.php?eventno=$evento";
	header(sprintf("Location: %s", $insertGoTo));
	mysqli_free_result($Result1);
?>
<?php endif ?>

