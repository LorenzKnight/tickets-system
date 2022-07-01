<!-- CONECCION DENTRO DE UNA FUNCION -->
<?php
function getConnexion()
{
  $mysqli = new Mysqli('p:localhost', 'root', 'root', 'ticketsys');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}
?>