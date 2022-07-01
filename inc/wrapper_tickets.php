<?php include("inc/ticket_form.php"); ?>
<?php include("inc/popup_msn.php"); ?>
<?php
	// $dateNow = date("Y-m-d");
    $dateNow = date('Y-m-d H:i:s');

	// $fecha2=time()+3600; //1 hours
    // $timeNow = date("H:i:s"); //000000 es por el formato de la base de datos
?>
<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="tickets_div">
            <h1 style="margin-left:10px;">Tickets</h1>
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0003") || $row_DatosUsuario['id_admin'] == "" ) : ?>
                <div style="width: 100%; height: 120px;">
                    <button class="button_2" style="margin:0 0 50px; float:right;" onclick="abrir()">Create ticket</button>
                </div>
                <?php endif ?> 
                
                
                <?php if ($row_DatosTickets > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                    <div class="table_tickets_lista">
                        <div class="lined1_tickets_lista">
                            <?php updatetoActivProduct($row_DatosTickets['id_ticket'], stockSoldout($row_DatosTickets['id_ticket'])); ?>

                            <?php if($row_DatosTickets['visibility'] == 1) { ?>
                                <?php ActualizacionTicketStatus(1, $row_DatosTickets['id_ticket'], $_GET['eventno'], 0); ?>
                            <?php } else if($row_DatosTickets['start_datetime'] > $dateNow) { ?>
                                <?php ticketsWaiting(4, $row_DatosTickets['id_ticket'], $_GET['eventno']); ?>

                            <?php } else if($row_DatosTickets['start_datetime'] <= $dateNow) { ?>
                                <?php ActualizacionTicketStatus(0, $row_DatosTickets['id_ticket'], $_GET['eventno'], 4); ?>
                                
                            <?php } else if($row_DatosTickets['end_datetime'] <= $dateNow || $row_DatosEventGlobal['end_datetime'] < $dateNow) { ?>
                                <?php ActualizacionTicketStatus(1, $row_DatosTickets['id_ticket'], $_GET['eventno'], 0); ?>
                            <?php } else if($row_DatosTickets['end_datetime'] > $dateNow) { ?>
                                <?php ActualizacionTicketStatus(0, $row_DatosTickets['id_ticket'], $_GET['eventno'], 1); ?>
                            <?php } ?>

                            <div class="<?php
                            if ($row_DatosTickets['start_datetime'] > $dateNow) {
                                echo "punto_status3";
                            }
                            else if ($row_DatosTickets['visibility'] == 0) {
                                echo "punto_status1";
                            }
                            else if ($row_DatosTickets['visibility'] == 1) {
                                echo "punto_status2";
                            }
                            else if ($row_DatosTickets['visibility'] == 2) {
                                echo "punto_status4";
                            }
                            else if ($row_DatosTickets['visibility'] == 3) {
                                echo "punto_status4";
                            }
                            else if ($row_DatosTickets['visibility'] == 4) {
                                echo "punto_status3";
                            }
                            ?>"></div>
                        </div>
                        <div class="lined2_tickets_lista">
                            <h3><?php echo $row_DatosTickets['ticket_name']; ?></h3>
                            <p><?php echo visibility($row_DatosTickets['visibility']); ?> - Ends <?php echo $row_DatosTickets['sales_end']; ?> at <?php echo $row_DatosTickets['end_time']; ?></p>
                        </div>
                        <div class="lined3_tickets_lista">
                            <?php echo ObtenerStock($row_DatosTickets['id_ticket']); ?>/<?php echo $row_DatosTickets['stock']; ?>
                        </div>
                        <div class="lined4_tickets_lista">
                            <?php echo $row_DatosTickets['price']; ?> <?php echo $currency; ?>
                        </div>
                        <div class="lined5_tickets_lista">
                            <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0003") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                            <div class="arternative">
                                <button class="artbtn">o o o</button>
                                <div class="arternative-content">
                                    <a href="tickets.php?eventno=<?php echo $_GET['eventno']; ?>&editTicket=<?php echo $row_DatosTickets['id_ticket']; ?>" class="alt_button">Edit</a>
                                    <a href="ticket_delete.php?ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado ();">Delete</a>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php } while ($row_DatosTickets = mysqli_fetch_assoc($DatosTickets)); 
                }
                else
                { // Show if recordset is empty ?>
                    <div class="table_tickets_lista" style="display: flex; justify-content: center; align-items: center;">
                        <div class="noregister_lista">
                            There is no register.
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>