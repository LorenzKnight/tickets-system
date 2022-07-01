<?php if($_GET["discount"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <div class="ticket_lista">
                <div class="lista_header">
                    <h3 style="font-weight:200; margin:0;"><?php echo $row_DatosEvent['event_name']; ?></h3>
                    <p style="color:#666; font-size:11px; margin:0;"><?php echo $row_DatosEvent['event_start']; ?> <?php echo $row_DatosEvent['time_start']; ?> - <?php echo $row_DatosEvent['event_end']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
                    <?php //echo $date_past; ?>
                </div>
                <div class="tickets_view">
                    <div class="discountcode" id="code" style="display:none; opacity:0;">
                        <form action="events.php" method="post" name="discountrequest" id="discountrequest">
                            <table width="100%" cellspacing="0">
                                <tr height="40">
                                    <td nowrap="nowrap" align="center">
                                    </td>
                                </tr>
                                <tr height="30">
                                    <td nowrap="nowrap" align="center">
                                        <img src="../img/sys/almost_free.png" width="40%">
                                    </td>
                                </tr>
                                <tr height="30">
                                    <td style="font-size: 20px;" nowrap="nowrap" align="center">
                                        Do you have a code?
                                    </td>
                                </tr>
                                <tr height="90">
                                    <td nowrap="nowrap" align="center">
                                        <input class="disc_input" style="width: 70%; margin: 5px 0; padding: 12px 10px; border-radius: 15px; border: 1px solid rgb(84, 4, 231); font-size: 18px; text-align: center;" type="text" id="discountcode" name="discountcode" onkeyup="this.value = this.value.toUpperCase();"/>
                                    </td>
                                </tr>
                                <tr height="40">
                                    <td nowrap="nowrap" align="center">
                                    </td>
                                </tr>
                                <tr height="30">
                                    <td nowrap="nowrap" align="center">
                                        <input type="submit" style="padding: 15px 43px;" class="button_2" value="Ok!" />
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="MM_insert" id="MM_insert" value="discountrequest" />
                        </form>
                    </div>

                    <div class="discountcode" id="info">
                        <table width="100%" cellspacing="0">
                            <tr height="40">
                                <td nowrap="nowrap" align="center">
                                </td>
                            </tr>
                            <tr height="30">
                                <td nowrap="nowrap" align="center">
                                    <img src="../img/sys/ticketsgenerator.svg" alt="" id="" style="margin:0 40px 20px;" width="60%" height="">
                                </td>
                            </tr>
                            <tr height="90">
                                <td style="font-size: 18px;" nowrap="nowrap" align="center">
                                    <p>Ready to enjoy of</p>
                                    <h3 style="font-weight:200; margin:0;"><?php echo $row_DatosEvent['event_name']; ?>?</h3>
                                </td>
                            </tr>
                            <tr height="50">
                                <td nowrap="nowrap" align="center">
                                </td>
                            </tr>
                            <tr height="30">
                                <td nowrap="nowrap" align="center">
                                    <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&new=1"><input style="padding: 15px 5px;" class="button_2" value="Next" /></a>
                                    <br>
                                    <?php if ($_GET['discount'] == 2 ) { ?>
                                        <p style="font-size:12px; padding:0; color:red;">This code is not valid, try another code</p>
                                    <?php } ?>
                                    <button class="button_5" onclick="promocode()">I have a code!</button>
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="lista_foot">
                    <!-- <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&new=1"><input style="padding: 15px 5px; float:right;" class="button_2" value="Nästa" /></a> -->
                </div>
            </div>
            <div class="form_sidebar">
                <div class="small_banner">
                    <!-- <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a> -->
                    <a href="/e/clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="">
                </div>
                <div class="carrito">
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0px auto 0; padding:160px 0 0; color:#CCC;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center">
                                <img src="img/cart.png" style="width:40%; opacity:0.1;">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="price_bubble">
            <?php if($totalRows_DatosCart > 0) {?>
                <?php echo $preciototal; ?> <?php echo $currency; ?>
            <?php } ?>
        </div>
    </div>
<?php endif ?>

<?php $currency = ObtenerCurrency($row_DatosEvent['currency']); ?>
<?php if($_GET["new"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <div class="ticket_lista">
                <div class="lista_header">
                    <h3 style="font-weight:200; margin:0;"><?php echo $row_DatosEvent['event_name']; ?></h3>
                    <p style="color:#666; font-size:11px; margin:0;"><?php echo $row_DatosEvent['event_start']; ?> <?php echo $row_DatosEvent['time_start']; ?> - <?php echo $row_DatosEvent['event_end']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
                    <?php //echo $_SESSION['tsys_UserId']; ?>
                </div>
                <div class="tickets_view">

                    <?php if ($totalRows_DatosTickets > 0) {
                        do { ?>
                    <?php if (($row_DatosTickets['visibility'] < 2) || ($row_DatosTickets['visibility'] == 3 && getHiddenTicket(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosTickets['id_ticket']))): ?>
                    <div class="tickets_line">
                        <div class="tickets_line_left">
                            <h4 style="margin:5px 0;"><?php echo $row_DatosTickets['ticket_name']; ?></h4>
                            <?php $feePros = $row_DatosTickets['price'] / 100 * $procentFees ?>
                            <h5 style="margin:5px 0;"><?php echo $row_DatosTickets['price']; ?> <?php echo $currency; ?><span style="font-weight:200; color:#999;"> + <?php echo $feePros ?> <?php echo $currency; ?> Fee</span></h5>
                            <p style="font-size:14px; margin:5px 0; color:#999;">Sales end on <?php echo $row_DatosTickets['sales_end']; ?></p>
                            <p style="font-size:14px; margin:5px 0; color:#999;"><?php echo $row_DatosTickets['description']; ?></p>
                        </div>
                        <div class="tickets_line_right">
                            <?php if ($row_DatosTickets['visibility'] == 1 /* || stockSoldout($row_DatosTickets['id_ticket']) >= $row_DatosTickets['stock'] || ObtenerStockReal($row_DatosTickets['id_ticket']) >= $row_DatosTickets['stock']*/ ) { ?>
                            <?php //updateDisponProduct($row_DatosTickets['id_ticket'], stockSoldout($row_DatosTickets['id_ticket'])) ?>
                                <p style="font-size:14px; color:#999;">Ended</p>
                            <?php } else { ?>
                                <?php if (productosRestantes($row_DatosEvent['id_event'], $_SESSION['tsys_UserId'], $row_DatosTickets['id_ticket'])) { ?>
                                    <a style="font-size:14px;" href="cart_add.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>"><img src="img/icons/agregar_carrito.png"></a>
                                <?php } else { ?>
                                    <a style="font-size:14px;" href="cart_delete.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>"><img src="img/icons/delete.png"></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php } while ($row_DatosTickets = mysqli_fetch_assoc($DatosTickets));
                        }
                        ?>
                    <table width="80%" cellspacing="0" style="padding:15px 0; margin:0 auto;">
                        <tr height="50">
                            <td width="90%" nowrap="nowrap" align="left" style="padding: 0 0 0 10px;">
                                <p style="font-size:11px; color:#999;">Powered by <span style="color:#666; font-weight:600;">LK Productions</span></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="lista_foot">
                    <?php if($totalRows_DatosCart > 0) { ?>
                        <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&checkout=1"><input style="padding: 15px 5px; float:right;" class="button_2" value="Check out" /></a>
                    <?php } else { ?>
                        <a href=""><input style="padding: 15px 5px; float:right;" class="button_4" value="Check out" /></a>
                    <?php } ?>
                </div>
            </div>
            <div class="form_sidebar">
                <div class="small_banner">
                    <!-- <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a> -->
                    <a href="/e/clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="">
                    
                </div>
                <div class="carrito">
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                            <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                                <p>Code "<?php echo $row_DatosCartDiscount['discountcode']; ?>" <?php if(discPerc($row_DatosCartDiscount['discountcode']) != "") { echo discPerc($row_DatosCartDiscount['discountcode']); ?>% <?php } else { echo discMoney($row_DatosCartDiscount['discountcode']); ?>$<?php } ?> OFF in selected courses</p>
                            <?php endif ?>
                            </td>
                        </tr>
                    </table>
                <?php if ($totalRows_DatosCart > 0) { ?>
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="left" style="font-size:14px; font-weight:400; padding:10px 0;">
                                Order Summary 
                                <!-- <br/>Capitulo 41: Añadir más de un producto a la vez,
                                <br/>controlar que el producto ya está en nuestra cesta,
                                <br/>sumar, restar productos. -->
                            </td>
                        </tr>
                        <?php $preciosubtotal = 0; ?>
                        <?php if ($totalRows_DatosCart > 0) {
                        do { ?>
                        <!--/////////////////////////codigo que descuenta/////////////////////////-->
                        <?php if(getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) != "") {  
                            $rebajaCodigo = getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']); 
                            $discPercentMoney = ticket_price($row_DatosCart['id_product']) / 100 * $rebajaCodigo * $row_DatosCart['quantity'] ; 
                        } else { 
                            $discPercentMoney = getMonDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) * $row_DatosCart['quantity'];
                        } ?>

                        <tr height="40">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                <?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?>
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php $sumacantidatickets = ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                                <?php echo $sumacantidatickets; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        
                        <!--/////////////////////////codigo resutado sin descuento/////////////////////////-->
                        <?php $preciosubtotalNoDisc = $preciosubtotalNoDisc + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                        <?php $preciosubtotal = $preciosubtotal + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity'] - $discPercentMoney; ?>
                        <?php } while ($row_DatosCart = mysqli_fetch_assoc($DatosCart));
                        }
                        ?>
                        <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Discount
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php $rebaja = $preciosubtotalNoDisc - $preciosubtotal; ?>
                                - <?php echo $rebaja; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php endif ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Subtotal
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php echo $preciosubtotal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php
                        $procent = ObtenerFEES();

                        $fees = $preciosubtotal/100 * $procent;
                        
                        $preciototal = $preciosubtotal + $fees;
                        ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                Fees
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php echo $fees; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <tr height="60">
                            <td width="70%" nowrap="nowrap" align="left" style="font-weight:600; border-top:1px solid #CCC;">
                                Total
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-weight:600; border-top:1px solid #CCC;">
                                <?php echo $preciototal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:100px auto 0; color:#CCC;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center">
                                <img src="img/cart.png" style="width:40%; opacity:0.1;">
                            </td>
                        </tr>
                    </table>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="price_bubble">
            <?php if($totalRows_DatosCart > 0) {?>
                <?php echo $preciototal; ?> <?php echo $currency; ?>
            <?php } ?>
        </div>
    </div>
<?php endif ?>

<?php if($_GET["checkout"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <div class="ticket_lista">
                <div class="lista_header">
                    <h3>Checkout</h3>
                    <!-- <p style="font-size:9px; margin:0;"><?php //echo $_SESSION['tsys_UserId']; ?></p> -->
                </div>
                <div class="tickets_view">
                    <form action="events.php" method="post" name="formcheckout" id="formcheckout">
                        <div class="min_table" style="width:80%;">
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <h3 style="font-weight:400; margin:5px 0;">Contact Information</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="name" id="name" placeholder="First name*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="surname" id="surname" placeholder="Last name*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="email" name="email" id="email" placeholder="E-mail*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:left; padding: 5px 5px;">
                                    <h3 style="font-weight:400;">Payment method</h3>
                                    <p style="color:#666; font-size:14px; margin:5px 0;">Clicking 'Place Order' will open a new tab allowing you to pay with your PayPal account.</p>
                                    <p style="color:#666; font-size:14px; margin:5px 0;">Return to this page when you're finished.</p>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px;">
                                <div class="min_table_td" style="text-align:left; padding: 5px 5px;">
                                    <h3 style="font-weight:400;">Home address</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="adress1" id="adress1" placeholder="Adress 1*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="adress2" id="adress2" placeholder="Adress 2" value=""/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="city" id="city" placeholder="City*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="post" id="post" placeholder="Postal Code*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <select class="text_input" style="font-size: 14px; color: #999;" name="country" id="country*" required>
                                        <option value="">Choose a country</option>
                                        <?php if ($totalRows_DatosCountry> 0) {
                                            do { ?>
                                        <option value="<?php echo $row_DatosCountry['id_country']; ?>"><?php echo $row_DatosCountry['country_name']; ?></option>
                                        <?php } while ($row_DatosCountry = mysqli_fetch_assoc($DatosCountry));
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px;">
                                <div class="min_table_td" style="text-align:left; padding: 5px 5px;">
                                    <h3 style="font-weight:400;">Gender*</h3>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px; border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:left; padding: 5px 5px;">
                                    <input type="radio" id="sex" name="sex" value="0" required>
                                    <label for="male">Male</label><br/><br/>
                                    <input type="radio" id="sex" name="sex" value="1" required>
                                    <label for="female">Female</label><br/><br/>
                                    <input type="radio" id="sex" name="sex" value="2" required>
                                    <label for="other">Other</label>
                                </div>
                            </div>
                            <?php if (comprobarticketdoble($_SESSION['tsys_UserId'])) : ?>
                            <div class="min_table_tr" style="padding:0 15px;">
                                <div class="min_table_td" style="text-align:left; padding: 5px 5px;">
                                    <h3 style="font-weight:400;">Info about your partner</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="p_name" id="p_name" placeholder="First name*" value="" <?php if (comprobarticketdoble($_SESSION['tsys_UserId'])) echo "required"?> />
                                </div>
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="p_surname" id="p_surname" placeholder="Last name*" value="" <?php if (comprobarticketdoble($_SESSION['tsys_UserId'])) echo "required"?>/>
                                </div>
                            </div>
                            <div class="min_table_tr" style="border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <input class="text_input" type="text" name="p_email" id="p_email" placeholder="Your partner E-mail*" value="" <?php if (comprobarticketdoble($_SESSION['tsys_UserId'])) echo "required"?>/>
                                </div>
                            </div>
                            <?php endif ?>
                            <div class="min_table_tr" style="padding:20px 10px 10px;">
                                <div class="min_table_td" style="text-align:center; padding: 5px 5px;">
                                    <p style="font-size:12px; color:#999; text-align: justify;"><span style="color:#666; font-weight:600;">Important notice re COVID-19:</span> Please note any interaction with the general public poses an elevated risk of being exposed to COVID-19 and we cannot guarantee that you will not be exposed while in attendance at the event. Tickets Generator is not responsible for the health and safety of this event. We encourage you to follow the organizer’s safety policies, as well as local laws and restrictions.</p>
                                    <p style="font-size:12px; color:#999; text-align: justify;">By clicking "Place Order", I accept the Terms of Service and have read the Privacy Policy. I agree that Tickets Generator may share my information with the event organizer.</p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="lista_foot">
                    <input type="submit" style="padding: 15px 43px; float:right;" class="button_2" value="Place Order" />
                </div>
            </div>
            <div class="form_sidebar">
                <div class="small_banner">
                    <!-- <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a> -->
                    <a href="/e/clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="" width="100%">
                </div>
                <div class="carrito">
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                            <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                                <p>Code "<?php echo $row_DatosCartDiscount['discountcode']; ?>" <?php if(discPerc($row_DatosCartDiscount['discountcode']) != "") { echo discPerc($row_DatosCartDiscount['discountcode']); ?>% <?php } else { echo discMoney($row_DatosCartDiscount['discountcode']); ?>$<?php } ?> OFF in selected courses</p>
                            <?php endif ?>
                            </td>
                        </tr>
                    </table>
                    <?php if ($totalRows_DatosCart > 0) { ?>
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="left" style="font-size:14px; font-weight:400; padding:10px 0;">
                                Order Summary 
                                <!-- <br/>Capitulo 41: Añadir más de un producto a la vez,
                                <br/>controlar que el producto ya está en nuestra cesta,
                                <br/>sumar, restar productos. -->
                            </td>
                        </tr>
                        <?php $preciosubtotal = 0; ?>
                        <?php if ($totalRows_DatosCart > 0) {
                        do { ?>
                        <!--/////////////////////////codigo que descuenta/////////////////////////-->
                        <?php if(getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) != "") { ?>
                            <?php $rebajaCodigo = getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']); ?>
                            <?php $discPercentMoney = ticket_price($row_DatosCart['id_product']) / 100 * $rebajaCodigo * $row_DatosCart['quantity'] ; ?>
                        <?php } else { ?>
                            <?php $discPercentMoney = getMonDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) * $row_DatosCart['quantity'];?>
                        <?php } ?>

                        <tr height="40">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                <?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?>
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php $sumacantidatickets = ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                                <?php echo $sumacantidatickets; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        
                        <!--/////////////////////////codigo resutado sin descuento/////////////////////////-->
                        <?php $preciosubtotalNoDisc = $preciosubtotalNoDisc + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                        <?php $preciosubtotal = $preciosubtotal + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity'] - $discPercentMoney; ?>
                        <?php } while ($row_DatosCart = mysqli_fetch_assoc($DatosCart));
                        }
                        ?>
                        <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Discount
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php $rebaja = $preciosubtotalNoDisc - $preciosubtotal; ?>
                                - <?php echo $rebaja; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php endif ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Subtotal
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php echo $preciosubtotal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php
                        $procent = ObtenerFEES();

                        $fees = $preciosubtotal/100 * $procent;
                        
                        $preciototal = $preciosubtotal + $fees;
                        ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                Fees
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php echo $fees; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <tr height="60">
                            <td width="70%" nowrap="nowrap" align="left" style="font-weight:600; border-top:1px solid #CCC;">
                                Total
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-weight:600; border-top:1px solid #CCC;">
                                <?php echo $preciototal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                    </table>
                    <?php } else { ?>
                        <table width="80%" cellspacing="0" style="padding:10px 0; margin:100px auto 0; color:#CCC;">
                            <tr height="30">
                                <td colspan="2" nowrap="nowrap" align="center">
                                    <img src="../img/sys/cart.png" style="width:70%; opacity:0.1;">
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                        <input type="hidden" name="total" id="total" value="<?php echo $preciototal; ?>"/>
                        <input type="hidden" name="id_temp" id="id_temp" value="<?php echo $_SESSION['tsys_UserId']; ?>"/>
                        <input type="hidden" name="MM_insert" id="MM_insert" value="formcheckout" />
                    </form>
                </div>
            </div>
        </div>
        <div class="price_bubble">
            <?php echo $preciototal; ?> <?php echo $currency; ?>
        </div>
    </div>
<?php endif ?>

<?php if($_GET["payment"]):?>
    <script>
        $( document ).ready(function() {
            $( "#mybutton" ).trigger( "click" );
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $(function(){
        //         setTimeout(function(){
        //             window.location.href = $('.boton').attr('href'); // extrae el href de el boton
        //         },3000); // 3sg para redirecccionar
        //     });
        // });
    </script>
    <?php
    //$date = date('Ymd');

    $order_number = $row_DatosTemp['user_name'];
    $qr_bar_code = $row_DatosTemp['user_name'].'.png';
    $id_user = $_SESSION['tsys_UserId'];
    $id_event = $row_DatosTemp['id_event'];
    $name = $row_DatosTemp['name'];
    $surname = $row_DatosTemp['surname'];
    $email = $row_DatosTemp['email'];
    $adress1 = $row_DatosTemp['adress1'];
    $adress2 = $row_DatosTemp['adress2'];
    $city = $row_DatosTemp['city'];
    $post = $row_DatosTemp['post'];
    $country = $row_DatosTemp['country'];
    $sex = $row_DatosTemp['sex'];
    $p_name = $row_DatosTemp['p_name'];
    $p_surname = $row_DatosTemp['p_surname'];
    $p_email = $row_DatosTemp['p_email'];
    $payment = 1;
    $total = $row_DatosTemp['total'];

    $fecha2=time()+7200; //2 hours
    date("H:i:s",$fecha2);
    ?>
    <?php ConfirmacionPago(date('Y'), date('m'), date('d'), date("H:i:s",$fecha2), $order_number, $qr_bar_code, $id_user, $id_event, $name, $surname, $email, $adress1, $adress2, $city, $post, $country, $sex, $p_name, $p_surname, $p_email, $payment, $total); ?>
    
    <div class="subform_cont1">
        <div class="formulario">
            <div class="ticket_lista">
                <div class="lista_header">
                    <h3>Payment</h3>
                    <!-- <p style="font-size:9px; margin:0;"><?php //echo $_SESSION['tsys_UserId']; ?></p> -->
                </div>
                <div class="tickets_view" style="color:#FFF; background-color:#0070ba; background-image: linear-gradient(100deg,#0070ba,#1546a0);">
                    <div class="paypal">
                        <p>Order summary:</p>
                        <h3><?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?></h3>
                        <br/>
                        <h4>Total:</h4>
                        <h3><?php echo $total; ?> <?php echo $currency; ?></h3>
                        <br/>
                        <br/>
                        <p>Press to pay with paypal:</p>
                        <?php
                            define('PayPalExp', 0); /* 0 paypal, 1 paypal express */
                            if(PayPalExp) {
                        
                                include('paypal_checkout/config.php');
                                    $productName = ObtenerEventName($row_DatosTemp['id_event']);
                                    $currency = $currency;
                                    $productPrice = $total;
                                    $productId = 123456;
                                    $orderNumber = $order_number;
                                include 'paypal_checkout/paypalCheckout.php'; 
                            } else { 
                                define('PayPalLive', 1); /* 0 sandbox, 1 live paypal */
                                if(PayPalLive) { 
                                    //DATOS REAL
                                    $urlpaypal="https://www.paypal.com/cgi-bin/webscr";
                                    $mailpaypal= $row_DatosEvent['paypal_email'];
                                    $mailreceiver= $row_DatosEvent['paypal_email'];
                                } else {
                                    //DATOS FAKE
                                    $urlpaypal="https://www.sandbox.paypal.com/cgi-bin/webscr";
                                    $mailpaypal="sb-yb47yx1617798@business.example.com";
                                    $mailreceiver= $row_DatosEvent['paypal_email'];
                                }
                            ?>

                            <form action="<?php echo $urlpaypal;?>" method="post" id="paypal_form">
                                <input type="hidden" name="upload" value="1" />
                                <input type="hidden" name="amount" value="<?php echo $total; ?>"/>
                                <input type="hidden" name="business" value="<?php echo $mailpaypal;?>" />
                                <input type="hidden" name="receiver_email" value="<?php echo $mailreceiver;?>" />
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="charset" value="utf-8" />
                                <input type="hidden" name="currency_code" value="<?php echo $currency; ?>" />
                                <input type="hidden" name="item_name" value="<?php echo ObtenerEventName($row_DatosTemp['id_event']); ?> - Order number: <?php echo $row_DatosTemp['user_name']; ?>" />
                                <input type="hidden" name="payer_id" value="<?php echo $row_DatosTemp['id_temp']; ?>" />
                                <input type="hidden" name="payer_email" value="<?php echo ObtenerEmailTemp($row_DatosTemp['id_temp']); ?>" />
                                <input type="hidden" name="return" value="<?php echo $dominio; ?>/e/events.php?eventno=<?php echo $row_DatosTemp['id_event']; ?>&control=<?php echo $row_DatosTemp['id_temp']; ?>"/>
                                <input type="hidden" name="cancel_return" value="<?php echo $dominio; ?>/reg_error.php?control=<?php echo $row_DatosTemp['id_temp']; ?>" />
                                <input type="hidden" name="rm" value="2" />
                                <input type="hidden" name="bn" value="PRESTASHOP_WPS" />
                                <input type="hidden" name="cbt" value="Tillbaka till <?php echo $dominio; ?>/e/events.php?eventno=<?php echo $row_DatosTemp['id_event']; ?>" />
                                <input type="image" src="../img/sys/paypal_button.png" name="image" style="cursor: pointer; width: 260px;" />
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="lista_foot" style="text-align: center;">
                    <?php //echo ObtenerEmailTemp($row_DatosTemp['id_temp']); ?> <?php //echo $_SESSION['tsys_UserId']; ?> <?php //echo $dominio; ?>
                </div>
            </div>
            <div class="form_sidebar">
                <div class="small_banner">
                    <a href="/e/clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="" width="100%">
                </div>
                <div class="carrito">
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                            <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                                <p>Code "<?php echo $row_DatosCartDiscount['discountcode']; ?>" <?php if(discPerc($row_DatosCartDiscount['discountcode']) != "") { echo discPerc($row_DatosCartDiscount['discountcode']); ?>% <?php } else { echo discMoney($row_DatosCartDiscount['discountcode']); ?>$<?php } ?> OFF in selected courses</p>
                            <?php endif ?>
                            </td>
                        </tr>
                    </table>
                    <?php if ($totalRows_DatosCart > 0) { ?>
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="left" style="font-size:14px; font-weight:400; padding:10px 0;">
                                Order Summary
                            </td>
                        </tr>
                        <?php $preciosubtotal = 0; ?>
                        <?php if ($totalRows_DatosCart > 0) {
                        do { ?>
                        <!--/////////////////////////codigo que descuenta/////////////////////////-->
                        <?php if(getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) != "") { ?>
                            <?php $rebajaCodigo = getPorDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']); ?>
                            <?php $discPercentMoney = ticket_price($row_DatosCart['id_product']) / 100 * $rebajaCodigo * $row_DatosCart['quantity'] ; ?>
                        <?php } else { ?>
                            <?php $discPercentMoney = getMonDiscount(ObtenerDisc($_SESSION["tsys_UserId"], $_GET['eventno']), $row_DatosCart['id_product']) * $row_DatosCart['quantity'];?>
                        <?php } ?>

                        <tr height="40">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                <?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?>
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php $sumacantidatickets = ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                                <?php echo $sumacantidatickets; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <!--/////////////////////////codigo resutado sin descuento/////////////////////////-->
                        <?php $preciosubtotalNoDisc = $preciosubtotalNoDisc + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                        <?php $preciosubtotal = $preciosubtotal + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity'] - $discPercentMoney; ?>
                        <?php } while ($row_DatosCart = mysqli_fetch_assoc($DatosCart));
                        }
                        ?>
                        <?php if ($totalRows_DatosCartDiscount > 0) : ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Discount
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php $rebaja = $preciosubtotalNoDisc - $preciosubtotal; ?>
                                - <?php echo $rebaja; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php endif ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Subtotal
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php echo $preciosubtotal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php
                        $procent = ObtenerFEES();

                        $fees = $preciosubtotal/100 * $procent;
                        
                        $preciototal = $preciosubtotal + $fees;
                        ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                Fees
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php echo $fees; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <tr height="60">
                            <td width="70%" nowrap="nowrap" align="left" style="font-weight:600; border-top:1px solid #CCC;">
                                Total
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-weight:600; border-top:1px solid #CCC;">
                                <?php echo $preciototal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                    </table>
                    <?php } else { ?>
                        <table width="80%" cellspacing="0" style="padding:10px 0; margin:100px auto 0; color:#CCC;">
                            <tr height="30">
                                <td colspan="2" nowrap="nowrap" align="center">
                                    <img src="../img/sys/cart.png" style="width:70%; opacity:0.1;">
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                    <!-- ////QRcode de este numero de orden//// -->
                    <!-- <div style="width:200px; background-color:red; margin:0 auto;">
                        <?php //echo '<img src="'.$filename.'" width="200"/>'; ?>
                    </div> -->
                    <!-- ///////////////////////////////////// -->
                </div>
            </div>
        <?php 
            if(PayPalExp) {
            } else {
        ?>
            <div class="reminder" id="popup1">
                <h2>Important!</h2>
            
                <p>To get your ticket, you have to press the following button when Paypal is done processing your payment.</p>
                </br>
                <img src="img/paypal_done_2.png">
                </br>
                </br>
                </br>
                </br>
                <button class="button_2" style="padding: 15px 43px;" onclick="ocurtar()"> I've read and understand</button>  
            </div>
        <?php } ?>
        </div>
        <!-- <iframe style="top:0; left: 33.33%; display: block; position:absolute;" name="webs"
        src="<?php echo $urlpaypal;?>" frameborder="0" marginwidth="1" marginheight="0"
        width="33.33%" height="430"></iframe> -->

        
    </div>
<?php endif ?>

<?php if($_GET["control"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <div class="ticket_lista">
                <div class="lista_header">
                    <?php $permissionID = 'TSYS-P0021'; ?>
                    <h3 style="font-weight:200; margin:8px 0;">Done</h3>
                    <!-- <p style="font-size:9px; margin:0;"><?php //echo $_SESSION['tsys_UserId']; ?></p> -->
                </div>
                <div class="tickets_view" style="color:#999; ">
                        <div class="ticket_done">
                            <img src="../img/sys/ticketsgenerator.svg" alt="" id="" style="margin:5px 40px 0;" width="45%" height="">
                            <h2><?php echo $row_DatosPurchase['name']; ?>,</h2>
                            <h3>you're good to go</h3>
                            <img src="../img/sys/ticket_done.png" width="45%">
                            <h3>Keep your tickets handy</h3>
                            <p style="font-size:12px;">We have sent your ticket to <?php echo ObtenerEmailTemp($_SESSION['tsys_UserId']) ?></p>
                        </div>
                    <?php
                    $asunto = 'Order Notification for ' .$row_DatosEvent['event_name'];
                    
                    $contenido ='</td>
                        </tr>	
                        <tr height="">
                            <td nowrap="nowrap" align="center">
                                <img src="'.$dominio.'/img/sys/ticketsgenerator.png" alt="" id="" style="width:70%; margin:5px auto 20px;">
                            </td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" align="center"><h2>'.ObtenerEventName($row_DatosPurchase['id_event']).'</h2></td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" align="center">
                                <img src="'.$dominio.'/img/news/'.ObtenerEventBanner($row_DatosPurchase['id_event']).'" alt="" id="" style="width:90%; margin:5px auto;">
                            </td>
                        </tr>
                        <tr height="">
                            <td nowrap="nowrap" align="left" style="padding:0 30px;">
                            <br/>
                                <h4>'.$row_DatosPurchase['name'].' '.$row_DatosPurchase['surname'].' / '.$row_DatosPurchase['p_name'].' '.$row_DatosPurchase['p_surname'].'</h4>
                                <h4>Your ticket is a "'.ticket_name(cart_product_id($row_DatosPurchase['id_purchase'])).'"</h4>
                            </td>
                        </tr>
                        <tr height="">
                            <td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
                                Order total: '.$row_DatosPurchase['total'].' '.ObtenerCurrency(20).'<br/>
                                '.ObtenerEventStart($row_DatosPurchase['id_event']).' at '.ObtenerEventTimeStart($row_DatosPurchase['id_event']).' - '.ObtenerEventEnd($row_DatosPurchase['id_event']).' at '.ObtenerEventTimeEnd($row_DatosPurchase['id_event']).'<br/>
                                '.ObtenerEventAdress($row_DatosPurchase['id_event']).'
                            </td>
                        </tr>
                        <tr>
                            <td nowrap="nowrap" align="center">
                                <br/>
                                <img src="'.$dominio.'/img/qr_img/'.$row_DatosPurchase['qr_bar_code'].'" width="200"/>
                                <br/>
                                <h3>Order Number: '.$row_DatosPurchase['order_number'].'</h3>';
                    ?>
                    <?php $bcc = $row_DatosOrgMail['email']; ?>
                    <?php //$bcc .= 'Bcc: '.ObtenerEmailPartnerTemp($_SESSION['tsys_UserId']).'' . "\n"; ?>
                    <?php //$bcc .= 'Bcc: '.$row_DatosOrgMult['email'].'' . "\n"; ?>

                    <?php SendMailHtml(ObtenerEmailTemp($_SESSION['tsys_UserId']), $contenido, $asunto, $bcc); ?>

                    <?php funcionDone($_SESSION['tsys_UserId']); ?>
                    <?php ticketConfirmed($_SESSION['tsys_UserId']); ?>
                </div>
                <div class="lista_foot" style="text-align: center;">
                    <!-- <a href="/e/events.php?eventno=<?php //echo $_GET['eventno']; ?>"><input style="padding: 15px 5px; margin:12px auto;" class="button_2" value="Klar!" /></a> -->
                    <button style="padding: 15px 60px; margin:12px auto;" class="button_2" onclick="window.location.href='/e/clean_db.php?logout=<?php echo $_GET['eventno']; ?>'">Klart!</button>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>