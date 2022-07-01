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
<?php if($_GET["scan"]):?>
    <div class="subform_cont1">
        <div class="formulario2">
            <div class="camera_space">  
                <div class="scanner_header">
                    <div class="scaner_header_obtions">
                        <button onclick="sliderDown()" id="field_open">write<br>code</button>
                        <button onclick="sliderUp()" id="field_close">close</button>
                    </div>
                    <div class="scaner_header_center">
                        <h3><?php echo $row_DatosEvent['event_name']; ?></h3>
                        <p><?php echo $row_DatosEvent['event_start']; ?> <?php echo $row_DatosEvent['time_start']; ?> - <?php echo $row_DatosEvent['event_end']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
                        <?php //echo $_SESSION['tsys_UserId']; ?>
                    </div>
                    <div class="scaner_header_obtions">
                        <div class="close_button" onclick="window.location.href='onsite_checkin.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>';">+</div>
                    </div>
                </div>
                <div class="scanner_view">
                <form action="onsite_checkin.php" method="post" name="formticket" id="formticket">
                    <div class="slider_input" id="slider_input">
                        <input class="text_input" style="text-align:center; opacity: 0;" type="text" name="ticketsearch" id="ticketsearch" size="25" placeholder="Insert ticket No." value="<?php if($_GET['scan'] > 3) { echo $_GET['scan']; } ?>"/>
                    </div>
                    <?php if ($_GET["scan"] == 1) { ?>
                        <div class="camara_select">
                            <input class="checkbox-tools" type="radio" name="options" id="cam-1" value="1" autocomplete="off" checked>
                            <label class="for-checkbox-tools" id="cam1" for="cam-1">
                                Camera 1
                            </label>

                            <input class="checkbox-tools" type="radio" name="options" id="cam-2" value="2" autocomplete="off">
                            <label class="for-checkbox-tools" id="cam2" for="cam-2">
                                Camera 2
                            </label>

                            <input class="checkbox-tools" type="radio" name="options" id="cam-2" value="2" autocomplete="off">
                            <label class="for-checkbox-tools" id="cam3" for="cam-2">
                                Turn on
                            </label>
                        </div>
                        <video id="preview"></video>
                        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                        <!-- <script type="text/javascript" src="js/instascan.min.js"></script> -->
                        <script type="text/javascript">
                            var eventNo = "<?php echo $_GET['eventno']; ?>";
                            var scanner = new Instascan.Scanner({ 
                                                video: document.getElementById('preview'), 
                                                scanPeriod: 5, 
                                                mirror: false 
                                            });
                            scanner.addListener('scan',function(content){
                                //alert(content);
                                window.location.href = 'onsite_checkin.php?eventno='+ eventNo +'&scan=' + content
                                
                            });
                            Instascan.Camera.getCameras().then(function (cameras){
                                if(cameras.length>0){
                                    scanner.start(cameras[0]);
                                    $('[name="options"]').on('change',function(){
                                        if($(this).val()==1){
                                            if(cameras[0]!=""){
                                                scanner.start(cameras[0]);
                                            }else{
                                                alert('No Front camera found!');
                                            }
                                        }else if($(this).val()==2){
                                            if(cameras[1]!=""){
                                                scanner.start(cameras[1]);
                                            }else{
                                                alert('No Back camera found!');
                                            }
                                        }
                                    });
                                }else{
                                    console.error('No cameras found.');
                                    alert('No cameras found.');
                                }
                            }).catch(function(e){
                                console.error(e);
                                alert(e);
                            });
                        </script>
                    <?php } else { ?>
                        <div class="scaner_resultat_info" id="result">
                            <img src="../img/sys/camera.png">
                            
                            <?php if ($row_DatosGuestsIn['checkin'] < $row_DatosGuestsIn['product_type']) { ?>
                                <div class="etiqueta" style="background-color: green;">Ticket No. <?php if($_GET['scan'] > 3) { echo $_GET['scan']; } ?></div>
                            <?php } ?>
                            <?php if ($row_DatosGuestsIn['product_type'] == $row_DatosGuestsIn['checkin'] && $totalRows_DatosGuestsIn != 0) { ?>
                                <div class="etiqueta" style="background-color: red;">Already checked!</div>
                            <?php } ?>
                            <?php if ($totalRows_DatosGuestsIn == 0) { ?>
                                <div class="etiqueta" style="background-color: orange;">Ticket no found!</div>
                            <?php } ?>
                            
                            <a href="onsite_checkin.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&scan=1"><input class="button_a" value="RESET" /></a>
                        </div>
                    <?php } ?>
                    <?php if ($totalRows_DatosGuestsIn > 0) { ?>
                        <div class="scaner_foot">  
                            <?php if ($totalRows_DatosGuestsIn > 0) { ?>
                                <div class="espacio_info">
                                    <h4><?php echo ObtenerEventName($row_DatosGuestsIn['id_event']); ?></h4>
                                    <p><?php echo ticket_name($row_DatosGuestsIn['id_product']); ?></p>
                                    <p><?php echo ObtenerNombreGuest($row_DatosGuestsIn['id_user']); ?> <?php echo ObtenerApellidoGuest($row_DatosGuestsIn['id_user']); ?></p>
                                    <p><?php echo ObtenerNombrePGuest($row_DatosGuestsIn['id_user']); ?> <?php echo ObtenerApellidoPGuest($row_DatosGuestsIn['id_user']); ?></p>
                                </div>
                                <div class="espacio_boton">
                                    <?php if ($row_DatosGuestsIn['checkin'] < $row_DatosGuestsIn['product_type']) { ?>
                                        <input style="padding: 15px 45px;" type="submit" class="button_scaner" value="CHECKIN" />
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <input type="hidden" name="MM_insert" id="MM_insert" value="formticket" />
            </form>
            </div>
        </div>
    </div>
<?php endif ?>
<script>
    function sliderDown() {
        var slideinput = document.getElementById('slider_input');
        var field = document.getElementById('ticketsearch');

        var stylessliderinput = {
			"height": "90px",
            "transition": "ease-out 0.3s"
		};

        var stylesinput = {
            "opacity": "1",
            "transition": "ease-out 0.8s"
		};
        Object.assign(slideinput.style, stylessliderinput);
        Object.assign(field.style, stylesinput);

        document.getElementById("field_open").style.display="none";
        document.getElementById("field_close").style.display="block";
        // console.log('listo');
    }
    function sliderUp() {
        var slideinput = document.getElementById('slider_input');
        var field = document.getElementById('ticketsearch');

        var stylessliderinput = {
			"height": "0px",
            "transition": "ease-out 0.3s"
		};

        var stylesinput = {
            "opacity": "0",
            "transition": "ease-out 0.2s"
		};
        Object.assign(slideinput.style, stylessliderinput);
        Object.assign(field.style, stylesinput);

        document.getElementById("field_open").style.display="block";
        document.getElementById("field_close").style.display="none";
    }
</script>