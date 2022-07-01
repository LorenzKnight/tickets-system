<style>
    .dash_content {
        /* background-color: red; */
        height: 100px;
        display: flex;
    }
    .dash_info {
        /* background-color: blue; */
        flex: 1;
        height: 80px;
        padding: 10px;
    }
</style>
<?php
	$dateNow = date("Y-m-d");

	$fecha2=time()+3600; //1 hours
    $timeNow = date("H:i:s",$fecha2);
?>
<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="tickets_div" style="margin-bottom:50px;">
            <h1 style="margin-left:10px;">Event Dashboard</h1>
            
            <div class="dash_content">
                <div class="dash_info">
                    <p style="margin:0;">Tyckets typs</p>
                    <h1 style="text-align:center; margin-top:5px;"><?php echo $totalRows_Datostickets; ?></h1>
                </div>
                <div class="dash_info" style="border-left:1px solid #CCC;">
                    <p style="margin:0;">Tyckets sold</p>
                    <h1 style="text-align:center; margin-top:5px;"><?php //echo $totalRows_DatosticketsSold; ?> <?php echo ObtenerTicketsVendido($row_DatosEvent['id_event']); ?></h1>
                </div>
                <div class="dash_info" style="border-left:1px solid #CCC;">
                    <p style="margin:0;">Net sales</p>
                    <h1 style="text-align:center; margin-top:5px;"><?php echo ObtenerCurrency($row_DatosEvent['currency']); ?> <?php echo ObtenerGross($row_DatosEvent['id_event']); ?></h1>
                </div>
            </div>
            
            <h1 style="margin-left:10px;">Sales by Ticket Type</h1>

            <table width="100%" cellspacing="0" class="table_user" style="background-color: #F0F0F0; margin: 20px auto 0; ">
                <tr height="40" style="color: #999;">
                    <td width="42.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">Ticket Type</td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;">Price</td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;">Sold</td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;">Status</td>
                    <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">End Sales</td>
                </tr>
            </table>
            <?php if ($row_Datostickets > 0) { // Show if recordset not empty ?>
                <?php do { ?>
            <table width="100%" cellspacing="0" class="table_user" style="background-color:<?php if ($row_DatosEvent['acount_no'] != ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId'])) { ?>#F0F0F0<?php } ?>; margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                <?php $currency = ObtenerCurrency($row_DatosEvent['currency']); ?>
                <?php if($row_Datostickets['sales_end'] <= $dateNow && $row_Datostickets['end_time'] <= $timeNow) { ?>
                    <?php ActualizacionTicketStatus(1, $row_Datostickets['id_ticket'], $_GET['eventno'], 0); ?>
                <?php } ?>
                <tr class="line" height="50">
                    <td width="42.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;"><?php echo $row_Datostickets['ticket_name']; ?></td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"><?php echo $row_Datostickets['price']; ?> <?php echo $currency ?></td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"><?php echo ObtenerTipoTicketsVendido($row_Datostickets['id_ticket']); ?>/<?php echo $row_Datostickets['stock']; ?></td>
                    <td width="12.5%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"><?php echo visibility($row_Datostickets['visibility']); ?></td>
                    <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;"><?php echo $row_Datostickets['sales_end']; ?> at <?php echo $row_Datostickets['end_time']; ?></td>
                </tr>
            </table>
            <?php } while ($row_Datostickets = mysqli_fetch_assoc($Datostickets)); 
                }
                else
                { // Show if recordset is empty ?>
            <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 15px; box-shadow: 0 .15rem 2rem 0 rgba(58,59,69,.15)!important;">
                <tr class="line" height="60">
                    <td colspan="10" nowrap="nowrap" align="center" style="padding: 0 0 0 20px;">fins ingen register.</td>
                </tr>
            </table>
                <?php } ?>
        </div>
    </div>
</div>