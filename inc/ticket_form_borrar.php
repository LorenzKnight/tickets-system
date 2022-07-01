<style>
    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked),
    [type="radio"]:checked,
    [type="radio"]:not(:checked)
    {
        position: absolute;
        left: -9999px;
        width: 0;
        height: 0;
        visibility: hidden;
    }
</style>

<div class="subform_cont" style="" id="popup1">
<?php if (MasDeUnticket($_GET["eventno"]) && ($row_DatosEvent["prenumeration"] == 0)) { ?>
    <div style="width:450px; background-color:#FFF; margin:220px auto 0; padding:30px 0 30px; text-align:center; border-radius:4px;">
        <table width="100%" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0">
            <tr height="30">
                <td colspan="2" valign="middle" align="center" style="color:#444; padding:0 25px; font-size:14px;">
                    To be able to add more than one ticket you have to pre-list, this means that monthly we will send an invoice where you will pay a 7% feed<br/>
                    <br/>
                    do you want to do this?
                </td>
            </tr>
            <tr height="30">
                <td colspan="2" valign="middle" align="center"></td>
            </tr>
            <tr height="30">
                <td colspan="2" valign="middle" align="center">
                    <a href="tickets.php?prenumeration=<?php echo $_GET["eventno"]; ?>"><input class="button" style="width: 170px; padding: 20px 65px; text-align: center;" value="Yes" /></a> <a href="#" onclick="ocurtar()" ><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="No" /></a>
                </td>
            </tr>
        </table>
    </div>
<?php } else { ?>
    <div class="formulario">
        <form action="tickets.php" method="post" name="formtickets" id="formtickets">
            <table width="85%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                <tr height="30">
                    <td colspan="2" valign="middle" align="center" style="color: #333; padding: 30px 0 0 0;">
                        <h3>Add Ticket</h3>
                    </td>
                </tr>
                <tr height="60">
                    <td style="padding: 20px 0 10px; font-size:12px; border-bottom:1px solid #CCC;" colspan="2" valign="middle" align="center">
                        <div style="display:flex;">
                            <input class="checkbox-tickets" type="radio" name="type" id="paid" value="0" checked>
                            <label class="for-checkbox-tickets" for="paid">
                                Paid
                            </label>
                            <input class="checkbox-tickets" type="radio" name="type" id="free" value="1">
                            <label class="for-checkbox-tickets" for="free">
                                Free
                            </label>
                            <input class="checkbox-tickets" type="radio" name="type" id="donation" value="2">
                            <label class="for-checkbox-tickets" for="donation">
                                Donation
                            </label>
                        </div>
                    </td>
                </tr>
                <tr height="60">
                    <td style="color:#999; padding: 20px 0 10px; font-size:12px; border-bottom:1px solid #CCC;" colspan="2" valign="middle" align="center">
                        <div style="display:flex;">
                            <div style="flex:1; text-aling:center; padding:10px 0;">
                                <input type="radio" id="single_couple" name="single_couple" value="1" checked="checked">
                                <label for="male">Single (1 Person)</label>
                            </div>
                            <div style="flex:1; text-aling:center; padding:10px 0;">
                                <input type="radio" id="single_couple" name="single_couple" value="2">
                                <label for="female">Couple (2 Persons)</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr height="60">
                    <td colspan="2" valign="middle" align="center"><input class="text_input" type="text" placeholder="Tickets name..." name="ticket_name" id="ticket_name" size="68" required/></td>
                </tr>
                <tr height="60">
                    <td width="50%" valign="middle" align="right" style="padding: 0 10px; border-bottom:1px solid #CCC;"><input class="text_input" type="text" placeholder="Quantity" name="stock" id="stock" size="30" required/></td>
                    <td width="50%" valign="middle" align="left" style="padding: 0 10px; border-bottom:1px solid #CCC;"><input class="text_input" type="text" placeholder="0.00 kr" name="price" id="price" size="30" required/></td>
                </tr>
                <tr height="30">
                    <td colspan="2" valign="middle" align="center" style="color:#333; padding: 20px 0 10px; font-size:12px;">
                        <p>Date & Time</p>
                    </td>
                </tr>
                <tr valign="baseline" height="50">
                            <td width="50%" style="color: #999; font-size:14px; padding: 0 10px;" valign="middle" align="right">
                                <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="start_date" name="start_date" autocomplete="off" size="30" placeholder="Start date..." required/>
                            </td>
                            <td width="50%" valign="middle" align="left" style="padding: 0 10px;">
                                <select class="text_input" style="width: 205px; font-size: 12px; color: #999;" name="start_time" id="start_time" required>
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>

                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>

                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>

                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>

                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>

                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="baseline" height="50">
                            <td width="50%" style="color: #999; font-size:14px; padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="right">
                                <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="sales_end" name="sales_end" autocomplete="off" size="30" placeholder="Sales end..." required/>
                            </td>
                            <td width="50%" style="padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="left">
                            <select class="text_input" style="width: 205px; font-size: 12px; color: #999;" name="end_time" id="end_time" required>
                                    <option value="00:00">00:00</option>
                                    <option value="00:30">00:30</option>
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>

                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>

                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>

                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>

                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>

                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </td>
                        </tr>
                <tr height="80">
                    <td style="padding:10px 0;" colspan="2" valign="middle" align="center"><textarea class="text_input" type="text" placeholder="Tell attendees more about this ticket..." name="description" id="description" rows="4" cols="57"></textarea></td>
                </tr>
                <tr height="60">
                    <td colspan="2" width="100%" valign="middle" align="center" style="color: #666; font-size: 14px; padding: 0 10px;">
                        <select class="text_input" style="width: 428px; font-size: 12px; color: #999;" name="visibility" id="visibility">
                        <option value="0">Visible</option>
                        <option value="1">Ended</option>
                        <option value="2">Hidden <!-- when not on sale --></option>
                        <option value="3">Visible only with discoverer code</option>
                        </select>
                    </td>
                </tr>
                <tr height="60">
                    <td colspan="2" width="100%" valign="middle" align="center" style="color: #666; font-size: 14px; padding: 0 10px;">
                        <select class="text_input" style="width: 428px; font-size: 12px; color: #999;" name="sales_type" id="sales_type">
                        <option value="0" >Everywhere</option>
                        <option value="1">Online only</option>
                        <option value="2">At the door only</option>
                        </select>
                    </td>
                </tr>
                <tr height="80">
                    <td colspan="2" valign="middle" align="center" style="color: #666; font-size: 14px;">
                            <!--<a href="tickets.php?eventno=<?php //echo $_GET['eventno']; ?>">--><a href="#" onclick="ocurtar()" ><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" /></a> <input style="padding: 20px 65px;" type="submit" class="button" value="Save" onclick="ocurtar()"/>
                    </td>
                </tr>
                <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['tks_UserId']; ?>"/>
                <input type="hidden" name="status" id="status" value="1"/> 
                <input type="hidden" name="MM_insert" id="MM_insert" value="formtickets" />
            </table>
        </form>
    </div>
<?php } ?>
</div>

