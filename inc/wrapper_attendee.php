<?php include("inc/attendee_form.php"); ?>
<?php include("inc/popup_msn.php"); ?>
<script>
    function functionSubmit(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            // somefunction();
            var charCode = (typeof e.which === "13") ? e.which : e.keyCode;
        }
    }
</script>
<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="tickets_div">
            <h1 style="margin-left:10px;">Attendees</h1>
            <div style="width:100%;">
                <form action="attendee.php" method="get" name="formsearch" id="formsearch">
                    <input class="text_input" style="width:100%;" type="text" name="search" id="search" placeholder="Order #, Name or email" autocomplete="off" onkeyup="functionSubmit(event)"/>
                    <!-- <button type="submit" class="button_small">Sök</button> -->
                    <input type="hidden" name="eventno" id="eventno" value="<?php echo $_GET['eventno'];?>" />
                    <input type="hidden" name="MM_search" id="MM_search" value="formsearch" />
                </form>
            </div>
            <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0006") || $row_DatosUsuario['id_admin'] == "" ) : ?>
            <a href="attendee.php?eventno=<?php echo $_GET['eventno'];?>&new=1"><button class="button_2" style="margin:0 0 50px; float:right;">Create ticket</button></a>
            <?php endif ?>

            <?php if ($row_DatosPurchase > 0) { // Show if recordset not empty ?>
            <?php do { ?>
                <div class="table_attendee_lista" style="border-right: 3px solid <?php if($row_DatosPurchase['done'] == 0) {?>orange<?php } else { ?>green<?php } ?>;">
                    <div class="lined1_attendee_lista">
                        <p>Order # <?php echo $row_DatosPurchase['order_number']; ?></p>
                        <h3><?php echo $row_DatosPurchase['name']; ?> <?php echo $row_DatosPurchase['surname']; ?><?php if ($row_DatosPurchase['p_name'] != "" && $row_DatosPurchase['p_surname'] != "") :?> & <?php echo $row_DatosPurchase['p_name']; ?> <?php echo $row_DatosPurchase['p_surname']; ?><?php endif ?></h3>
                        <p><?php echo $row_DatosPurchase['email']; ?></p>
                    </div>
                    <div class="lined2_attendee_lista">
                        <?php echo ticket_id($row_DatosPurchase['id_purchase']); ?>
                    </div>
                    <div class="lined3_attendee_lista">
                        <?php echo $row_DatosPurchase['total']; ?> <?php echo $currency; ?>
                    </div>
                    <div class="lined4_attendee_lista">
                        <div class="box_indicator">
                            <?php if (comprobarTipoTicket($row_DatosPurchase['id_purchase']) == comprobarCheckin($row_DatosPurchase['id_purchase'])) { ?>
                                <a href="#" style="color:red;">Checked</a><br/><br/>
                            <?php } else { ?>
                                <a href="checkin_from_admin.php?attendeeID=<?php echo $row_DatosPurchase['id_purchase']; ?>" style="color:#3e8e41;">Check in</a><br/><br/>
                            <?php } ?>   
                            <div style="width:90%; margin:0 auto; display:flex;">
                            <?php if (comprobarTipoTicket($row_DatosPurchase['id_purchase']) == 2) { ?>
                                <div style="width:50%; height:10px; background-color:<?php if (comprobarCheckin($row_DatosPurchase['id_purchase']) > 0) { ?>#3e8e41<?php } else { ?>#FFF<?php } ?>; border:1px solid #3e8e41; flex:1;"></div>
                                <div style="width:50%; height:10px; background-color:<?php if (comprobarCheckin($row_DatosPurchase['id_purchase']) > 1) { ?>#3e8e41<?php } else { ?>#FFF<?php } ?>; border:1px solid #3e8e41; flex:1;"></div>
                            <?php } else { ?>
                                <div style="width:100%; height:10px; background-color:<?php if (comprobarCheckin($row_DatosPurchase['id_purchase']) > 0) { ?>#3e8e41<?php } else { ?>#FFF<?php } ?>; border:1px solid #3e8e41; flex:1;"></div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="lined5_attendee_lista">
                        <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0006") || $row_DatosUsuario['id_admin'] == "" ) : ?>
                        <div class="arternative">
                            <button class="artbtn">o o o</button>
                            <div class="arternative-content">
                                <a href="attendee_checkin.php?purchaseID=<?php echo $row_DatosPurchase['id_purchase']; ?>" class="alt_button">Checkin</a>
                                <a href="resend_email.php?purchaseID=<?php echo $row_DatosPurchase['id_purchase']; ?>" class="alt_button" onclick="javascript:return asegurar_reenviado ();">Resend Email</a>
                                <a href="attendee.php?eventno=<?php echo $_GET['eventno']; ?>&idPurchase=<?php echo $row_DatosPurchase['id_purchase']; ?>" class="alt_button">Edit info</a>
                                <a href="attendee.php?eventno=<?php echo $_GET['eventno']; ?>&changeOwner=<?php echo $row_DatosPurchase['id_purchase']; ?>" class="alt_button">Change owner</a>
                                <a href="attendee_delete.php?purchaseID=<?php echo $row_DatosPurchase['id_purchase']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado ();">Delete</a>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php } while ($row_DatosPurchase = mysqli_fetch_assoc($DatosPurchase)); 
            }
            else
            { // Show if recordset is empty ?>
                <div class="table_attendee_lista" style="display: flex; justify-content: center; align-items: center;">
                    <div class="noregister_lista">
                        There is no register.
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>