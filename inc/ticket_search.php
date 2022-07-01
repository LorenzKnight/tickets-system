<?php 
  if(!isset($_POST['ticketsearch'])) exit('The value to search was not received');

  require_once '../connections/conexion_ticket_search.php';
  require_once '../connections/conexion.php';


  function search()
  {
    $mysqli = getConnexion();
    $search = $mysqli->real_escape_string(ConvertiraOrderNo($_POST['ticketsearch']));
    $query = "SELECT * FROM cart WHERE transaction_made LIKE '%$search%' ";
    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) { ?>

      <div style="height:230px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr height="35">
            <td colspan="2" nowrap="nowrap" align="center">
              <?php echo ObtenerEventName($row['id_event']); ?>
            </td>
          </td>
          <tr height="35">
            <td colspan="2" nowrap="nowrap" align="center">
              Ticket # <?php echo ObtenerOrderNo($row['transaction_made']); ?>
            </td>
          </td>
          <tr height="35">
            <td colspan="2" nowrap="nowrap" align="center">
              <?php echo ObtenerNombreGuest($row['id_user']); ?> <?php echo ObtenerApellidoGuest($row['id_user']); ?>
            </td>
          </td>
          <tr height="35">
            <td colspan="2" nowrap="nowrap" align="center">
              <?php echo ticket_name($row['id_product']); ?>
            </td>
          </td>
          <tr height="35">
            <td colspan="2" nowrap="nowrap" align="center">
              <?php echo ObtenerNombrePGuest($row['id_user']); ?> <?php echo ObtenerApellidoPGuest($row['id_user']); ?>
            </td>
          </td>
        </table>
      </div>

    <?php }
  }
  search();
?>