<div class="subform_cont" id="popup2">
    <div style="width:100; height:100; background-color:#FFF; border:1px solid #999; text-align:center; margin:0 auto; padding:20px 0 0; display:none; z-index:200;">
        <p>listo</p>
    </div>
</div>

<?php if($_GET["editTicket"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <form action="tickets.php" method="post" name="formediti" id="formediti">
                <table width="85%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #333; padding: 30px 0 0 0;">
                            <h3>Edit Ticket</h3>
                        </td>
                    </tr>
                    <tr height="60">
                        <td style="color:#999; padding: 20px 0 10px; font-size:12px; border-bottom:1px solid #CCC;" colspan="2" valign="middle" align="center">
                            <div style="display:flex;">
                                <div style="flex:1; text-aling:center;">
                                    <input type="radio" id="type" name="type" value="0" <?php if ($row_DatosTicketEdit['type'] == 0) echo 'checked="checked"'; ?>>
                                    <label for="male">Paid</label>
                                </div>
                                <div style="flex:1; text-aling:center;">
                                    <input type="radio" id="type" name="type" value="1" <?php if ($row_DatosTicketEdit['type'] == 1) echo 'checked="checked"'; ?>>
                                    <label for="female">Free</label>
                                </div>
                                <div style="flex:1; text-aling:center;">
                                    <input type="radio" id="type" name="type" value="2" <?php if ($row_DatosTicketEdit['type'] == 2) echo 'checked="checked"'; ?>>
                                    <label for="other">Donation</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr height="60">
                        <td style="color:#999; padding: 20px 0 10px; font-size:12px; border-bottom:1px solid #CCC;" colspan="2" valign="middle" align="center">
                            <div style="display:flex;">
                                <div style="flex:1; text-aling:center; padding:10px 0;">
                                    <input type="radio" id="single_couple" name="single_couple" value="1" <?php if ($row_DatosTicketEdit['single_couple'] == 1) echo 'checked="checked"'; ?>>
                                    <label for="male">Single (1 Person)</label>
                                </div>
                                <div style="flex:1; text-aling:center; padding:10px 0;">
                                    <input type="radio" id="single_couple" name="single_couple" value="2" <?php if ($row_DatosTicketEdit['single_couple'] == 2) echo 'checked="checked"'; ?>>
                                    <label for="female">Couple (2 Persons)</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" valign="middle" align="center"><input class="text_input" type="text" placeholder="Tickets name..." name="ticket_name" id="ticket_name" value="<?php echo $row_DatosTicketEdit['ticket_name'];?>" size="68" required/></td>
                    </tr>
                    <tr height="60">
                        <td width="50%" valign="middle" align="right" style="padding: 0 10px; border-bottom:1px solid #CCC;"><input class="text_input" type="text" placeholder="Quantity" name="stock" id="stock" value="<?php echo $row_DatosTicketEdit['stock'];?>" size="30" required/></td>
                        <td width="50%" valign="middle" align="left" style="padding: 0 10px; border-bottom:1px solid #CCC;"><input class="text_input" type="text" placeholder="0.00 kr" name="price" id="price" value="<?php echo $row_DatosTicketEdit['price'];?>" size="30" required/></td>
                    </tr>
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color:#333; padding: 20px 0 10px; font-size:12px;">
                            <p>Date & Time</p>
                        </td>
                    </tr>
                    <tr valign="baseline" height="50">
                                <td width="50%" style="color: #999; font-size:14px; padding: 0 10px;" valign="middle" align="right">
                                    <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="start_date" name="start_date" autocomplete="off" size="30" value="<?php echo $row_DatosTicketEdit['start_date'];?>" placeholder="Start date..." required/>
                                </td>
                                <td width="50%" valign="middle" align="left" style="padding: 0 10px;">
                                    <select class="text_input" style="width: 205px; font-size: 12px; color: #999;" name="start_time" id="start_time" required>
                                        <option value="00:00" <?php if ($row_DatosTicketEdit['start_time'] == "00:00:00") echo "selected"; ?>>00:00</option>
                                        <option value="00:30" <?php if ($row_DatosTicketEdit['start_time'] == "00:30:00") echo "selected"; ?>>00:30</option>
                                        <option value="01:00" <?php if ($row_DatosTicketEdit['start_time'] == "01:00:00") echo "selected"; ?>>01:00</option>
                                        <option value="01:30" <?php if ($row_DatosTicketEdit['start_time'] == "01:30:00") echo "selected"; ?>>01:30</option>
                                        <option value="02:00" <?php if ($row_DatosTicketEdit['start_time'] == "02:00:00") echo "selected"; ?>>02:00</option>
                                        <option value="02:30" <?php if ($row_DatosTicketEdit['start_time'] == "02:30:00") echo "selected"; ?>>02:30</option>
                                        <option value="03:00" <?php if ($row_DatosTicketEdit['start_time'] == "03:00:00") echo "selected"; ?>>03:00</option>
                                        <option value="03:30" <?php if ($row_DatosTicketEdit['start_time'] == "03:30:00") echo "selected"; ?>>03:30</option>

                                        <option value="04:00" <?php if ($row_DatosTicketEdit['start_time'] == "04:00:00") echo "selected"; ?>>04:00</option>
                                        <option value="04:30" <?php if ($row_DatosTicketEdit['start_time'] == "04:30:00") echo "selected"; ?>>04:30</option>
                                        <option value="05:00" <?php if ($row_DatosTicketEdit['start_time'] == "05:00:00") echo "selected"; ?>>05:00</option>
                                        <option value="05:30" <?php if ($row_DatosTicketEdit['start_time'] == "05:30:00") echo "selected"; ?>>05:30</option>
                                        <option value="06:00" <?php if ($row_DatosTicketEdit['start_time'] == "06:00:00") echo "selected"; ?>>06:00</option>
                                        <option value="06:30" <?php if ($row_DatosTicketEdit['start_time'] == "06:30:00") echo "selected"; ?>>06:30</option>
                                        <option value="07:00" <?php if ($row_DatosTicketEdit['start_time'] == "07:00:00") echo "selected"; ?>>07:00</option>
                                        <option value="07:30" <?php if ($row_DatosTicketEdit['start_time'] == "07:30:00") echo "selected"; ?>>07:30</option>

                                        <option value="08:00" <?php if ($row_DatosTicketEdit['start_time'] == "08:00:00") echo "selected"; ?>>08:00</option>
                                        <option value="08:30" <?php if ($row_DatosTicketEdit['start_time'] == "08:30:00") echo "selected"; ?>>08:30</option>
                                        <option value="09:00" <?php if ($row_DatosTicketEdit['start_time'] == "09:00:00") echo "selected"; ?>>09:00</option>
                                        <option value="09:30" <?php if ($row_DatosTicketEdit['start_time'] == "09:30:00") echo "selected"; ?>>09:30</option>
                                        <option value="10:00" <?php if ($row_DatosTicketEdit['start_time'] == "10:00:00") echo "selected"; ?>>10:00</option>
                                        <option value="10:30" <?php if ($row_DatosTicketEdit['start_time'] == "10:30:00") echo "selected"; ?>>10:30</option>
                                        <option value="11:00" <?php if ($row_DatosTicketEdit['start_time'] == "11:00:00") echo "selected"; ?>>11:00</option>
                                        <option value="11:30" <?php if ($row_DatosTicketEdit['start_time'] == "11:30:00") echo "selected"; ?>>11:30</option>

                                        <option value="12:00" <?php if ($row_DatosTicketEdit['start_time'] == "12:00:00") echo "selected"; ?>>12:00</option>
                                        <option value="12:30" <?php if ($row_DatosTicketEdit['start_time'] == "12:30:00") echo "selected"; ?>>12:30</option>
                                        <option value="13:00" <?php if ($row_DatosTicketEdit['start_time'] == "13:00:00") echo "selected"; ?>>13:00</option>
                                        <option value="13:30" <?php if ($row_DatosTicketEdit['start_time'] == "13:30:00") echo "selected"; ?>>13:30</option>
                                        <option value="14:00" <?php if ($row_DatosTicketEdit['start_time'] == "14:00:00") echo "selected"; ?>>14:00</option>
                                        <option value="14:30" <?php if ($row_DatosTicketEdit['start_time'] == "14:30:00") echo "selected"; ?>>14:30</option>
                                        <option value="15:00" <?php if ($row_DatosTicketEdit['start_time'] == "15:00:00") echo "selected"; ?>>15:00</option>
                                        <option value="15:30" <?php if ($row_DatosTicketEdit['start_time'] == "15:30:00") echo "selected"; ?>>15:30</option>

                                        <option value="16:00" <?php if ($row_DatosTicketEdit['start_time'] == "16:00:00") echo "selected"; ?>>16:00</option>
                                        <option value="16:30" <?php if ($row_DatosTicketEdit['start_time'] == "16:30:00") echo "selected"; ?>>16:30</option>
                                        <option value="17:00" <?php if ($row_DatosTicketEdit['start_time'] == "17:00:00") echo "selected"; ?>>17:00</option>
                                        <option value="17:30" <?php if ($row_DatosTicketEdit['start_time'] == "17:30:00") echo "selected"; ?>>17:30</option>
                                        <option value="18:00" <?php if ($row_DatosTicketEdit['start_time'] == "18:00:00") echo "selected"; ?>>18:00</option>
                                        <option value="18:30" <?php if ($row_DatosTicketEdit['start_time'] == "18:30:00") echo "selected"; ?>>18:30</option>
                                        <option value="19:00" <?php if ($row_DatosTicketEdit['start_time'] == "19:00:00") echo "selected"; ?>>19:00</option>
                                        <option value="19:30" <?php if ($row_DatosTicketEdit['start_time'] == "19:30:00") echo "selected"; ?>>19:30</option>

                                        <option value="20:00" <?php if ($row_DatosTicketEdit['start_time'] == "20:00:00") echo "selected"; ?>>20:00</option>
                                        <option value="20:30" <?php if ($row_DatosTicketEdit['start_time'] == "20:30:00") echo "selected"; ?>>20:30</option>
                                        <option value="21:00" <?php if ($row_DatosTicketEdit['start_time'] == "21:00:00") echo "selected"; ?>>21:00</option>
                                        <option value="21:30" <?php if ($row_DatosTicketEdit['start_time'] == "21:30:00") echo "selected"; ?>>21:30</option>
                                        <option value="22:00" <?php if ($row_DatosTicketEdit['start_time'] == "22:00:00") echo "selected"; ?>>22:00</option>
                                        <option value="22:30" <?php if ($row_DatosTicketEdit['start_time'] == "22:30:00") echo "selected"; ?>>22:30</option>
                                        <option value="23:00" <?php if ($row_DatosTicketEdit['start_time'] == "23:00:00") echo "selected"; ?>>23:00</option>
                                        <option value="23:30" <?php if ($row_DatosTicketEdit['start_time'] == "23:30:00") echo "selected"; ?>>23:30</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="baseline" height="50">
                                <td width="50%" style="color: #999; font-size:14px; padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="right">
                                    <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="sales_end" name="sales_end" autocomplete="off" size="30" value="<?php echo $row_DatosTicketEdit['sales_end'];?>" placeholder="Sales end..." required/>
                                </td>
                                <td width="50%" style="padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="left">
                                    <select class="text_input" style="width: 205px; font-size: 12px; color: #999;" name="end_time" id="end_time" required>
                                        <option value="00:00" <?php if ($row_DatosTicketEdit['end_time'] == "00:00:00") echo "selected"; ?>>00:00</option>
                                        <option value="00:30" <?php if ($row_DatosTicketEdit['end_time'] == "00:30:00") echo "selected"; ?>>00:30</option>
                                        <option value="01:00" <?php if ($row_DatosTicketEdit['end_time'] == "01:00:00") echo "selected"; ?>>01:00</option>
                                        <option value="01:30" <?php if ($row_DatosTicketEdit['end_time'] == "01:30:00") echo "selected"; ?>>01:30</option>
                                        <option value="02:00" <?php if ($row_DatosTicketEdit['end_time'] == "02:00:00") echo "selected"; ?>>02:00</option>
                                        <option value="02:30" <?php if ($row_DatosTicketEdit['end_time'] == "02:30:00") echo "selected"; ?>>02:30</option>
                                        <option value="03:00" <?php if ($row_DatosTicketEdit['end_time'] == "03:00:00") echo "selected"; ?>>03:00</option>
                                        <option value="03:30" <?php if ($row_DatosTicketEdit['end_time'] == "03:30:00") echo "selected"; ?>>03:30</option>

                                        <option value="04:00" <?php if ($row_DatosTicketEdit['end_time'] == "04:00:00") echo "selected"; ?>>04:00</option>
                                        <option value="04:30" <?php if ($row_DatosTicketEdit['end_time'] == "04:30:00") echo "selected"; ?>>04:30</option>
                                        <option value="05:00" <?php if ($row_DatosTicketEdit['end_time'] == "05:00:00") echo "selected"; ?>>05:00</option>
                                        <option value="05:30" <?php if ($row_DatosTicketEdit['end_time'] == "05:30:00") echo "selected"; ?>>05:30</option>
                                        <option value="06:00" <?php if ($row_DatosTicketEdit['end_time'] == "06:00:00") echo "selected"; ?>>06:00</option>
                                        <option value="06:30" <?php if ($row_DatosTicketEdit['end_time'] == "06:30:00") echo "selected"; ?>>06:30</option>
                                        <option value="07:00" <?php if ($row_DatosTicketEdit['end_time'] == "07:00:00") echo "selected"; ?>>07:00</option>
                                        <option value="07:30" <?php if ($row_DatosTicketEdit['end_time'] == "07:30:00") echo "selected"; ?>>07:30</option>

                                        <option value="08:00" <?php if ($row_DatosTicketEdit['end_time'] == "08:00:00") echo "selected"; ?>>08:00</option>
                                        <option value="08:30" <?php if ($row_DatosTicketEdit['end_time'] == "08:30:00") echo "selected"; ?>>08:30</option>
                                        <option value="09:00" <?php if ($row_DatosTicketEdit['end_time'] == "09:00:00") echo "selected"; ?>>09:00</option>
                                        <option value="09:30" <?php if ($row_DatosTicketEdit['end_time'] == "09:30:00") echo "selected"; ?>>09:30</option>
                                        <option value="10:00" <?php if ($row_DatosTicketEdit['end_time'] == "10:00:00") echo "selected"; ?>>10:00</option>
                                        <option value="10:30" <?php if ($row_DatosTicketEdit['end_time'] == "10:30:00") echo "selected"; ?>>10:30</option>
                                        <option value="11:00" <?php if ($row_DatosTicketEdit['end_time'] == "11:00:00") echo "selected"; ?>>11:00</option>
                                        <option value="11:30" <?php if ($row_DatosTicketEdit['end_time'] == "11:30:00") echo "selected"; ?>>11:30</option>

                                        <option value="12:00" <?php if ($row_DatosTicketEdit['end_time'] == "12:00:00") echo "selected"; ?>>12:00</option>
                                        <option value="12:30" <?php if ($row_DatosTicketEdit['end_time'] == "12:30:00") echo "selected"; ?>>12:30</option>
                                        <option value="13:00" <?php if ($row_DatosTicketEdit['end_time'] == "13:00:00") echo "selected"; ?>>13:00</option>
                                        <option value="13:30" <?php if ($row_DatosTicketEdit['end_time'] == "13:30:00") echo "selected"; ?>>13:30</option>
                                        <option value="14:00" <?php if ($row_DatosTicketEdit['end_time'] == "14:00:00") echo "selected"; ?>>14:00</option>
                                        <option value="14:30" <?php if ($row_DatosTicketEdit['end_time'] == "14:30:00") echo "selected"; ?>>14:30</option>
                                        <option value="15:00" <?php if ($row_DatosTicketEdit['end_time'] == "15:00:00") echo "selected"; ?>>15:00</option>
                                        <option value="15:30" <?php if ($row_DatosTicketEdit['end_time'] == "15:30:00") echo "selected"; ?>>15:30</option>

                                        <option value="16:00" <?php if ($row_DatosTicketEdit['end_time'] == "16:00:00") echo "selected"; ?>>16:00</option>
                                        <option value="16:30" <?php if ($row_DatosTicketEdit['end_time'] == "16:30:00") echo "selected"; ?>>16:30</option>
                                        <option value="17:00" <?php if ($row_DatosTicketEdit['end_time'] == "17:00:00") echo "selected"; ?>>17:00</option>
                                        <option value="17:30" <?php if ($row_DatosTicketEdit['end_time'] == "17:30:00") echo "selected"; ?>>17:30</option>
                                        <option value="18:00" <?php if ($row_DatosTicketEdit['end_time'] == "18:00:00") echo "selected"; ?>>18:00</option>
                                        <option value="18:30" <?php if ($row_DatosTicketEdit['end_time'] == "18:30:00") echo "selected"; ?>>18:30</option>
                                        <option value="19:00" <?php if ($row_DatosTicketEdit['end_time'] == "19:00:00") echo "selected"; ?>>19:00</option>
                                        <option value="19:30" <?php if ($row_DatosTicketEdit['end_time'] == "19:30:00") echo "selected"; ?>>19:30</option>

                                        <option value="20:00" <?php if ($row_DatosTicketEdit['end_time'] == "20:00:00") echo "selected"; ?>>20:00</option>
                                        <option value="20:30" <?php if ($row_DatosTicketEdit['end_time'] == "20:30:00") echo "selected"; ?>>20:30</option>
                                        <option value="21:00" <?php if ($row_DatosTicketEdit['end_time'] == "21:00:00") echo "selected"; ?>>21:00</option>
                                        <option value="21:30" <?php if ($row_DatosTicketEdit['end_time'] == "21:30:00") echo "selected"; ?>>21:30</option>
                                        <option value="22:00" <?php if ($row_DatosTicketEdit['end_time'] == "22:00:00") echo "selected"; ?>>22:00</option>
                                        <option value="22:30" <?php if ($row_DatosTicketEdit['end_time'] == "22:30:00") echo "selected"; ?>>22:30</option>
                                        <option value="23:00" <?php if ($row_DatosTicketEdit['end_time'] == "23:00:00") echo "selected"; ?>>23:00</option>
                                        <option value="23:30" <?php if ($row_DatosTicketEdit['end_time'] == "23:30:00") echo "selected"; ?>>23:30</option>
                                    </select>
                                </td>
                            </tr>
                    <tr height="80">
                        <td style="padding:10px 0;" colspan="2" valign="middle" align="center"><textarea class="text_input" type="text" placeholder="Tell attendees more about this ticket..." name="description" id="description" rows="4" cols="57"><?php echo $row_DatosTicketEdit['description'];?></textarea></td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" width="100%" valign="middle" align="center" style="color: #666; font-size: 14px; padding: 0 10px;">
                            <select class="text_input" style="width: 428px; font-size: 12px; color: #999;" name="visibility" id="visibility">
                            <option value="0" <?php if ($row_DatosTicketEdit['visibility'] == 0) echo "selected"; ?>>Visible</option>
                            <option value="1" <?php if ($row_DatosTicketEdit['visibility'] == 1) echo "selected"; ?>>Ended</option>
                            <option value="2" <?php if ($row_DatosTicketEdit['visibility'] == 2) echo "selected"; ?>>Hidden <!-- when not on sale --></option>
                            <option value="3" <?php if ($row_DatosTicketEdit['visibility'] == 3) echo "selected"; ?>>Visible only with discoverer code</option>
                            </select>
                        </td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" width="100%" valign="middle" align="center" style="color: #666; font-size: 14px; padding: 0 10px;">
                            <select class="text_input" style="width: 428px; font-size: 12px; color: #999;" name="sales_type" id="sales_type">
                            <option value="0" <?php if ($row_DatosTicketEdit['sales_type'] == 0) echo "selected"; ?>>Everywhere</option>
                            <option value="1" <?php if ($row_DatosTicketEdit['sales_type'] == 1) echo "selected"; ?>>Online only</option>
                            <option value="2" <?php if ($row_DatosTicketEdit['sales_type'] == 2) echo "selected"; ?>>At the door only</option>
                            </select>
                        </td>
                    </tr>
                    <tr height="80">
                        <td colspan="2" valign="middle" align="center" style="color: #666; font-size: 14px;">
                                <a href="tickets.php?eventno=<?php echo $_GET['eventno']; ?>"><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" /></a> <input style="padding: 20px 65px;" type="submit" class="button" value="Save"/>
                        </td>
                    </tr>
                    <input type="hidden" name="id_ticket" id="id_ticket" value="<?php echo $_GET['editTicket']; ?>"/>
                    <input type="hidden" name="MM_insert" id="MM_insert" value="formediti" />
                </table>
            </form>
        </div>
    </div>
<?php endif ?>