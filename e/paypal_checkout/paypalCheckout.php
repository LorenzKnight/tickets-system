<?php require_once('../connections/conexion.php');?>
<?php
	$query_DatosPurchase = sprintf("SELECT * FROM purchase WHERE id_user=%s ORDER BY id_purchase DESC",
			GetSQLValueString($_GET['eventno'], "int"));
	$DatosPurchase = mysqli_query($con, $query_DatosPurchase) or die(mysqli_error($con));
	$row_DatosPurchase = mysqli_fetch_assoc($DatosPurchase);
	$totalRows_DatosPurchase = mysqli_num_rows($DatosPurchase);
?>
<div id="paypal-button-container"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  env: '<?php echo PayPalENV; ?>',
  client: {
	<?php if(ProPayPal) { ?>  
	production: '<?php echo PayPalClientId; ?>'
	<?php } else { ?>
	sandbox: '<?php echo PayPalClientId; ?>'
	<?php } ?>	
  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total: '<?php echo $productPrice; ?>',
		  currency: '<?php echo $currency; ?>'
		}
	  }]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {
		// window.location = "/paypal-php-integracion-con-ejemplo-completo/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
		window.location = "events.php?eventno=<?php echo $row_DatosPurchase["id_event"]; ?>&control=<?php echo $row_DatosPurchase["id_purchase"]; ?>&paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
	  });
  }
}, '#paypal-button');
</script>