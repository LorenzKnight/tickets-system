<?php $currency = ObtenerCurrency($row_DatosEvent['currency']); ?>
<?php if($_GET["new"]):?>
<div class="subform_cont2">
    <div class="formulario_front">
        <div class="ticket_lista">
            <div class="lista_header">
                <h3><?php echo $row_DatosEvent['event_name']; ?></h3>
                <p style="color:#666; margin:0;"><?php echo $row_DatosEvent['event_start']; ?> <?php echo $row_DatosEvent['time_start']; ?> - <?php echo $row_DatosEvent['event_end']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
                <?php //echo $_SESSION['tsys_UserId']; ?>
            </div>
            <div class="tickets_view">
                <?php if ($totalRows_DatosTickets > 0) {
                    do { ?>
                <?php if ($row_DatosTickets['visibility'] < 2) : ?>

                <div class="tickets_line">
                    <?php if ($row_DatosTickets['stock'] <= $quant) : ?>
                            <?php ActualizacionTicketStatus(1, $row_DatosTickets['id_ticket'], $_GET['eventno']); ?>
                    <?php endif ?>
                    <?php if ($row_DatosTickets['sales_end'] == $dateNow && $row_DatosTickets['end_time'] <= $timeNow) : ?>
                            <?php ActualizacionTicketStatus(1, $row_DatosTickets['id_ticket'], $_GET['eventno']); ?>
                    <?php endif ?>



                    <!-- $fees = $preciosubtotal/100 * $procent; -->

                    <div class="tickets_line_left">
                        <h4><?php echo $row_DatosTickets['ticket_name']; ?></h4>
                        <?php $feePros = $row_DatosTickets['price'] / 100 * $procent ?>
                        <h5><?php echo $row_DatosTickets['price']; ?> <?php echo $currency; ?><span> + <?php echo $feePros; ?> <?php echo $currency; ?> Fee</span></h5>
                        <p>Sales end on <?php echo $row_DatosTickets['sales_end']; ?></p>
                        <p><?php echo $row_DatosTickets['description']; ?></p>
                    </div>
                    <div class="tickets_line_right">
                        <?php if ($row_DatosTickets['visibility'] == 1) { ?>
                            <p>Ended</p>
                        <?php } else { ?>
                            <?php if (productosRestantes($row_DatosEvent['id_event'], $_SESSION['tks_UserId'], $row_DatosTickets['id_ticket'])) { ?>
                                <a style="font-size:14px;" href="cart_add.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>"><img src="img/icons/agregar_carrito.png"></a>
                            <?php } else { ?>
                                <a style="font-size:14px;" href="cart_delete.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>"><img src="img/icons/delete.png"></a>
                            <?php } ?>
                            <!-- <a href="cart_add.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&ticketID=<?php echo $row_DatosTickets['id_ticket']; ?>">buy ticket</a>  -->
                        <?php } ?> 
                    </div>
                </div>

                
                
                <?php endif ?>
                <?php } while ($row_DatosTickets = mysqli_fetch_assoc($DatosTickets));
                    }
                    ?>
            </div>
            <div class="lista_foot">
                <a href="attendee.php?eventno=<?php echo $_GET['eventno'];?>&checkout=1"><button class="button_2" style="margin-right:20px; float: right;">Check out</button></a>
            </div>
        </div>
        <div class="form_sidebar">
            <div class="small_banner">
                <!-- <a href="attendee.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a> -->
                <a href="clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="" width="100%">
            </div>
            <div class="carrito2">
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
                        <tr height="40">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                <?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?>
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php echo ticket_price($row_DatosCart['id_product']); ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php $preciosubtotal = $preciosubtotal + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                        <?php } while ($row_DatosCart = mysqli_fetch_assoc($DatosCart));
                        }
                        ?>
                        <tr height="30">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                Subtotal
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999; border-top:1px solid #CCC;">
                                <?php echo $preciosubtotal; ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php
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
                    <table width="80%" cellspacing="0" style="padding:150px 0; margin:0px auto 0; color:#CCC;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="center">
                                <img src="img/sys/cart.png" style="width:40%; opacity:0.1;">
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
    <div class="subform_cont2">
        <div class="formulario_front">
            <div class="ticket_lista">
                <div class="lista_header">
                    <h3 style="font-weight:200; margin:8px 0;">Checkout</h3>
                    <!-- <p style="font-size:9px; margin:0;"><?php //echo $_SESSION['tsys_UserId']; ?></p> -->
                </div>
                <div class="tickets_view">
                    <form action="attendee.php" method="post" name="formcheckout" id="formcheckout">
                        <div class="min_table" style="width:80%;">
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <h3>Contact Information</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="name" id="name" placeholder="First name*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="surname" id="surname" placeholder="Last name*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="email" name="email" id="email" placeholder="E-mail*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px; border-top: 1px solid #CCC; border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:left;">
                                    <h3>Payment method</h3>
                                    <p>Clicking 'Place Order' will open a new tab allowing you to pay with your PayPal account.</p>
                                    <p>Return to this page when you're finished.</p>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px;">
                                <div class="min_table_td" style="text-align:left;">
                                    <h3>Home address</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="adress1" id="adress1" placeholder="Adress 1*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="adress2" id="adress2" placeholder="Adress 2" value=""/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="city" id="city" placeholder="City*" value="" required/>
                                </div>
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="post" id="post" placeholder="Postal Code*" value="" required/>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <select class="text_input" style="color: #999;" name="country" id="country*" required>
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
                                <div class="min_table_td" style="text-align:left;">
                                    <h3>Gender*</h3>
                                </div>
                            </div>
                            <div class="min_table_tr" style="padding:0 15px; border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:left;">
                                    <input class="radio_tickets" type="radio" id="sex" name="sex" value="0">
                                    <label class="radiolaber_tickets" for="male">Male</label><br/><br/>
                                    <input class="radio_tickets" type="radio" id="sex" name="sex" value="1">
                                    <label class="radiolaber_tickets" for="female">Female</label><br/><br/>
                                    <input class="radio_tickets" type="radio" id="sex" name="sex" value="2">
                                    <label class="radiolaber_tickets" for="other">Other</label>
                                </div>
                            </div>
                            <?php if (comprobarticketdoble($_SESSION['tks_UserId'])) { ?>
                            <div class="min_table_tr" style="padding:0 15px;">
                                <div class="min_table_td" style="text-align:left;">
                                    <h3>Info about your partner</h3>
                                </div>
                            </div>
                            <div class="min_table_tr">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="p_name" id="p_name" placeholder="First name*" value=""/>
                                </div>
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="p_surname" id="p_surname" placeholder="Last name*" value=""/>
                                </div>
                            </div>
                            <div class="min_table_tr" style="border-bottom: 1px solid #CCC;">
                                <div class="min_table_td" style="text-align:center;">
                                    <input class="text_input" type="text" name="p_email" id="p_email" placeholder="Your partner E-mail*" value=""/>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="min_table_tr" style="padding:20px 10px 10px;">
                                <div class="min_table_td" style="text-align:center;">
                                    
                                </div>
                            </div>
                        </div>
                </div>
                <div class="lista_foot">
                    <input type="submit" style="margin-right:20px; padding: 15px 43px; float:right;" class="button_2" value="Place Order" />
                </div>
            </div>
            <div class="form_sidebar">
                <div class="small_banner">
                    <!-- <a href="attendee.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a> -->
                    <a href="clean_db.php?close=<?php echo $row_DatosEvent['id_event']; ?>"><div class="flying_button">+</div></a>
                    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="" width="100%">
                </div>
                <div class="carrito2">
                    <?php if ($totalRows_DatosCart > 0): ?>
                    <table width="80%" cellspacing="0" style="padding:10px 0; margin:0 auto;">
                        <tr height="30">
                            <td colspan="2" nowrap="nowrap" align="left" style="font-size:14px; font-weight:400; padding:10px 0;">
                                Order Summary
                            </td>
                        </tr>
                        <?php $preciosubtotal = 0; ?>
                        <?php if ($totalRows_DatosCart > 0) {
                        do { ?>
                        <tr height="40">
                            <td width="70%" nowrap="nowrap" align="left" style="font-size:14px; color:#999;">
                                <?php echo $row_DatosCart['quantity']; ?> x <?php echo ticket_name($row_DatosCart['id_product']); ?>
                            </td>
                            <td width="30%" nowrap="nowrap" align="center" style="font-size:14px; color:#999;">
                                <?php echo ticket_price($row_DatosCart['id_product']); ?> <?php echo $currency; ?>
                            </td>
                        </tr>
                        <?php $preciosubtotal = $preciosubtotal + ticket_price($row_DatosCart['id_product']) * $row_DatosCart['quantity']; ?>
                        <?php } while ($row_DatosCart = mysqli_fetch_assoc($DatosCart));
                        }
                        ?>
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
                    <?php endif ?>
                        <?php $random_digit = rand(00000000,99999999); ?>
                        <input type="hidden" name="total" id="total" value="<?php echo $preciototal; ?>"/>
                        <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
                        <input type="hidden" name="order_number" id="order_number" value="<?php echo $random_digit; ?>"/>
                        <input type="hidden" name="qr_bar_code" id="qr_bar_code" value="<?php echo $random_digit.'.png'; ?>"/>
                        <input type="hidden" name="status" id="status" value="1"/>
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

<?php if($_GET["done"]):?>
	<?php
     require 'qrcode/qrlib.php';

	 $dir = 'img/qr_img/';
	 $qr_number = $row_DatosQR['order_number'];

     if (!file_exists($dir))
            mkdir($dir);

            $filename = $dir. $qr_number.'.png';

            $tamanio = 10;
            $level = 'M';
            $frameSize = 3;
            $contenido = $qr_number;

            QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

            //echo '<img src="'.$filename.'" width="200"/>';
    ?>
    <?php
        $asunto = 'Order Notification for' .$row_DatosEvent['event_name'];
        
        $contenido = '<h2>'.ObtenerEventName($row_DatosPurchaseMail['id_event']).'</h2>
                </td>
            </tr>
            <tr>
                <td nowrap="nowrap" align="center">
                    <img src="'.$dominio.'/img/news/'.ObtenerEventBanner($row_DatosPurchaseMail['id_event']).'" alt="" id="" style="width:90%; margin:5px auto;">
                </td>
            </tr>
            <tr height="">
                <td nowrap="nowrap" align="left" style="padding:0 30px;">
                <br/>
                    <h4>'.$row_DatosPurchaseMail['name'].' '.$row_DatosPurchaseMail['surname'].' / '.$row_DatosPurchaseMail['p_name'].' '.$row_DatosPurchaseMail['p_surname'].'</h4>
                    <h4>Your ticket is a "'.ticket_name(cart_product_id($row_DatosPurchaseMail['id_purchase'])).'"</h4>
                </td>
            </tr>
            <tr height="">
                <td nowrap="nowrap" align="left" style="color:#666; font-size:14px; padding:0 30px;">
                    Order total: '.$row_DatosPurchaseMail['total'].' '.ObtenerCurrency(20).'<br/>
                    '.ObtenerEventStart($row_DatosPurchaseMail['id_event']).' at '.ObtenerEventTimeStart($row_DatosPurchaseMail['id_event']).' - '.ObtenerEventEnd($row_DatosPurchaseMail['id_event']).' at '.ObtenerEventTimeEnd($row_DatosPurchaseMail['id_event']).'<br/>
                    '.ObtenerEventAdress($row_DatosPurchaseMail['id_event']).'
                </td>
            </tr>
            <tr>
                <td nowrap="nowrap" align="center">
                    <br/>
                    <img src="'.$dominio.'/img/qr_img/'.$row_DatosPurchaseMail['qr_bar_code'].'" width="200"/>
                    <br/>
                    <h3>Order Number: '.$row_DatosPurchaseMail['order_number'].'</h3>';
    ?>
    <?php SendMailHtml($row_DatosPurchaseMail['email'], $contenido, $asunto, $row_DatosPurchaseMail['p_email']); ?>
<?php endif ?>

<div class="slider_form" id="editpurchase">
    <div class="capsula_slider" id="capsula1">
            <div class="form_slide_head">
                <h3>Edit Info</h3>
            </div>
        <form action="attendee.php" method="post" name="formediti" id="formediti">
            <table class="tickets_table" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center" style="border-bottom:1px solid #F0F0F0;">
                        <p><?php echo ticket_id($row_DatosEditPurchase['id_purchase']); ?></p>
                        <p class="att_orderno">Order # <?php echo $row_DatosEditPurchase['order_number']; ?></p>
                    </td>
                </tr>
                <tr height="60">
                    <td class="tickets_line1" valign="middle" align="right">
                        <input class="text_input" type="text" placeholder="Name" name="name" id="name" value="<?php echo $row_DatosEditPurchase['name'];?>" style="width: 98%;" required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left">
                        <input class="text_input" type="text" placeholder="Surname" name="surname" id="surname" value="<?php echo $row_DatosEditPurchase['surname'];?>" style="width: 98%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <input class="text_input" type="text" placeholder="Tickets name..." name="email" id="email" value="<?php echo $row_DatosEditPurchase['email'];?>" style="width: 95%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <p>Home address</p>
                    </td>
                </tr>
                <tr height="60">
                    <td class="tickets_line1" valign="middle" align="right" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Adress 1*" name="adress1" id="adress1" value="<?php echo $row_DatosEditPurchase['adress1'];?>" style="width: 98%;" required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Adress 2" name="adress2" id="adress2" value="<?php echo $row_DatosEditPurchase['adress2'];?>" style="width: 98%;"/>
                    </td>
                </tr>
                <tr height="60">
                    <td class="tickets_line1" valign="middle" align="right" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Adress 1*" name="city" id="city" value="<?php echo $row_DatosEditPurchase['city'];?>" style="width: 98%;"/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left" style="border-bottom:1px solid #F0F0F0;">
                        <input class="text_input" type="text" placeholder="Adress 2" name="post" id="post" value="<?php echo $row_DatosEditPurchase['post'];?>" style="width: 98%;"/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <select class="text_input" style="color: #999;" name="country" id="country" required>
                            <option value="">Choose a country</option>
                            <?php if ($totalRows_DatosCountry> 0) {
                                do { ?>
                            <option value="<?php echo $row_DatosCountry['id_country']; ?>" <?php if ($row_DatosCountry['id_country'] == $row_DatosEditPurchase['country']) echo "selected"; ?>><?php echo $row_DatosCountry['country_name']; ?></option>
                            <?php } while ($row_DatosCountry = mysqli_fetch_assoc($DatosCountry));
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <?php if (ticketsTyp($row_DatosEditPurchase['id_purchase']) == 2) { ?>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <p>Info about your partner</p>
                    </td>
                </tr>
                <tr height="60">
                    <td class="tickets_line1" valign="middle" align="right">
                        <input class="text_input" type="text" placeholder="Name" name="p_name" id="p_name" value="<?php echo $row_DatosEditPurchase['p_name'];?>" style="width: 98%;" required/>
                    </td>
                    <td class="tickets_line1" valign="middle" align="left">
                        <input class="text_input" type="text" placeholder="Surname" name="p_surname" id="p_surname" value="<?php echo $row_DatosEditPurchase['p_surname'];?>" style="width: 98%;" required/>
                    </td>
                </tr>
                <tr>
                    <td class="tickets_line2" colspan="2" valign="middle" align="center">
                        <input class="text_input" type="text" placeholder="Tickets name..." name="p_email" id="p_email" value="<?php echo $row_DatosEditPurchase['p_email'];?>" style="width: 95%;" required/>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="form_slide_foot">
                <button type="button" class="button_a" onclick="cerraredit()">Cancel</button> <button style="padding: 20px 65px;" type="button" class="button" onclick="enviaredit()">Save</button>
            </div>
            <input type="hidden" name="id_purchase" id="id_purchase" value="<?php echo $_GET['idPurchase']; ?>"/>
            <input type="hidden" name="MM_insert" id="MM_insert" value="formediti" />
        </form>
    </div>
</div>