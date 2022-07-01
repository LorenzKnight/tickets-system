<script>
    var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}
</script>

<div class="container_in">
    <?php include("inc/sidebar_l.php"); ?>
    <div class="content_dinamic">
        <div class="formular_flex" style="width:650px; margin: 80px auto;">
            <form action="details.php" method="post" name="formevent" id="formevent">
                <table width="90%" align="center" cellspacing="0" class="list">
                    <tr valign="baseline" height="40">
                        <td style="" colspan="6" align="center" valign="middle">
                            <h1>Main Event Image</h1>
                            <p style="font-size:14px; color:#999;">This is the first image attendees will see at the top of your listing. Use a high quality image: 2160x1080px (2:1 ratio).</p>
                        </td>      
                    </tr>
                    <tr height="60">
                        <td colspan="2" valign="middle" align="center" style="border-bottom:1px solid #CCC; padding:20px 0;">
                            <script src="js/scriptupload.js"></script>
                            <?php 
                            //***********************BLOQUE INSERCION IMAGEN***********************//
                            //***********************PARÁMETROS DE IMAGEN**************************//
                            $random_digit = rand(0000,9999); 

                            $nombrecampoimagen="foto";
                            $nombrecampoimagenmostrar="fotopic";
                            $nombrecarpetadestino="img/news/"; //carpeta destino con barra al final
                            $nombrecampofichero="file1";
                            $nombrecampostatus="status1";
                            $nombrebarraprogreso="progressBar1";
                            $maximotamanofichero="0"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
                            $tiposficheropermitidos="jpg,jpeg,png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
                            $limiteancho="0"; // En píxels, "0" significa cualquier tamaño permitido
                            $limitealto="0"; // En píxels, "0" significa cualquier tamaño permitido
                                                                
                            $cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

                            //$cadenadeparametros="";  
                                                          
                            ?>
                                    <div class="foto_prev">
                                        <img src='<?php if ( $row_DatosEvent['foto'] != "") { ?> <?php echo $nombrecarpetadestino.$row_DatosEvent['foto']; ?> <?php } else { ?>  img/sys/not_img.png <?php } ?>' alt="" id="<?php echo $nombrecampoimagenmostrar;?>" style="height:100%;" width="">
                                    </div>
                                    <br>
                                    <input type="hidden" class="textf" size="40" name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosEvent['foto'];?>">
                                    <br>
                                    <input type="file" name="<?php echo $nombrecampofichero;?>" id="<?php echo $nombrecampofichero;?>">
                                    
                                    <input class="form-control" type="button" value="Upload file" onclick="uploadFile(<?php echo $cadenadeparametros;?>)">
                                    <br>
                                    <progress id="<?php echo $nombrebarraprogreso;?>" value="0" max="80" style="width: 80%;"></progress>
                                    <h5 id="<?php echo $nombrecampostatus;?>"></h5>
                            <?php /*?>
                            //******************FIN BLOQUE INSERCION IMAGEN*************************
                            <?php */?>
                        </td>
                    </tr>
                    <tr valign="baseline" height="40">
                        <td style="padding:20px 0;" colspan="6" align="center" valign="middle">
                            <h1>Description</h1>
                            <p style="font-size:14px; color:#999;">Add more details to your event like your schedule, sponsors, or featured guests.</p>
                        </td>      
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="padding:20px 0;" colspan="6" valign="middle" align="center">
                            <textarea class="text_input" style="width:100%;" type="text" placeholder="Write a short summary to get attendees excited" name="summary" id="summary" rows="4"><?php echo $row_DatosEvent['summary'];?></textarea>
                        </td>
                    </tr>
                    <tr valign="baseline" height="70">
                        <td style="" colspan="6" valign="middle" align="center">
                            <textarea class="text_input" style="width:100%;" type="text" name="description" id="description"><?php echo $row_DatosEvent['description'];?></textarea>
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