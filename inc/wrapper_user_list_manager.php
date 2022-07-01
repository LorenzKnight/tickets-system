<?php include("inc/ticket_form.php"); ?>

<div class="container_in">
    <?php include("inc/sidebar_manager.php"); ?>
    <div class="flex_column" style="padding:0 0 40px;">
        <?php if ($row_DatosClients > 0) { // Show if recordset not empty ?>
            <?php do { ?>
            <a href="user_list_manager.php?editID=<?php echo $row_DatosClients['id_user']; ?>">
            <table width="" cellspacing="0" class="table_user" style="width:95%; margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                <tr class="line" height="80">
                    <td width="10%" nowrap="nowrap" align="left" style="padding: 0 0 0 20px;">
                        <div class="<?php
                        if ($row_DatosClients['status'] == 1) {
                            echo "punto_status1";
                        }
                        elseif ($row_DatosClients['status'] == 0) {
                            echo "punto_status2";
                        }
                        elseif ($row_DatosClients['status'] == 2) {
                            echo "punto_status4";
                        }
                        elseif ($row_DatosClients['status'] == 3) {
                            echo "punto_status3";
                        }
                        ?>"></div>
                    </td>
                    <td width="30%" nowrap="nowrap" align="left" style="padding: 0 0 0 10px;">
                        <p style="font-size:10px;">Account No. <?php echo $row_DatosClients['acount_no']; ?></p>
                        <h4><?php echo $row_DatosClients['name']; ?> <?php echo $row_DatosClients['surname']; ?></h4>
                    </td>
                    <td width="25%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;">
                        <p><?php echo $row_DatosClients['email']; ?></p>
                    </td>
                    <td width="15%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"></td>
                    <td width="10%" nowrap="nowrap" align="left" style="padding: 0 0 0 0;"></td>
                    <td width="10%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                        <div class="arternative">
                            <button class="artbtn">o o o</button>
                            <div class="arternative-content">
                                <a href="user_list_manager.php?editID=<?php echo $row_DatosClients['id_user']; ?>" class="alt_button">Edit</a>
                                <a href="ticket_delete.php?ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado ();">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            </a>
        <?php } while ($row_DatosClients = mysqli_fetch_assoc($DatosClients)); 
            }
            else
            { // Show if recordset is empty ?>
            <?php } ?>
    </div>
    <div class="flex_column" style="background-color:#F0F0F0; box-shadow:inset 27px 0px 40px -25px rgba(58,59,69,.15);">
        <?php if($_GET['editID'] != "") :?>
        <form action="tickets.php" method="post" name="formuser" id="formuser">
                <table width="85%" style="margin: 20px auto; padding:0 0 20px 0; background-color:#FFF; border-radius:7px; box-shadow:0 10px 24px 0 rgba(50,49,58,.25);" border="0" cellspacing="0" cellpadding="0">
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            <h4>User info</h4>
                        </td>
                    </tr>
                    <tr height="60">
                        <td width="50%" valign="middle" align="right" style="padding: 0 10px;"><input class="text_input" type="text" placeholder="First name*" name="name" id="name" size="30" value="<?php echo $row_DatosClientEdit['name']; ?>" required/></td>
                        <td width="50%" valign="middle" align="left" style="padding: 0 10px;"><input class="text_input" type="text" placeholder="Last name*" name="surname" id="surname" size="30" value="<?php echo $row_DatosClientEdit['surname']; ?>" required/></td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" valign="middle" align="center" style=" ">
                            <input class="text_input" type="email" name="email" id="email" placeholder="E-mail*" size="68" value="<?php echo $row_DatosClientEdit['email']; ?>" required/>
                        </td>
                    </tr>
                    <tr height="60">
                        <td width="50%" valign="middle" align="right" style="padding: 0 10px;"><input class="text_input" type="text" placeholder="Personal Number*" name="personal_number" id="personal_number" size="30" value="<?php echo $row_DatosClientEdit['personal_number']; ?>" required/></td>
                        <td width="50%" valign="middle" align="left" style="padding: 0 10px;"><input class="text_input" type="text" placeholder="Phone Number*" name="phone" id="phone" size="30" value="<?php echo $row_DatosClientEdit['phone']; ?>" required/></td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 30px 0 0 0;">
                            
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 0px 0 0 0;">
                            <h4>Sub-users list</h4>
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #666; padding: 0px 0 0 0;">
                            <?php if ($row_DatosClientChild > 0) { // Show if recordset not empty ?>
                            <?php do { ?>
                            <table cellspacing="0" cellpadding="0" class="" style="width:90%; background-color:#F0F0F0; color:#666; box-shadow:inset -1px 0px 23px -15px rgba(0,0,0,0.75); font-size:13px; margin:0 auto 10px; border:1px solid #CCC; border-radius:5px;">
                                <tr height="50">
                                    <td width="33.33%" valign="middle" align="left" style="padding: 0 0 0 10px;"><?php echo $row_DatosClientChild['name']; ?> <?php echo $row_DatosClientChild['surname']; ?></td>
                                    <td width="33.33%" valign="middle" align="left" style=""><?php echo $row_DatosClientChild['email']; ?></td>
                                    <td width="33.33%" valign="middle" align="center" style="padding: 0 0 0 10px;"><?php echo $row_DatosClientChild['phone']; ?></td>
                                </tr>
                            </table>
                            <?php } while ($row_DatosClientChild = mysqli_fetch_assoc($DatosClientChild)); 
                            }
                            else
                            { // Show if recordset is empty ?>
                            <table cellspacing="0" cellpadding="0" class="" style="width:90%; color:#999; font-size:13px; margin:0 auto 10px; border:1px solid #CCC; border-radius:5px;">
                                <tr height="50">
                                    <td valign="middle" align="center" style="padding: 0 0 0 10px;">There are no sub users under this user</td>
                                </tr>
                            </table>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
        </form>
        <?php endif ?>
    </div>
</div>