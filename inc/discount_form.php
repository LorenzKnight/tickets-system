<div class="subform_cont" style="" id="popup1">
    <div class="formulario">
        <form action="discount.php" method="post" name="formdiscount" id="formdiscount">
            <table width="85%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                <tr height="30">
                    <td colspan="2" valign="middle" align="center" style="color: #333; padding: 30px 0 0 0;">
                        <h3>New discount code</h3>
                    </td>
                </tr>
                <tr height="60">
                    <td colspan="2" style="border-bottom:1px solid #CCC;" valign="middle" align="center"><input class="text_input" style="text-align:center;" type="text" placeholder="CODE..." name="code" id="code" size="68" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" required/></td>
                </tr>
                <tr height="60">
                    <td colspan="2" valign="middle" align="center" style="color: #333; font-size:14px; border-bottom:1px solid #CCC;">
                        <input type="checkbox" id="show_hidden_tickets" name="show_hidden_tickets" value="1"> Use this code to reveal hidden tickets
                    </td>
                </tr>
                <tr height="60">
                    <td width="50%" valign="middle" align="right" style="color: #999; font-size:14px; padding: 0 10px;"><input class="text_input" type="text" placeholder="%" name="percent" id="percent" autocomplete="off" size="27" onkeyup="inputone()"/>  %</td>
                    <td width="50%" valign="middle" align="left" style="color: #999; font-size:14px; padding: 0 10px;"><input class="text_input" type="text" placeholder="0.00 $" name="money" id="money" autocomplete="off" size="27" onkeyup="inputtwo()"/> $</td>
                </tr>
                <tr valign="baseline" height="50">
                    <td width="50%" style="padding: 0 10px;" valign="middle" align="right">
                        <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="start_date" name="start_date" size="30" placeholder="Start date..." required/>
                    </td>
                    <td width="50%" style="padding: 0 10px;" valign="middle" align="left">
                        <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" id="stop_date" name="stop_date" size="30" placeholder="Sales end..." required/>
                    </td>
                </tr>
                <tr valign="baseline" height="50">
                    <td width="50%" style="color: #999; font-size:14px; padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="right">
                        <input class="text_input" type="text" placeholder="Quantity" id="quanti" name="quanti" size="28" required/> #
                    </td>
                    <td width="50%" style="padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="left">
                        
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
                <tr height="80">
                    <td colspan="2" valign="middle" align="left" style="font-size:14px; color: #333; padding:10px 20px; border-bottom:1px solid #CCC;">
                        <p>Tickets this code may change</p>

                        <input type="radio" id="selected_actions_only" name="selected_actions_only" value="0" onchange="permissions2(this.value);" checked="checked">
                        <label for="all">No course has been selected</label>
                        <br/>
                        <input type="radio" id="selected_actions_only" name="selected_actions_only" value="1" onchange="permissions2(this.value);">
                        <label for="selected">Choose course here</label>

                            <div id="actions" style="width:90%; padding: 5px 0; display:none;">
                                <table cellspacing="0" style="font-size:12px; text-align:left;">
                                    <tr height="10">
                                        <td width="" nowrap="nowrap" align="left" style="color:#666; padding: 2px 0 2px 22px; text-align:left;">
                                        <?php if ($row_DatosTickets > 0) { // Show if recordset not empty ?>
                                            <?php do { ?>
                                            <label class="switch">
                                                <input type="checkbox" id="id_ticket" name="id_ticket[]" value="<?php echo $row_DatosTickets['id_ticket']?>">
                                                <span class="slider round"></span>   
                                            </label>
                                            <?php echo $row_DatosTickets['ticket_name']?><br/>
                                            <?php } while ($row_DatosTickets = mysqli_fetch_assoc($DatosTickets)); 
                                        }
                                        else
                                        { // Show if recordset is empty ?>
                                        <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </td>
                </tr>
                <tr height="80">
                    <td colspan="2" valign="middle" align="center" style="color: #666; font-size: 14px;">
                            <!--<a href="tickets.php?eventno=<?php //echo $_GET['eventno']; ?>">--><a href="#" onclick="ocurtar()" ><input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" /></a> <input style="padding: 20px 65px;" type="submit" class="button" value="Save" onclick="ocurtar()"/>
                    </td>
                </tr>
                <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
                <input type="hidden" name="MM_insert" id="MM_insert" value="formdiscount" />
            </table>
        </form>
    </div>
</div>

<div class="subform_cont" id="popup2">
    <div style="width:100; height:100; background-color:#FFF; border:1px solid #999; text-align:center; margin:0 auto; padding:20px 0 0; display:none; z-index:200;">
        <p>listo</p>
    </div>
</div>

<?php if($_GET["editDiscount"]):?>
    <div class="subform_cont1">
        <div class="formulario">
            <form action="discount.php" method="post" name="formcodeedit" id="formcodeedit">
                <table width="85%" style="margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                    <tr height="30">
                        <td colspan="2" valign="middle" align="center" style="color: #333; padding: 30px 0 0 0;">
                            <h3>Edit discount code</h3>
                        </td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" valign="middle" align="center" style="border-bottom:1px solid #CCC;">
                            <input class="text_input" style="text-align:center;" type="text" value="<?php echo $row_DatosDiscountEdit['code'];?>" placeholder="CODE..." name="code" id="code" size="68" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" required/>
                        </td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" valign="middle" align="center" style="color: #333; font-size:14px; border-bottom:1px solid #CCC;">
                            <input type="checkbox" id="show_hidden_tickets" name="show_hidden_tickets" value="1" <?php if ($row_DatosDiscountEdit['show_hidden_tickets'] == 1) { ?>checked<?php } ?>> Use this code to reveal hidden tickets
                        </td>
                    </tr>
                    <tr height="60">
                        <td width="50%" valign="middle" align="right" style="color: #999; font-size:14px; padding: 0 10px;"><input class="text_input" type="text" value="<?php echo $row_DatosDiscountEdit['percent'];?>" placeholder="%" name="percent" id="percent" autocomplete="off" size="27" onkeyup="inputone()"/>  %</td>
                        <td width="50%" valign="middle" align="left" style="color: #999; font-size:14px; padding: 0 10px;"><input class="text_input" type="text" value="<?php echo $row_DatosDiscountEdit['money'];?>" placeholder="0.00 $" name="money" id="money" autocomplete="off" size="27" onkeyup="inputtwo()"/> $</td>
                    </tr>
                    <tr valign="baseline" height="50">
                        <td width="50%" style="padding: 0 10px;" valign="middle" align="right">
                            <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" value="<?php echo $row_DatosDiscountEdit['start_date'];?>" id="start_date" name="start_date" size="30" placeholder="Start date..." required/>
                        </td>
                        <td width="50%" style="padding: 0 10px;" valign="middle" align="left">
                            <input class="tcal" style="margin:5px 0; padding:12px 10px; border-radius:15px; font-size:12px; border: 1px solid rgb(84, 4, 231);" type="text" value="<?php echo $row_DatosDiscountEdit['stop_date'];?>" id="stop_date" name="stop_date" size="30" placeholder="Sales end..." required/>
                        </td>
                    </tr>
                    <tr valign="baseline" height="50">
                        <td width="50%" style="color: #999; font-size:14px; padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="right">
                            <input class="text_input" type="text" value="<?php echo $row_DatosDiscountEdit['quanti'];?>" placeholder="Quantity" id="quanti" name="quanti" size="28" required/> #
                        </td>
                        <td width="50%" style="padding: 0 10px; border-bottom:1px solid #CCC;" valign="middle" align="left">
                            
                        </td>
                    </tr>
                    <tr height="80">
                        <td colspan="2" valign="middle" align="left" style="font-size:14px; color: #333; padding:10px 20px; border-bottom:1px solid #CCC;">
                            <p>Tickets this code may change</p>

                            <input type="radio" id="selected_actions_only" name="selected_actions_only" value="1" checked="checked">
                            <label for="selected">Choose ticket here</label>

                                <div id="actions" style="width:90%; padding: 5px 0; display:block;">
                                    <table cellspacing="0" style="font-size:12px; text-align:left;">
                                        <tr height="10">
                                            <td width="" nowrap="nowrap" align="left" style="color:#666; padding: 2px 0 2px 22px; text-align:left;">
                                            <?php if ($row_DatosTicketsEdit > 0) { // Show if recordset not empty ?>
                                                <?php do { ?>
                                                <label class="switch">
                                                    <input type="checkbox" id="id_ticket" name="id_ticket[]" value="<?php echo $row_DatosTicketsEdit['id_ticket']?>" <?php if(showTicketPCode($_GET['editDiscount'], $row_DatosTicketsEdit['id_ticket'])) {?>checked<?php } ?>>  
                                                    <span class="slider round"></span>   
                                                </label>
                                                <?php echo $row_DatosTicketsEdit['ticket_name']?><br/>
                                                <?php } while ($row_DatosTicketsEdit = mysqli_fetch_assoc($DatosTicketsEdit)); 
                                            }
                                            else
                                            { // Show if recordset is empty ?>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                        </td>
                    </tr>
                    <tr height="80">
                        <td colspan="2" valign="middle" align="center" style="color: #666; font-size: 14px;">
                                <input class="button_a" style="width: 170px; padding: 20px 65px; text-align: center;" value="Cancel" onclick="history.back()"/> <input style="padding: 20px 65px;" type="submit" class="button" value="Save" onclick="javascript:return asegurar ();"/>
                        </td>
                    </tr>
                    <input type="hidden" name="id_adm_disc" id="id_adm_disc" value="<?php echo $_GET['editDiscount']; ?>"/>
                    <input type="hidden" name="MM_insert" id="MM_insert" value="formcodeedit" />
                </table>
            </form>
        </div>
    </div>
<?php endif ?>
<script>
    function asegurar()
    {
        rc = confirm("Är du säkert på den här ändring?");
        return rc;
    }

    function inputone()
    {
        var percent = document.getElementById("percent").value;
        if (percent != "")
        { 
            document.getElementById("money").disabled = true;
            document.getElementById("money").style.border="1px solid #F0F0F0";
        } else { 
            document.getElementById("money").disabled = false;
            document.getElementById("money").style.border="1px solid #999";
        }
    }

    function inputtwo()
    {
        var percent = document.getElementById("money").value;
        if (percent != "")
        { 
            document.getElementById("percent").disabled = true;
            document.getElementById("percent").style.border="1px solid #F0F0F0";
        } else { 
            document.getElementById("percent").disabled = false;
            document.getElementById("percent").style.border="1px solid #999";
        }
    }
</script>