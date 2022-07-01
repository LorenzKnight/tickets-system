<div class="container_in">
    <div class="content_dinamic">

            <h1 style="margin:50px 0 0 20px;">Multi-User Access</h1>
            <p style="font-size:14px; color:#666; margin:5px 0 0 20px;">Grant access and special permissions to multiple users, admins, or managers without sharing your login information.</p>
            
        <div class="events_div">
            <table width="100%" cellspacing="0" class="table_user" style="background-color: #F0F0F0; margin: 0 auto 0; ">
                <tr height="40" style="color: #999;">
                    <td width="80%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">Email Adress</td>
                    <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">-</td>
                </tr>
            </table>
                    <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                        <tr class="line" height="40">
                            <td width="80%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                                <?php echo ObtenerEmailUsuario($row_DatosUserAdmin['id_user']); ?> (administrator)
                            </td>
                            <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                                
                            </td>
                        </tr>
                    </table>
                <?php if ($row_DatosMultiuser > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                <a href="multiuser.php?MultiUserId=<?php echo $row_DatosMultiuser['id_multi_user']; ?>">
                    <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                        <tr class="line" height="40">
                            <td width="80%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                                <?php echo $row_DatosMultiuser['email']; ?>
                            </td>
                            <td width="20%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                                <a href="multiuser.php?MultiUserEdit=<?php echo $row_DatosMultiuser['id_user']; ?>">EDIT</a> | <a href="multiuser_delete.php?multiUserID=<?php echo $row_DatosMultiuser['id_user']; ?>">DELETE</a>
                            </td>
                        </tr>
                    </table>
                </a>
                <?php } while ($row_DatosMultiuser = mysqli_fetch_assoc($DatosMultiuser)); 
                }
                ?>
        </div>
        <div class="content_dinamic" style="padding:20px;">

            <a href="multiuser.php?addemail=1000" onclick="mostrar()"><input style="padding: 20px 40px;" class="button_2" value="Add Email Adress" /></a>
            
            <?php if ($_GET['newdone']) : ?>
                <?php
                    $asunto = 'Complete your profile to be part of the team';
                
                    $contenido = '<h2>'.ObtenerEventName($row_DatosPurchase['id_event']).'</h2>
                            </td>
                        </tr>
                        <tr height="">
                            <td nowrap="nowrap" align="left" style="padding:0 30px;">
                                <h4>Congratulations!</h4>
                                </p>
                            </td>
                        </tr>
                        <tr height="">
                            <td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
                                <p>You have been invited to be part of the organization of this event.<br/>
                                click on this <a href="'.$dominio.'?multicomplet='.$_GET["newdone"].'">link</a> to complete your profile!
                                </p>
                            </td>
                        </tr>
                        <tr height="">
                            <td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" align="center">';

                    emailToCompleteMultiuser(ObtenerEmailUsuario($_GET["newdone"]), $contenido, $asunto);
                    ?>
            <?php endif ?>
            <?php if ($_GET['existe']) : ?>
                <h4 style="color:red;">This email is already registered with us. Please use a different email address.</h4>
            <?php endif ?>
            <?php if ($_GET['editdone']) : ?>
                <h4 style="color:green;">The permissions of this email have been updated.</h4>
            <?php endif ?>

            <?php if ($_GET['addemail'] == 1000) : ?>
            <div class="">
                <form action="multiuser.php" method="post" name="formpermissions" id="formpermissions">
                    <table width="100%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                        <tr height="60">
                            <td colspan="2" valign="middle" align="left" style="color: #333; padding: 20px 0;">
                                <h3>Add New Email Address To This Account</h3>
                                <p style="font-size:13px; color:#999;">To give a user access to your account, add a user's email address. They will be sent a link that lets them setup a password for their account.</p>
                            </td>
                        </tr>
                        <tr height="60">
                            <td colspan="2" valign="middle" align="left"><input class="text_input" type="text" placeholder="Email..." name="email" id="email" size="68" required/></td>
                        </tr>
                        <script>
                            function permissions1(value) {
                                if(value=="1") {
                                    document.getElementById('events').style.display = 'block';
                                }else{
                                    document.getElementById('events').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>Grant This User Access To</p>

                                <input type="radio" id="selected_events_only" name="selected_events_only" value="0" onchange="permissions1(this.value);" checked="checked">
                                <label for="all">No event selected</label>
                                <br/>
                                <input type="radio" id="selected_events_only" name="selected_events_only" value="1" onchange="permissions1(this.value);">
                                <label for="selected">Selected events only</label>

                                    <div id="events" style="padding: 5px 0; display:none;">
                                        <?php if ($totalRows_DatosEvent > 0) { // Show if recordset not empty ?>
                                        <?php do { ?>
                                            <table cellspacing="0" style="font-size:14px; text-align:left;">
                                                <tr height="10">
                                                    <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                        <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-E<?php echo $row_DatosEvent['id_event']; ?>">
                                                        <?php echo $row_DatosEvent['event_name']; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php } while ($row_DatosEvent = mysqli_fetch_assoc($DatosEvent)); 
                                        }
                                        ?>
                                    </div>
                            </td>
                        </tr>
                        <script>
                            function permissions2(value) {
                                if(value=="1") {
                                    document.getElementById('actions').style.display = 'block';
                                }else{
                                    document.getElementById('actions').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>Actions This User Can Perform</p>

                                <input type="radio" id="selected_actions_only" name="selected_actions_only" value="0" onchange="permissions2(this.value);" checked="checked">
                                <label for="all">No actions selected </label>
                                <br/>
                                <input type="radio" id="selected_actions_only" name="selected_actions_only" value="1" onchange="permissions2(this.value);">
                                <label for="selected">Selected actions only</label>

                                    <div id="actions" style="padding: 5px 0; display:none;">
                                        <table cellspacing="0" style="font-size:14px; text-align:left;">
                                            <tr height="10">
                                                <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0001">Create new events<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0002">Edit event details not including the payment options<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0003">Edit ticket types<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0004">Edit payment options (e.g. PayPal payments)<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0005">View order and attendee reports (read-only)<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0006">Manage orders and attendees<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0007">Access to aggregate financial data<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0008">Manage discount codes<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0009">Send invites, manage contacts & email attendees<br/> -->
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0010">View fees and invoices<br/> -->
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0011">View and manage payouts<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0012">Check in Attendees<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0013">Sell tickets at the door<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0014">Access and edit Organizer Profile<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0015">Manage event registration transfers<br/> -->
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0016">Manage reserved seating events<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0017">Manage reserved seating holds<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0018">Sell reserved seating holds<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0019">Create and manage event or ticket groups<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0020">Create and manage guestlists. (Also grants permission to manage orders and attendees)
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                            </td>
                        </tr>
                        <script>
                            function permissions3(value) {
                                if(value=="1") {
                                    document.getElementById('emails').style.display = 'block';
                                }else{
                                    document.getElementById('emails').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>This User Should Receive A Copy Of</p>

                                <input type="radio" id="selected_emails_only" name="selected_emails_only" value="0" onchange="permissions3(this.value);">
                                <label for="all">No emails selected</label>
                                <br/>
                                <input type="radio" id="selected_emails_only" name="selected_emails_only" value="1" onchange="permissions3(this.value);">
                                <label for="selected">Selected emails only</label>

                                    <div id="emails" style="padding: 5px 0; display:none;">
                                        <table cellspacing="0" style="font-size:14px; text-align:left;">
                                            <tr height="10">
                                                <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0021">Order confirmations<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0022">Monthly invoices<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0023">Contact the Organizer<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0024">Refund requests<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0025">No emails
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                <br/>
                                <!-- <input type="radio" id="selected_emails_only" name="selected_emails_only" value="2" onchange="permissions3(this.value);" checked="checked"> -->
                                <!-- <label for="no">No emails</label> -->
                               
                            </td>
                        </tr>
                        <tr height="80">
                            <td colspan="2" valign="middle" align="left" style="color: #666; font-size: 14px;">
                                <a href="multiuser.php"><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" /></a> <input style="padding: 20px 65px;" type="submit" class="button" value="Save"/>
                            </td>
                        </tr>
                        <input type="hidden" name="acount_no" id="acount_no" value="<?php echo $row_DatosUserAdmin['acount_no']; ?>"/>
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $_SESSION['tks_UserId']; ?>"/>
                        <input type="hidden" name="rank" id="rank" value="2"/>
                        <input type="hidden" name="MM_insert" id="MM_insert" value="formpermissions" />
                    </table>
                </form>
            </div>
            <?php endif ?>

            <?php if ($_GET['MultiUserEdit'] != "") : ?>
            <div class="">
                <form action="multiuser.php" method="post" name="formpermissionsedit" id="formpermissionsedit">
                    <table width="100%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                        <tr height="60">
                            <td colspan="2" valign="middle" align="left" style="color: #333; padding: 20px 0;">
                                <h2>Edit Permissions for <?php echo ObtenerEmailUsuario($_GET['MultiUserEdit']); ?></h2>
                                <h3>User: <?php echo ObtenerEmailUsuario($_GET['MultiUserEdit']); ?></h3>
                            </td>
                        </tr>
                        <script>
                            function permissions1(value) {
                                if(value=="1") {
                                    document.getElementById('events').style.display = 'block';
                                }else{
                                    document.getElementById('events').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>Grant This User Access To</p>

                                <input type="radio" id="selected_events_only" name="selected_events_only" value="0" onchange="permissions1(this.value);" checked="checked">
                                <label for="all">No events selected</label>
                                <br/>
                                <input type="radio" id="selected_events_only" name="selected_events_only" value="1" onchange="permissions1(this.value);">
                                <label for="selected">Selected events only</label>

                                    <div id="events" style="padding: 5px 0; display:none;">
                                        <?php if ($row_DatosEvent > 0) { // Show if recordset not empty ?>
                                        <?php do { ?>
                                            <table cellspacing="0" style="font-size:14px; text-align:left;">
                                                <?php $eventID = $row_DatosEvent['id_event'];?>
                                                <tr height="10">
                                                    <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                        <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-E<?php echo $row_DatosEvent['id_event']; ?>" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-E$eventID")) {?>checked<?php } ?>>
                                                        <?php echo $row_DatosEvent['event_name']; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php } while ($row_DatosEvent = mysqli_fetch_assoc($DatosEvent)); 
                                        }
                                        ?>
                                    </div>
                            </td>
                        </tr>
                        <script>
                            function permissions2(value) {
                                if(value=="1") {
                                    document.getElementById('actions').style.display = 'block';
                                }else{
                                    document.getElementById('actions').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>Actions This User Can Perform</p>

                                <input type="radio" id="selected_actions_only" name="selected_actions_only" value="0" onchange="permissions2(this.value);" checked="checked">
                                <label for="all">No actions selected</label>
                                <br/>
                                <input type="radio" id="selected_actions_only" name="selected_actions_only" value="1" onchange="permissions2(this.value);">
                                <label for="selected">Selected actions only</label>

                                    <div id="actions" style="padding: 5px 0; display:none;">
                                        <table cellspacing="0" style="font-size:14px; text-align:left;">
                                            <tr height="10">
                                                <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0001" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0001")) {?>checked<?php } ?>>Create new events<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0002" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0002")) {?>checked<?php } ?>>Edit event details not including the payment options<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0003" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0003")) {?>checked<?php } ?>>Edit ticket types<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0004" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0004")) {?>checked<?php } ?>>Edit payment options (e.g. PayPal payments)<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0005" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0005")) {?>checked<?php } ?>>View order and attendee reports (read-only)<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0006" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0006")) {?>checked<?php } ?>>Manage orders and attendees<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0007" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0007")) {?>checked<?php } ?>>Access to aggregate financial data<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0008" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0008")) {?>checked<?php } ?>>Manage discount codes<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0009" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0009")) {?>checked<?php } ?>>Send invites, manage contacts & email attendees<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0010" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0010")) {?>checked<?php } ?>>View fees and invoices<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0011" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0011")) {?>checked<?php } ?>>View and manage payouts<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0012" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0012")) {?>checked<?php } ?>>Check in Attendees<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0013" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0013")) {?>checked<?php } ?>>Sell tickets at the door<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0014" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0014")) {?>checked<?php } ?>>Access and edit Organizer Profile<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0015" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0015")) {?>checked<?php } ?>>Manage event registration transfers<br/>
                                                    <!-- <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0016" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0016")) {?>checked<?php } ?>>Manage reserved seating events<br/> -->
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0017" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0017")) {?>checked<?php } ?>>Manage reserved seating holds<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0018" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0018")) {?>checked<?php } ?>>Sell reserved seating holds<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0019" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0019")) {?>checked<?php } ?>>Create and manage event or ticket groups<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0020" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0020")) {?>checked<?php } ?>>Create and manage guestlists. (Also grants permission to manage orders and attendees)
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                            </td>
                        </tr>
                        <script>
                            function permissions3(value) {
                                if(value=="1") {
                                    document.getElementById('emails').style.display = 'block';
                                }else{
                                    document.getElementById('emails').style.display = 'none';
                                }
                            }
                        </script>
                        <tr height="60">
                            <td style="color:#333; padding: 20px 0 10px; font-size:14px;" colspan="2" valign="middle" align="left">
                                <p>This User Should Receive A Copy Of</p>

                                <input type="radio" id="selected_emails_only" name="selected_emails_only" value="0" onchange="permissions3(this.value);">
                                <label for="all">No emails selected</label>
                                <br/>
                                <input type="radio" id="selected_emails_only" name="selected_emails_only" value="1" onchange="permissions3(this.value);">
                                <label for="selected">Selected emails only</label>

                                    <div id="emails" style="padding: 5px 0; display:none;">
                                        <table cellspacing="0" style="font-size:14px; text-align:left;">
                                            <tr height="10">
                                                <td width="" nowrap="nowrap" align="left" style="color:#333; padding: 2px 0 2px 40px; text-align:left;">
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0021" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0021")) {?>checked<?php } ?>>Order confirmations<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0022" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0022")) {?>checked<?php } ?>>Monthly invoices<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0023" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0023")) {?>checked<?php } ?>>Contact the Organizer<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0024" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0024")) {?>checked<?php } ?>>Refund requests<br/>
                                                    <input type="checkbox" id="permissions" name="permissions[]" value="TSYS-P0025" <?php if(showPermissions($_GET['MultiUserEdit'], "TSYS-P0025")) {?>checked<?php } ?>>No emails
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                <br/>
                                <!-- <input type="radio" id="selected_emails_only" name="selected_emails_only" value="2" onchange="permissions3(this.value);" checked="checked"> -->
                                <!-- <label for="no">No emails</label> -->
                               
                            </td>
                        </tr>
                        <tr height="80">
                            <td colspan="2" valign="middle" align="left" style="color: #666; font-size: 14px;">
                                <a href="multiuser.php"><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" /></a> <input style="padding: 20px 65px;" type="submit" class="button" value="Edit"/>
                            </td>
                        </tr>
                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_GET['MultiUserEdit']; ?>"/>
                        <input type="hidden" name="acount_no" id="acount_no" value="<?php echo $row_DatosUserAdmin['acount_no']; ?>"/>
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $_SESSION['tks_UserId']; ?>"/>
                        <input type="hidden" name="MM_insert" id="MM_insert" value="formpermissionsedit" />
                    </table>
                </form>
            </div>
            <?php endif ?>
        </div>
    </div>
    <div class="sidebar">
        <?php include("inc/barinfo.php"); ?>
    </div>
</div>