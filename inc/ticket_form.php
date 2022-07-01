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
</div>

<div class="slider_form" id="ticketsform">
    <div class="capsula_slider" id="capsula1">
            <div class="form_slide_head">
                <h3>Add Ticket</h3>
            </div>
        <form action="tickets.php" method="post" name="formtickets" id="formtickets">
            <table class="tickets_table" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center" style="border-bottom:1px solid #F0F0F0;">
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
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center" style="border-bottom:1px solid #F0F0F0;">
                        <input class="checkbox-tickets" type="radio" name="single_couple" id="single" value="1" checked>
                        <label class="for-checkbox-tickets" style="width:40%;" for="single">
                            Single (1 Person)
                        </label>
                    
                        <input class="checkbox-tickets" type="radio" name="single_couple" id="couple" value="2">
                        <label class="for-checkbox-tickets" style="width:40%;" for="couple">
                            Couple (2 Persons)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <input class="text_input" type="text" placeholder="Tickets name..." name="ticket_name" id="ticket_name" style="width: 95%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line1" valign="middle" align="right" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Quantity" name="stock" id="stock" style="width: 98%;" required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="0.00 kr" name="price" id="price" style="width: 98%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <p>Date & Time</p>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line1" style="color: #999;" valign="middle" align="right">
                        <input class="tcal" id="text_input" style="width: 98%; margin:5px 0; border-radius:15px; border: 1px solid rgb(84, 4, 231);" type="text" id="start_date" name="start_date" autocomplete="off" placeholder="Start date..." required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left">
                        <select class="text_input" style="width: 98%; color: #999;" name="start_time" id="start_time" required>
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
                <tr valign="baseline">
                    <td class="tickets_line1" style="color: #999;" valign="middle" align="right">
                        <input class="tcal" id="text_input" style="width: 98%; border-radius: 15px; border: 1px solid rgb(84, 4, 231);" type="text" id="sales_end" name="sales_end" autocomplete="off" placeholder="Sales end..." required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left">
                    <select class="text_input" style="width: 98%; color: #999;" name="end_time" id="end_time" required>
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
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <textarea class="text_input" type="text" placeholder="Tell attendees more about this ticket..." name="description" id="description" rows="4" cols="46"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <select class="text_input" style="width: 95%; color: #999;" name="visibility" id="visibility">
                        <option value="0">Visible</option>
                        <option value="1">Ended</option>
                        <option value="2">Hidden <!-- when not on sale --></option>
                        <option value="3">Visible only with discoverer code</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <select class="text_input" style="width: 95%; color: #999;" name="sales_type" id="sales_type">
                        <option value="0" >Everywhere</option>
                        <option value="1">Online only</option>
                        <option value="2">At the door only</option>
                        </select>
                    </td>
                </tr>
            </table>
            
            <div class="form_slide_foot">
                <button type="button" class="button_a" onclick="cerrar()">Cancel</button> <button style="padding: 20px 65px;" type="button" class="button" onclick="enviarcrear()">Save</button>
            </div>
            <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['tks_UserId']; ?>"/>
            <input type="hidden" name="status" id="status" value="1"/> 
            <input type="hidden" name="MM_insert" id="MM_insert" value="formtickets" />
        </form>
    </div>

    <div class="capsula_slider" id="capsula2">
            <div class="form_slide_head">
                <h3>Edit Ticket</h3>
            </div>
        <form action="tickets.php" method="post" name="formediti" id="formediti">
            <table class="tickets_table" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center" style="border-bottom:1px solid #F0F0F0;">
                        <input class="checkbox-tickets" type="radio" name="type" id="paid2" value="0" <?php if ($row_DatosTicketEdit['type'] == 0) echo "checked"; ?>>
                        <label class="for-checkbox-tickets" for="paid2">
                            Paid
                        </label>
                        <input class="checkbox-tickets" type="radio" name="type" id="free2" value="1" <?php if ($row_DatosTicketEdit['type'] == 1) echo "checked"; ?>>
                        <label class="for-checkbox-tickets" for="free2">
                            Free
                        </label>
                        <input class="checkbox-tickets" type="radio" name="type" id="donation2" value="2" <?php if ($row_DatosTicketEdit['type'] == 2) echo "checked"; ?>>
                        <label class="for-checkbox-tickets" for="donation2">
                            Donation
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center" style="border-bottom:1px solid #F0F0F0;">
                        <input class="checkbox-tickets" type="radio" name="single_couple" id="single2" value="1" <?php if ($row_DatosTicketEdit['single_couple'] == 1) echo "checked"; ?>>
                        <label class="for-checkbox-tickets" style="width:40%;" for="single2">
                            Single (1 Person)
                        </label>
                    
                        <input class="checkbox-tickets" type="radio" name="single_couple" id="couple2" value="2" <?php if ($row_DatosTicketEdit['single_couple'] == 2) echo "checked"; ?>>
                        <label class="for-checkbox-tickets" style="width:40%;" for="couple2">
                            Couple (2 Persons)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <input class="text_input" type="text" placeholder="Tickets name..." name="ticket_name" id="ticket_name" value="<?php echo $row_DatosTicketEdit['ticket_name'];?>" style="width: 95%;" required/>
                    </td>
                </tr>
                <tr height="60">
                    <td class="tickets_line1" valign="middle" align="right" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Quantity" name="stock" id="stock" value="<?php echo $row_DatosTicketEdit['stock'];?>" style="width: 98%;" required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="0.00 kr" name="price" id="price" value="<?php echo $row_DatosTicketEdit['price'];?>" style="width: 98%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <p>Date & Time</p>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line1" style="color: #999;" valign="middle" align="right">
                        <input class="tcal" id="text_input" style="width: 98%; margin:5px 0; border-radius:15px; border: 1px solid rgb(84, 4, 231);" type="text" id="start_date" name="start_date" autocomplete="off" value="<?php echo $row_DatosTicketEdit['start_date'];?>" placeholder="Start date..." required/>
                    </td>
                    <td class="tickets_line1" style="" valign="middle" align="left">
                        <select class="text_input" style="width: 98%; color: #999;" name="start_time" id="start_time" required>
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
                <tr valign="baseline">
                    <td class="tickets_line1" style="color: #999; font-size:14px;" valign="middle" align="right">
                        <input class="tcal" id="text_input" style="width: 98%; border-radius: 15px; border: 1px solid rgb(84, 4, 231);" type="text" id="sales_end" name="sales_end" autocomplete="off" value="<?php echo $row_DatosTicketEdit['sales_end'];?>" placeholder="Sales end..." required/>
                    </td>
                    <td class="tickets_line1" style="" valign="middle" align="left">
                        <select class="text_input" style="width: 98%; color: #999;" name="end_time" id="end_time" required>
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
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <textarea class="text_input" type="text" placeholder="Tell attendees more about this ticket..." name="description" id="description" rows="4" cols="46"><?php echo $row_DatosTicketEdit['description'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <select class="text_input" style="width: 95%; color: #999;" name="visibility" id="visibility">
                        <option value="0" <?php if ($row_DatosTicketEdit['visibility'] == 0) echo "selected"; ?>>Visible</option>
                        <option value="1" <?php if ($row_DatosTicketEdit['visibility'] == 1) echo "selected"; ?>>Ended</option>
                        <option value="2" <?php if ($row_DatosTicketEdit['visibility'] == 2) echo "selected"; ?>>Hidden <!-- when not on sale --></option>
                        <option value="3" <?php if ($row_DatosTicketEdit['visibility'] == 3) echo "selected"; ?>>Visible only with discoverer code</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <select class="text_input" style="width: 95%; color: #999;" name="sales_type" id="sales_type">
                        <option value="0" <?php if ($row_DatosTicketEdit['sales_type'] == 0) echo "selected"; ?>>Everywhere</option>
                        <option value="1" <?php if ($row_DatosTicketEdit['sales_type'] == 1) echo "selected"; ?>>Online only</option>
                        <option value="2" <?php if ($row_DatosTicketEdit['sales_type'] == 2) echo "selected"; ?>>At the door only</option>
                        </select>
                    </td>
                </tr>
            </table>

            <div class="form_slide_foot">
                <button type="button" class="button_a" onclick="cerraredit()">Cancel</button> <button style="padding: 20px 65px;" type="button" class="button" onclick="enviaredit()">Save</button>
            </div>
            <input type="hidden" name="id_ticket" id="id_ticket" value="<?php echo $_GET['editTicket']; ?>"/>
            <input type="hidden" name="MM_insert" id="MM_insert" value="formediti" />
        </form>
    </div>
</div>

<div class="subform_cont" id="popup2">
    <div style="width:100; height:100; background-color:#FFF; border:1px solid #999; text-align:center; margin:0 auto; padding:20px 0 0; display:none; z-index:200;">
        <p>listo</p>
    </div>
</div>