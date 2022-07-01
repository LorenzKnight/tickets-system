<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="formular_flex" style="width:650px; margin: 80px auto;">
            <form action="payments.php" method="post" name="formevent" id="formevent">
                <table width="90%" align="center" cellspacing="0" class="list">
                    <tr valign="baseline" height="40">
                        <td style="" colspan="6" align="left" valign="middle">
                            <h1>Payment Options</h1>
                            <p style="font-size:14px; color:#999;">Manage how your attendees can pay you.</p>
                        </td>      
                    </tr>
                    <tr valign="baseline" height="40">
                        <td style="" colspan="6" align="left" valign="middle">
                        </td>      
                    </tr>
                    <tr valign="baseline" height="40">
                        <td style="" colspan="6" align="left" valign="middle">
                            <h2>Country & currency</h2>
                            <p style="font-size:14px; color:#999;">Choose the country & currency you're collecting money in. This determines which payment methods are available and can't be changed after an order is made.</p>
                        </td>      
                    </tr>

                    <tr valign="baseline" height="70">
                        <td width="50%" style="color: #999; font-size:14px;" valign="middle" align="left">
                            <select class="text_input" style="width: 250px; font-size: 14px; color: #999;" name="country" id="country" required>
                                <option value="" >Please select a country</option>
                                <?php if ($totalRows_DatosCountry > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosCountry['id_country']; ?>" <?php if ($row_DatosCountry['id_country'] == $row_DatosEvent['country']) echo "selected"; ?>><?php echo $row_DatosCountry['country_name']; ?></option>
                                <?php } while ($row_DatosCountry = mysqli_fetch_assoc($DatosCountry));
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td colspan="6" valign="middle" align="left">
                            <select class="text_input" style="width: 250px; font-size: 14px; color: #999;" name="currency" id="currency" required>
                                <option value="None" >Please select a currency</option>
                                <?php if ($totalRows_DatosCurrency > 0) {
                                    do { ?>
                                <option value="<?php echo $row_DatosCurrency['id_currency']; ?>" <?php if ($row_DatosCurrency['id_currency'] == $row_DatosEvent['currency']) echo "selected"; ?>><?php echo $row_DatosCurrency['exchange']; ?></option>
                                <?php } while ($row_DatosCurrency = mysqli_fetch_assoc($DatosCurrency));
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td colspan="6" valign="middle" align="left">
                            <h2>Sell tickets using</h2>
                            <div class="paycont">
                                <h4>Paypal</h4>
                                <p>PayPal Premier email or Business Account</p>
                                <input class="text_input" style="width:93%;" type="email" name="paypal_email" id="paypal_email" placeholder="E-mail for paypal..." value="<?php echo $row_DatosEvent['paypal_email']; ?>" required/>
                                <p>To process this currency in this country, you must use a PayPal merchant account</p>
                                <p>If you don't have a paypal account, <a href="https://www.paypal.com/us/webapps/mpp/paypal-checkout" target="_blank">set up an account here</a>.</p>
                                <ul>
                                    <li>Processing fees determined by PayPal and subject to change</li>
                                    <li>Separate monthly invoice for Eventbrite fees</li>
                                    <li>Certain features are not available to events using PayPal</li>
                                </ul>
                            </div>
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