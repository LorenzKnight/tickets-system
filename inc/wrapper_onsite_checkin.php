<?php include("inc/onsite_scanner.php"); ?>
<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="events_div">
            <h1 style="margin-left:20px;">On site Check-in</h1>
            <a href="onsite_checkin.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&scan=1"><button class="button_2" style="margin:0 10px 50px; float:right;">Start scanning</button></a>
            <table width="100%" cellspacing="0" class="table_user" style="background-color: #F0F0F0; margin: 0 auto 0; ">
                <tr height="40" style="color: #999;">
                    <td width="30%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">Name(s)</td>
                    <td width="50%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">Ticket</td>
                    <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">-</td>
                </tr>
            </table>
            <?php if ($row_DatosGuests > 0) { // Show if recordset not empty ?>
            <?php do { ?>
                <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                    <tr class="line" height="40">
                        <td width="30%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                            <?php echo ObtenerNombreGuest($row_DatosGuests['id_user']); ?> <?php echo ObtenerApellidoGuest($row_DatosGuests['id_user']); ?> <?php //if (ObtenerNombrePGuest($row_DatosGuests['p_name']) != "" && ObtenerApellidoPGuest($row_DatosGuests['p_surname']) != "") :?>/ <?php echo ObtenerNombrePGuest($row_DatosGuests['id_user']); ?> <?php echo ObtenerApellidoPGuest($row_DatosGuests['id_user']); ?><?php //endif ?>
                        </td>
                        <td width="50%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                            <?php echo ticket_name($row_DatosGuests['id_product']); ?>
                        </td>
                        <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                            <div style="width:80px; display:flex;">
                            <?php if ($row_DatosGuests['product_type'] == 2) { ?>
                                <div style="width:50%; height:10px; background-color:<?php if ($row_DatosGuests['checkin'] > 0) { ?>#3e8e41<?php } else { ?>#FFF<?php } ?>; border:1px solid #3e8e41; flex:1;"></div>
                                <div style="width:50%; height:10px; background-color:<?php if ($row_DatosGuests['checkin'] > 1) { ?>#3e8e41<?php } else { ?>#FFF<?php } ?>; border:1px solid #3e8e41; flex:1;"></div>
                            <?php } else { ?>
                                <div style="width:100%; height:10px; background-color:green; border:1px solid #3e8e41; flex:1;"></div>
                            <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php } while ($row_DatosGuests = mysqli_fetch_assoc($DatosGuests)); 
            }
            ?>
        </div>
    </div>
</div>