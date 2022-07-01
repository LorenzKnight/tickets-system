<?php include("inc/ticket_form.php"); ?>

<div class="container_in">
    <?php include("inc/sidebar_manager.php"); ?>
    <div class="flex_column" style="">
        <?php if ($row_DatosAllEvents > 0) { // Show if recordset not empty ?>
            <?php do { ?>
            <a href="events_list_manager.php?editID=<?php echo $row_DatosAllEvents['id_event']; ?>">
            <table width="" cellspacing="0" class="table_user" style="width:95%; margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                <tr class="line" height="80">
                    <td width="10%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                        <div class="<?php
                        if ($row_DatosAllEvents['status'] == 1) {
                            echo "punto_status1";
                        }
                        elseif ($row_DatosAllEvents['status'] == 0) {
                            echo "punto_status2";
                        }
                        elseif ($row_DatosAllEvents['status'] == 2) {
                            echo "punto_status4";
                        }
                        elseif ($row_DatosAllEvents['status'] == 3) {
                            echo "punto_status3";
                        }
                        ?>"></div>
                    </td>
                    <td width="45%" nowrap="nowrap" align="left" style="padding: 0 0 0 10px;">
                        <p style="font-size:10px;">Account No. <?php echo $row_DatosAllEvents['acount_no']; ?></p>
                        <h4><?php echo $row_DatosAllEvents['event_name']; ?></h4>
                    </td>
                    <td width="25%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;">
                        <p style="font-size:10px;"><?php echo $row_DatosAllEvents['event_start']; ?>, <?php echo $row_DatosAllEvents['time_start']; ?></p>
                        <p style="font-size:10px;"><?php echo $row_DatosAllEvents['event_end']; ?>, <?php echo $row_DatosAllEvents['time_end']; ?></p>
                    </td>
                    <td width="10%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"></td>
                    <td width="10%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                        <div class="arternative">
                            <button class="artbtn">o o o</button>
                            <div class="arternative-content">
                                <a href="events_list_manager.php?editID=<?php echo $row_DatosAllEvents['id_user']; ?>" class="alt_button">Edit</a>
                                <a href="ticket_delete.php?ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado ();">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            </a>
        <?php } while ($row_DatosAllEvents = mysqli_fetch_assoc($DatosAllEvents)); 
        }
        else
        { // Show if recordset is empty ?>
        <?php } ?>
    </div>
    <div class="flex_column" style="background-color:#F0F0F0; box-shadow:inset 27px 0px 40px -25px rgba(58,59,69,.15);">
        <?php if($_GET['editID'] != "") :?>
                <table width="85%" style="margin: 20px auto; background-color:#FFF; border-radius:7px; box-shadow:0 10px 24px 0 rgba(50,49,58,.25);" border="0" cellspacing="0" cellpadding="0">
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            <h4>Economical Overview</h4>
                        </td>
                    </tr>
                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Event Name :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;"><?php echo $row_DatosEventAmp['event_name']; ?></td>
                    </tr>
                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Event Date :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;">
                            <?php echo $row_DatosEventAmp['event_start']; ?>, <?php echo $row_DatosEventAmp['time_start']; ?> - <?php echo $row_DatosEventAmp['event_end']; ?>, <?php echo $row_DatosEventAmp['time_end']; ?>
                        </td>
                    </tr>
                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Event Organizer :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;"><?php echo ObtenerNombreUsuario($row_DatosEventAmp['organizer']); ?> <?php echo ObtenerApellidoUsuario($row_DatosEventAmp['organizer']); ?></td>
                    </tr>
                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Account No. :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;"><?php echo $row_DatosEventAmp['acount_no']; ?></td>
                    </tr>

                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Gross :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;"><?php echo ObtenerGross($row_DatosEventAmp['id_event']); ?> <?php echo ObtenerCurrency($row_DatosEventAmp['currency']); ?></td>
                    </tr>
                    <?php
                        $procent = ObtenerFEES();

                        $fees = ObtenerGross($row_DatosEventAmp['id_event'])/100 * $procent;
                    ?>
                    <tr height="30">
                        <td width="35%" valign="middle" align="right" style="padding: 0 10px 0 0;">Total Fees :</td>
                        <td width="65%" valign="middle" align="left" style="padding: 0 0 0 10px; font-size:12px; color:#666;"><?php echo $fees; ?> <?php echo ObtenerCurrency($row_DatosEventAmp['currency']); ?></td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            
                        </td>
                    </tr>
                </table>

        <form action="tickets.php" method="post" name="formuser" id="formuser">
                <table width="85%" style="margin: 20px auto; background-color:#FFF; border-radius:7px; box-shadow:0 10px 24px 0 rgba(50,49,58,.25);" border="0" cellspacing="0" cellpadding="0">
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            <h4>Overview per month</h4>
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 0px 0 0 0;">
                            <table width="95%" style="background-color:#999; color:#FFF; margin: 0px auto;" border="0" cellspacing="0" cellpadding="0">
                                <tr height="30">
                                    <td width="20%" valign="middle" align="center" style="font-size:12px;">
                                        Month
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="font-size:12px;">
                                        Order No.
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="font-size:12px;">
                                        Monthly inc.
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="font-size:12px;">
                                        Fees
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="font-size:12px;">
                                        -
                                    </td>
                                </tr>
                            </table>
                            <?php if ($row_DatosEventPMonth > 0) { // Show if recordset not empty ?>
                            <?php do { ?>
                            <table width="95%" style="margin: 0px auto;" border="0" cellspacing="0" cellpadding="0">
                                <tr height="30">
                                    <td width="20%" valign="middle" align="center" style="color:#666; font-size:12px;">
                                        <?php echo month($row_DatosEventPMonth['month']); ?>
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="color:#666; font-size:12px;">
                                        <?php echo $row_DatosEventPMonth['order_number']; ?>
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="color:#666; font-size:12px;">
                                        <?php echo $row_DatosEventPMonth['monthly_income']; ?>
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="color:#666; font-size:12px;">
                                        <?php echo $row_DatosEventPMonth['fees']; ?>
                                    </td>
                                    <td width="20%" valign="middle" align="center" style="color:#666; font-size:12px;">
                                        -
                                    </td>
                                </tr>
                            </table>
                            <?php } while ($row_DatosEventPMonth = mysqli_fetch_assoc($DatosEventPMonth)); 
                            }
                            else
                            { // Show if recordset is empty ?>
                            <table width="100%" style="margin: 0px auto;" border="0" cellspacing="0" cellpadding="0">
                                <tr height="30">
                                    <td width="33.33%" valign="middle" align="center" style="color: #666; font-size:12px;">
                                        There is no record to show!
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            
                        </td>
                    </tr>
                </table>
        </form>
        <?php endif ?>
    </div>
</div>