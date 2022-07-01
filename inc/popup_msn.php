<!--popup de email reenviado-->
<?php if($_GET["forwarded"]):?>
    <div class="subform_cont1">
        <div class="popup_multi">
            <table width="100%" cellspacing="0" style="margin:25px 0 0;">
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        <img src="../img/sys/email_msn.png" width="25%">
                    </td>
                </tr>
                <tr height="40">
                    <td nowrap="nowrap" align="center" style="font-size:20px; color:#666;">
                        Mail forwarded
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        A copy of the ticket has been sent to <?php echo ObtenerNombreGuest($_GET['forwarded']); ?> <?php echo ObtenerApellidoGuest($_GET['forwarded']); ?>
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center">
                        <a href="attendee.php?eventno=<?php echo $_GET['eventno']; ?>"><input style="padding: 15px 5px; margin:12px auto;" class="button_2" value="DONE" /></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php endif ?>

<!--popup de ticket edited-->
<?php if($_GET["ticketeditdone"]):?>
    <div class="subform_cont1">
        <div class="popup_multi">
            <table width="100%" cellspacing="0" style="margin:25px 0 0;">
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        <img src="../img/sys/done_icon.png" width="25%">
                    </td>
                </tr>
                <tr height="40">
                    <td nowrap="nowrap" align="center" style="font-size:20px; color:#666;">
                        Ticket edited
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        This ticket has been edited
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center">
                        <a href="tickets.php?eventno=<?php echo $_GET['eventno']; ?>"><input style="padding: 15px 5px; margin:12px auto;" class="button_2" value="DONE" /></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php endif ?>

<!--popup de ticket created-->
<?php if($_GET["ticketcreateddone"]):?>
    <div class="subform_cont1">
        <div class="popup_multi">
            <table width="100%" cellspacing="0" style="margin:25px 0 0;">
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        <img src="../img/sys/done_icon.png" width="25%">
                    </td>
                </tr>
                <tr height="40">
                    <td nowrap="nowrap" align="center" style="font-size:20px; color:#666;">
                        Ticket created
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        Your ticket are now in your list
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center">
                        <a href="tickets.php?eventno=<?php echo $_GET['eventno']; ?>"><input style="padding: 15px 5px; margin:12px auto;" class="button_2" value="DONE" /></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php endif ?>

<!--popup de attendee edited-->
<?php if($_GET["attendeeeditdone"]):?>
    <div class="subform_cont1">
        <div class="popup_multi">
            <table width="100%" cellspacing="0" style="margin:25px 0 0;">
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        <img src="../img/sys/done_icon.png" width="25%">
                    </td>
                </tr>
                <tr height="40">
                    <td nowrap="nowrap" align="center" style="font-size:20px; color:#666;">
                        Attendee edited
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                        The Attendee info have been edited!
                    </td>
                </tr>
                <tr height="30">
                    <td nowrap="nowrap" align="center">
                        <a href="attendee.php?eventno=<?php echo $_GET['eventno']; ?>"><input style="padding: 15px 5px; margin:12px auto;" class="button_2" value="DONE" /></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php endif ?>