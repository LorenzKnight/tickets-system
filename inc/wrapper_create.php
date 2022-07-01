<div class="container_in">
    <div class="content_dinamic">
        <div class="formular_flex" style="width:650px; margin: 80px auto;">
            <form action="create.php" method="post" name="formevent" id="formevent">
                <table width="90%" align="center" cellspacing="0" class="list">
                    <tr valign="baseline" height="40">
                        <td style="" colspan="6" align="center" valign="middle">
                            <h1>Basic Info</h1>
                            <p style="font-size:14px; color:#999;">Name your event and tell event-goers why they should come.<br/>
                            Add details that highlight what makes it unique.</p>
                        </td>      
                    </tr>
                    <tr valign="baseline" height="70">
                        <td colspan="6" valign="middle" align="center">
                            <input class="text_input" type="text" style="width:93%;" name="event_name" id="event_name" placeholder="Event title..." required/>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td width="50%" style="color: #999; font-size:14px;" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 14px; color: #999;" name="type" id="type" required>
                                <option value="" >Type</option>
                                <?php if ($totalRows_DatosType > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosType['id_type']; ?>"><?php echo $row_DatosType['type']; ?></option>
                                <?php } while ($row_DatosType = mysqli_fetch_assoc($DatosType));
                                    }
                                    ?>
                            </select>
                        </td>
                        <td width="50%" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 14px; color: #999;" name="category" id="category" required>
                                <option value="None" >Category</option>
                                <?php if ($totalRows_DatosCat > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosCat['id_category']; ?>"><?php echo $row_DatosCat['category']; ?></option>
                                <?php } while ($row_DatosCat = mysqli_fetch_assoc($DatosCat));
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="border-bottom:1px solid #999;" colspan="6" valign="middle" align="center">
                            <select class="text_input" style="width: 540px; font-size: 14px; color: #999;" name="organizer" id="organizer" required>
                                <?php if ($totalRows_DatosOrg > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosOrg['id_user']; ?>" ><?php echo $row_DatosOrg['name']; ?> <?php echo $row_DatosOrg['surname']; ?></option>
                                <?php } while ($row_DatosOrg = mysqli_fetch_assoc($DatosOrg));
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="100">
                        <td style="" colspan="6" align="center" valign="middle">
                            <h1>Location</h1>
                            <p style="font-size:14px; color:#999;">Help people in the area discover your event and let attendees know where to show up.</p>
                        </td>      
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="" colspan="6" valign="middle" align="center">
                            <select class="text_input" style="width: 270px; font-size: 14px; color: #999;" name="venue_status" id="venue_status">
                                <option value="0" >Venue</option>
                                <option value="1">Online event</option>
                                <option value="2">To be announced</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="" colspan="6" valign="middle" align="center">
                            <select class="text_input" style="width: 270px; font-size: 14px; color: #999;" name="country" id="country" required>
                                <option value="" >Please select a country</option>
                                <?php if ($totalRows_DatosCountry > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosCountry['id_country']; ?>"><?php echo $row_DatosCountry['country_name']; ?></option>
                                <?php } while ($row_DatosCountry = mysqli_fetch_assoc($DatosCountry));
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="border-bottom:1px solid #999;" colspan="6" valign="middle" align="center">
                            <input class="text_input" style="width:93%;" type="text" name="event_adress" id="event_adress" placeholder="Events adress..." required/>
                        </td>
                    </tr>
                    <tr valign="baseline" height="100">
                        <td style="" colspan="6" align="center" valign="middle">
                            <h1>Date and time</h1>
                            <p style="font-size:14px; color:#999;">Tell event-goers when your event starts and ends so they can make plans to attend.</p>
                        </td>
                    </tr>
                    <tr valign="baseline" height="50">
                        <td width="50%" style="color: #999; font-size:14px;" valign="middle" align="center">
                            <input class="tcal" style="width:90%; margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="event_start" name="event_start" autocomplete="off" placeholder="Event start..." required/>
                        </td>
                        <td width="50%" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 12px; color: #999;" name="time_start" id="time_start" required>
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
                        <td width="50%" style="color: #999; font-size:14px; border-bottom:1px solid #999;" valign="middle" align="center">
                            <input class="tcal" style="width:90%; margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="event_end" name="event_end" autocomplete="off" placeholder="Event end..." required/>
                        </td>
                        <td width="50%" style="border-bottom:1px solid #999;" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 12px; color: #999;" name="time_end" id="time_end" required>
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
                    <tr valign="baseline" height="100">
                        <td style="" colspan="6" align="center" valign="middle">
                            <h1>Event status</h1>
                            <p style="font-size:14px; color:#999;">Is your event already on sale or is it a draft?</p>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="border-bottom:1px solid #999;" colspan="6" valign="middle" align="center">
                            <select class="text_input" style="width: 270px; font-size: 14px; color: #999;" name="status" id="status" required>
                                <option value="3" >Draft</option>
                                <option value="0">On sale</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td colspan="6" style="padding-top:10px;" nowrap="nowrap" align="center">
                            <input style="padding: 20px 125px;" type="submit" class="button" value="DONE" />
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="currency" id="currency" value="24"/>
                <input type="hidden" name="paypal_email" id="paypal_email" value="<?php echo ObtenerEmailUsuario($_SESSION['tks_UserId']); ?>"/>
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['tks_UserId']; ?>"/>
                <input type="hidden" name="acount_no" id="acount_no" value="<?php echo ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId']); ?>"/>
                <input type="hidden" name="MM_insert" id="MM_insert" value="formevent" />
            </form>
        </div>
    </div>
</div>