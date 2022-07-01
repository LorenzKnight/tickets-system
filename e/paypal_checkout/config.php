<?php
define('ProPayPal', 0);
if(ProPayPal){
	define("PayPalClientId",  $row_DatosEvent['paypal_client_id']);
	define("PayPalSecret", $row_DatosEvent['paypal_secret']);
	define("PayPalBaseUrl", "https://api.paypal.com/v1/");
	define("PayPalENV", "production");
} else {
	// define("PayPalClientId",  $row_DatosEvent['paypal_client_id']);
	// define("PayPalSecret", $row_DatosEvent['paypal_secret']);
	define("PayPalClientId", "AegApAEtV4jx_nN3p_mfYzTfSInPBUBDx_uXHfpSIHegM0Ja5YEMz_mj9E_NFNFUsvlA1jP3YT8WNkUV");
	define("PayPalSecret", "ECPORdKrGylq6zniydC1Qbnd_q_RhxPOiI19GhgRXjklyG6I_tcE9_DiXOOsZDVOW6tuctmKDZ9DrG1t");
	define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
	define("PayPalENV", "sandbox");
}
?>
<?php //echo $row_DatosEvent['paypal_client_id']; ?>