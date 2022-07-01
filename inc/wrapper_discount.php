<?php include("inc/discount_form.php"); ?>
<?php include("inc/popup_msn.php"); ?>
<?php
	$dateNow = date("Y-m-d");

	$fecha2=time()+3600; //1 hours
    $timeNow = date("H:i:s",$fecha2); //000000 es por el formato de la base de datos
?>
<script>
    function asegurar_borrado()
    {
        rc = confirm("Är du säkert på att du vill radera den här register?");
        return rc;
    }
</script>
<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="tickets_div">
            <h1 style="margin-left:10px;">Discount codes</h1>
            <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0003") || $row_DatosUsuario['id_admin'] == "" ) : ?>
            <button class="button_2" style="margin:0 0 50px; float:right;" onclick="mostrar()">Create code</button>
            <?php endif ?> 
                <?php if ($row_DatosDiscount > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                    <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 5px; border-bottom: 1px solid #CCC;">
                        <tr class="line" height="80">
                            <td width="20%" nowrap="nowrap" align="center" style="padding: 0 0 0 0;"><?php echo $row_DatosDiscount['code']; ?></td>
                            <td width="20%" nowrap="nowrap" align="center" style="padding: 0 0 0 20px;"><?php if ($row_DatosDiscount['percent'] != "") { echo $row_DatosDiscount['percent']; ?> % <?php } else if ($row_DatosDiscount['money'] != "") { echo $row_DatosDiscount['money']; ?> kr <?php } else { ?>Code to reveal<?php } ?></td>
                            <td width="20%" nowrap="nowrap" align="center" style="padding: 0 0 0 0;"><?php echo codeUses($row_DatosDiscount['code']);?> / <?php echo $row_DatosDiscount['quanti']; ?></td>
                            <td width="30%" nowrap="nowrap" align="center" style="padding: 0 0 0 0;"><p style="font-size:11px;">Start: <?php echo $row_DatosDiscount['start_date']; ?></p> <p style="font-size:11px;">Stop: <?php echo $row_DatosDiscount['stop_date']; ?></p></td>
                            <td width="10%" nowrap="nowrap" align="center" style="padding: 0 10px 0 0;">
                                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0003") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                                <div class="arternative">
                                    <button class="artbtn">o o o</button>
                                    <div class="arternative-content">
                                        <a href="discount.php?eventno=<?php echo $_GET['eventno']; ?>&editDiscount=<?php echo $row_DatosDiscount['id_adm_disc']; ?>" class="alt_button">Edit</a>
                                        <a href="discount_delete.php?id=<?php echo $row_DatosDiscount['id_adm_disc']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado ();">Delete</a>
                                    </div>
                                </div>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                <?php } while ($row_DatosDiscount = mysqli_fetch_assoc($DatosDiscount)); 
                }
                else
                { // Show if recordset is empty ?>
                    <table width="100%" cellspacing="0" class="table_user" style="margin: 0 auto 15px; box-shadow: 0 .15rem 2rem 0 rgba(58,59,69,.15)!important;">
                        <tr class="line" height="80">
                            <td colspan="10" nowrap="nowrap" align="center" style="padding: 0 0 0 20px;">fins ingen register.</td>
                        </tr>
                    </table>
                <?php } ?>
            
        </div>
    </div>
</div>