<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="formular_flex" style="width:650px; margin: 80px auto;">
            <form action="event.php" method="post" name="formevent" id="formevent">
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
                            <input class="text_input" style="width:93%;" type="text" name="event_name" id="event_name" placeholder="Event title..." value="<?php echo $row_DatosEvent['event_name']; ?>" required/>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td width="50%" style="color: #999; font-size:14px;" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 14px; color: #999;" name="type" id="type" required>
                                <option value="" >Type</option>
                                <?php if ($totalRows_DatosType > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosType['id_type']; ?>" <?php if ($row_DatosEvent['type'] == $row_DatosType['id_type']) echo "selected"; ?>><?php echo $row_DatosType['type']; ?></option>
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
                                <option value="<?php echo $row_DatosCat['id_category']; ?>" <?php if ($row_DatosEvent['category'] == $row_DatosCat['id_category']) echo "selected"; ?>><?php echo $row_DatosCat['category']; ?></option>
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
                                <option value="<?php echo $row_DatosOrg['id_user']; ?>" <?php if ($row_DatosEvent['id_user'] == $row_DatosOrg['id_user']) echo "selected"; ?>><?php echo $row_DatosOrg['name']; ?> <?php echo $row_DatosOrg['surname']; ?></option>
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
                                <option value="0" <?php if ($row_DatosEvent['venue_status'] == 0) echo "selected"; ?>>Venue</option>
                                <option value="1" <?php if ($row_DatosEvent['venue_status'] == 1) echo "selected"; ?>>Online event</option>
                                <option value="2" <?php if ($row_DatosEvent['venue_status'] == 2) echo "selected"; ?>>To be announced</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="border-bottom:1px solid #999;" colspan="6" valign="middle" align="center">
                            <input class="text_input" style="width:93%;" type="text" name="event_adress" id="event_adress" placeholder="Events adress..." value="<?php echo $row_DatosEvent['event_adress']; ?>" required/>
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
                            <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="event_start" name="event_start" autocomplete="off" size="35" placeholder="Event start..." value="<?php echo $row_DatosEvent['event_start']; ?>" required/>
                        </td>
                        <td width="50%" valign="middle" align="center">
                            <select class="text_input" style="width: 250px; font-size: 12px; color: #999;" name="time_start" id="time_start" required>
                                <option value="00:00:00" <?php if ($row_DatosEvent['time_start'] == "00:00:00") echo "selected"; ?>>00:00</option>
                                <option value="00:30:00" <?php if ($row_DatosEvent['time_start'] == "00:30:00") echo "selected"; ?>>00:30</option>
                                <option value="01:00:00" <?php if ($row_DatosEvent['time_start'] == "01:00:00") echo "selected"; ?>>01:00</option>
                                <option value="01:30:00" <?php if ($row_DatosEvent['time_start'] == "01:30:00") echo "selected"; ?>>01:30</option>
                                <option value="02:00:00" <?php if ($row_DatosEvent['time_start'] == "02:00:00") echo "selected"; ?>>02:00</option>
                                <option value="02:30:00" <?php if ($row_DatosEvent['time_start'] == "02:30:00") echo "selected"; ?>>02:30</option>
                                <option value="03:00:00" <?php if ($row_DatosEvent['time_start'] == "03:00:00") echo "selected"; ?>>03:00</option>
                                <option value="03:30:00" <?php if ($row_DatosEvent['time_start'] == "03:30:00") echo "selected"; ?>>03:30</option>

                                <option value="04:00:00" <?php if ($row_DatosEvent['time_start'] == "04:00:00") echo "selected"; ?>>04:00</option>
                                <option value="04:30:00" <?php if ($row_DatosEvent['time_start'] == "04:30:00") echo "selected"; ?>>04:30</option>
                                <option value="05:00:00" <?php if ($row_DatosEvent['time_start'] == "05:00:00") echo "selected"; ?>>05:00</option>
                                <option value="05:30:00" <?php if ($row_DatosEvent['time_start'] == "05:30:00") echo "selected"; ?>>05:30</option>
                                <option value="06:00:00" <?php if ($row_DatosEvent['time_start'] == "06:00:00") echo "selected"; ?>>06:00</option>
                                <option value="06:30:00" <?php if ($row_DatosEvent['time_start'] == "06:30:00") echo "selected"; ?>>06:30</option>
                                <option value="07:00:00" <?php if ($row_DatosEvent['time_start'] == "07:00:00") echo "selected"; ?>>07:00</option>
                                <option value="07:30:00" <?php if ($row_DatosEvent['time_start'] == "07:30:00") echo "selected"; ?>>07:30</option>

                                <option value="08:00:00" <?php if ($row_DatosEvent['time_start'] == "08:00:00") echo "selected"; ?>>08:00</option>
                                <option value="08:30:00" <?php if ($row_DatosEvent['time_start'] == "08:30:00") echo "selected"; ?>>08:30</option>
                                <option value="09:00:00" <?php if ($row_DatosEvent['time_start'] == "09:00:00") echo "selected"; ?>>09:00</option>
                                <option value="09:30:00" <?php if ($row_DatosEvent['time_start'] == "09:30:00") echo "selected"; ?>>09:30</option>
                                <option value="10:00:00" <?php if ($row_DatosEvent['time_start'] == "10:00:00") echo "selected"; ?>>10:00</option>
                                <option value="10:30:00" <?php if ($row_DatosEvent['time_start'] == "10:30:00") echo "selected"; ?>>10:30</option>
                                <option value="11:00:00" <?php if ($row_DatosEvent['time_start'] == "11:00:00") echo "selected"; ?>>11:00</option>
                                <option value="11:30:00" <?php if ($row_DatosEvent['time_start'] == "11:30:00") echo "selected"; ?>>11:30</option>

                                <option value="12:00:00" <?php if ($row_DatosEvent['time_start'] == "12:00:00") echo "selected"; ?>>12:00</option>
                                <option value="12:30:00" <?php if ($row_DatosEvent['time_start'] == "12:30:00") echo "selected"; ?>>12:30</option>
                                <option value="13:00:00" <?php if ($row_DatosEvent['time_start'] == "13:00:00") echo "selected"; ?>>13:00</option>
                                <option value="13:30:00" <?php if ($row_DatosEvent['time_start'] == "13:30:00") echo "selected"; ?>>13:30</option>
                                <option value="14:00:00" <?php if ($row_DatosEvent['time_start'] == "14:00:00") echo "selected"; ?>>14:00</option>
                                <option value="14:30:00" <?php if ($row_DatosEvent['time_start'] == "14:30:00") echo "selected"; ?>>14:30</option>
                                <option value="15:00:00" <?php if ($row_DatosEvent['time_start'] == "15:00:00") echo "selected"; ?>>15:00</option>
                                <option value="15:30:00" <?php if ($row_DatosEvent['time_start'] == "15:30:00") echo "selected"; ?>>15:30</option>

                                <option value="16:00:00" <?php if ($row_DatosEvent['time_start'] == "16:00:00") echo "selected"; ?>>16:00</option>
                                <option value="16:30:00" <?php if ($row_DatosEvent['time_start'] == "16:30:00") echo "selected"; ?>>16:30</option>
                                <option value="17:00:00" <?php if ($row_DatosEvent['time_start'] == "17:00:00") echo "selected"; ?>>17:00</option>
                                <option value="17:30:00" <?php if ($row_DatosEvent['time_start'] == "17:30:00") echo "selected"; ?>>17:30</option>
                                <option value="18:00:00" <?php if ($row_DatosEvent['time_start'] == "18:00:00") echo "selected"; ?>>18:00</option>
                                <option value="18:30:00" <?php if ($row_DatosEvent['time_start'] == "18:30:00") echo "selected"; ?>>18:30</option>
                                <option value="19:00:00" <?php if ($row_DatosEvent['time_start'] == "19:00:00") echo "selected"; ?>>19:00</option>
                                <option value="19:30:00" <?php if ($row_DatosEvent['time_start'] == "19:30:00") echo "selected"; ?>>19:30</option>

                                <option value="20:00:00" <?php if ($row_DatosEvent['time_start'] == "20:00:00") echo "selected"; ?>>20:00</option>
                                <option value="20:30:00" <?php if ($row_DatosEvent['time_start'] == "20:30:00") echo "selected"; ?>>20:30</option>
                                <option value="21:00:00" <?php if ($row_DatosEvent['time_start'] == "21:00:00") echo "selected"; ?>>21:00</option>
                                <option value="21:30:00" <?php if ($row_DatosEvent['time_start'] == "21:30:00") echo "selected"; ?>>21:30</option>
                                <option value="22:00:00" <?php if ($row_DatosEvent['time_start'] == "22:00:00") echo "selected"; ?>>22:00</option>
                                <option value="22:30:00" <?php if ($row_DatosEvent['time_start'] == "22:30:00") echo "selected"; ?>>22:30</option>
                                <option value="23:00:00" <?php if ($row_DatosEvent['time_start'] == "23:00:00") echo "selected"; ?>>23:00</option>
                                <option value="23:30:00" <?php if ($row_DatosEvent['time_start'] == "23:30:00") echo "selected"; ?>>23:30</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="50">
                        <td width="50%" style="color: #999; font-size:14px; border-bottom:1px solid #999;" valign="middle" align="center">
                            <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="event_end" name="event_end" autocomplete="off" size="35" placeholder="Event end..." value="<?php echo $row_DatosEvent['event_end']; ?>" required/>
                        </td>
                        <td width="50%" style="border-bottom:1px solid #999;" valign="middle" align="center">
                        <select class="text_input" style="width: 250px; font-size: 12px; color: #999;" name="time_end" id="time_end" required>
                        <option value="00:00:00" <?php if ($row_DatosEvent['time_start'] == "00:00:00") echo "selected"; ?>>00:00</option>
                                <option value="00:30:00" <?php if ($row_DatosEvent['time_end'] == "00:30:00") echo "selected"; ?>>00:30</option>
                                <option value="01:00:00" <?php if ($row_DatosEvent['time_end'] == "01:00:00") echo "selected"; ?>>01:00</option>
                                <option value="01:30:00" <?php if ($row_DatosEvent['time_end'] == "01:30:00") echo "selected"; ?>>01:30</option>
                                <option value="02:00:00" <?php if ($row_DatosEvent['time_end'] == "02:00:00") echo "selected"; ?>>02:00</option>
                                <option value="02:30:00" <?php if ($row_DatosEvent['time_end'] == "02:30:00") echo "selected"; ?>>02:30</option>
                                <option value="03:00:00" <?php if ($row_DatosEvent['time_end'] == "03:00:00") echo "selected"; ?>>03:00</option>
                                <option value="03:30:00" <?php if ($row_DatosEvent['time_end'] == "03:30:00") echo "selected"; ?>>03:30</option>

                                <option value="04:00:00" <?php if ($row_DatosEvent['time_end'] == "04:00:00") echo "selected"; ?>>04:00</option>
                                <option value="04:30:00" <?php if ($row_DatosEvent['time_end'] == "04:30:00") echo "selected"; ?>>04:30</option>
                                <option value="05:00:00" <?php if ($row_DatosEvent['time_end'] == "05:00:00") echo "selected"; ?>>05:00</option>
                                <option value="05:30:00" <?php if ($row_DatosEvent['time_end'] == "05:30:00") echo "selected"; ?>>05:30</option>
                                <option value="06:00:00" <?php if ($row_DatosEvent['time_end'] == "06:00:00") echo "selected"; ?>>06:00</option>
                                <option value="06:30:00" <?php if ($row_DatosEvent['time_end'] == "06:30:00") echo "selected"; ?>>06:30</option>
                                <option value="07:00:00" <?php if ($row_DatosEvent['time_end'] == "07:00:00") echo "selected"; ?>>07:00</option>
                                <option value="07:30:00" <?php if ($row_DatosEvent['time_end'] == "07:30:00") echo "selected"; ?>>07:30</option>

                                <option value="08:00:00" <?php if ($row_DatosEvent['time_end'] == "08:00:00") echo "selected"; ?>>08:00</option>
                                <option value="08:30:00" <?php if ($row_DatosEvent['time_end'] == "08:30:00") echo "selected"; ?>>08:30</option>
                                <option value="09:00:00" <?php if ($row_DatosEvent['time_end'] == "09:00:00") echo "selected"; ?>>09:00</option>
                                <option value="09:30:00" <?php if ($row_DatosEvent['time_end'] == "09:30:00") echo "selected"; ?>>09:30</option>
                                <option value="10:00:00" <?php if ($row_DatosEvent['time_end'] == "10:00:00") echo "selected"; ?>>10:00</option>
                                <option value="10:30:00" <?php if ($row_DatosEvent['time_end'] == "10:30:00") echo "selected"; ?>>10:30</option>
                                <option value="11:00:00" <?php if ($row_DatosEvent['time_end'] == "11:00:00") echo "selected"; ?>>11:00</option>
                                <option value="11:30:00" <?php if ($row_DatosEvent['time_end'] == "11:30:00") echo "selected"; ?>>11:30</option>

                                <option value="12:00:00" <?php if ($row_DatosEvent['time_end'] == "12:00:00") echo "selected"; ?>>12:00</option>
                                <option value="12:30:00" <?php if ($row_DatosEvent['time_end'] == "12:30:00") echo "selected"; ?>>12:30</option>
                                <option value="13:00:00" <?php if ($row_DatosEvent['time_end'] == "13:00:00") echo "selected"; ?>>13:00</option>
                                <option value="13:30:00" <?php if ($row_DatosEvent['time_end'] == "13:30:00") echo "selected"; ?>>13:30</option>
                                <option value="14:00:00" <?php if ($row_DatosEvent['time_end'] == "14:00:00") echo "selected"; ?>>14:00</option>
                                <option value="14:30:00" <?php if ($row_DatosEvent['time_end'] == "14:30:00") echo "selected"; ?>>14:30</option>
                                <option value="15:00:00" <?php if ($row_DatosEvent['time_end'] == "15:00:00") echo "selected"; ?>>15:00</option>
                                <option value="15:30:00" <?php if ($row_DatosEvent['time_end'] == "15:30:00") echo "selected"; ?>>15:30</option>

                                <option value="16:00:00" <?php if ($row_DatosEvent['time_end'] == "16:00:00") echo "selected"; ?>>16:00</option>
                                <option value="16:30:00" <?php if ($row_DatosEvent['time_end'] == "16:30:00") echo "selected"; ?>>16:30</option>
                                <option value="17:00:00" <?php if ($row_DatosEvent['time_end'] == "17:00:00") echo "selected"; ?>>17:00</option>
                                <option value="17:30:00" <?php if ($row_DatosEvent['time_end'] == "17:30:00") echo "selected"; ?>>17:30</option>
                                <option value="18:00:00" <?php if ($row_DatosEvent['time_end'] == "18:00:00") echo "selected"; ?>>18:00</option>
                                <option value="18:30:00" <?php if ($row_DatosEvent['time_end'] == "18:30:00") echo "selected"; ?>>18:30</option>
                                <option value="19:00:00" <?php if ($row_DatosEvent['time_end'] == "19:00:00") echo "selected"; ?>>19:00</option>
                                <option value="19:30:00" <?php if ($row_DatosEvent['time_end'] == "19:30:00") echo "selected"; ?>>19:30</option>

                                <option value="20:00:00" <?php if ($row_DatosEvent['time_end'] == "20:00:00") echo "selected"; ?>>20:00</option>
                                <option value="20:30:00" <?php if ($row_DatosEvent['time_end'] == "20:30:00") echo "selected"; ?>>20:30</option>
                                <option value="21:00:00" <?php if ($row_DatosEvent['time_end'] == "21:00:00") echo "selected"; ?>>21:00</option>
                                <option value="21:30:00" <?php if ($row_DatosEvent['time_end'] == "21:30:00") echo "selected"; ?>>21:30</option>
                                <option value="22:00:00" <?php if ($row_DatosEvent['time_end'] == "22:00:00") echo "selected"; ?>>22:00</option>
                                <option value="22:30:00" <?php if ($row_DatosEvent['time_end'] == "22:30:00") echo "selected"; ?>>22:30</option>
                                <option value="23:00:00" <?php if ($row_DatosEvent['time_end'] == "23:00:00") echo "selected"; ?>>23:00</option>
                                <option value="23:30:00" <?php if ($row_DatosEvent['time_end'] == "23:30:00") echo "selected"; ?>>23:30</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="border-bottom:1px solid #999;" colspan="6" valign="middle" align="center">
                            <select class="text_input" style="width: 270px; font-size: 14px; color: #999;" name="status" id="status">
                                <option value="0" <?php if ($row_DatosEvent['status'] == 0) echo "selected"; ?>>On sale</option>
                                <option value="1" <?php if ($row_DatosEvent['status'] == 1) echo "selected"; ?>>Postponed</option>
                                <option value="2" <?php if ($row_DatosEvent['status'] == 2) echo "selected"; ?>>Ended</option>
                                <option value="3" <?php if ($row_DatosEvent['status'] == 3) echo "selected"; ?>>Draft</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td colspan="6" style="padding-top:10px;" nowrap="nowrap" align="center">
                            <input style="padding: 20px 125px;" type="submit" class="button" value="DONE" />
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
                <input type="hidden" name="MM_insert" id="MM_insert" value="formevent" />
            </form>
        </div>
    </div>
</div>