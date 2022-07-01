<div class="container_in">
    <div class="content_dinamic">
        <h1>Events</h1>

        <div class="manage_filtro">
                <div class="manage_filtro_search">
                    <form action="manage.php" method="get" name="formsearch" id="formsearch">
                        <input class="text_input_s1" type="text" name="search" id="search" placeholder="Search event..." autocomplete="off"/>
                        <button type="submit" class="button_small" style="">Sök</button>
                        <input type="hidden" name="MM_search" id="MM_search" value="formsearch" />
                    </form>
                </div>
                <div class="manage_filtro_status">
                    <form action="manage.php" method="get" name="formstatus" id="formstatus">
                        <select class="text_input_s2" name="status" id="status" onchange="validarForm();">
                            <option value="" selected>All</option>
                            <option value="3" <?php if ($_GET['status'] == 3) echo "selected"; ?>>Draft</option>
                            <option value="0" <?php if ($_GET['status'] == 0) echo "selected"; ?>>On sale</option>
                            <option value="1" <?php if ($_GET['status'] == 1) echo "selected"; ?>>Postponed</option>
                            <option value="2" <?php if ($_GET['status'] == 2) echo "selected"; ?>>Ended</option>
                        </select>
                        <input type="hidden" name="MM_search" id="MM_search" value="formstatus" />
                        <!-- <input type="hidden" name="eventno" id="eventno" value="<?php //echo $_GET['eventno'];?>" /> -->
                    </form>  
                </div>
        </div>

        <div class="events_div">
            <div class="cabezera_manager">
                <div class="cabezera_mngr_event">Event</div>
                <div class="cabezera_mngr_sold">Sold</div>
                <div class="cabezera_mngr_gross">Gross</div>
                <div class="cabezera_mngr_status">Status</div>
                <div class="cabezera_mngr_menu">-</div>
            </div>



            <?php $precioTotal = 0; ?>
            <?php if ($row_DatosEvent > 0) { // Show if recordset not empty ?>
            <?php do { ?>

                <?php $identificador = $row_DatosEvent['id_event']; ?>

            <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-E$identificador") || $row_DatosUsuario['id_admin'] == "" ) : ?>
                <div class="line_manager" style=" background-color:<?php if ($row_DatosEvent['acount_no'] != ObtenerNumeroOrdenlUsuario($_SESSION['tks_UserId'])) { ?>#F0F0F0<?php } ?>;">
                    <a href="dashboard.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>">
                    <script>
                        function copy<?php echo $row_DatosEvent['id_event']; ?>(){
                            document.getElementById("url<?php echo $row_DatosEvent['id_event']; ?>").select();
                            document.execCommand("copy");

                            message.innerHTML = "Copied URL";

                            setTimeout(()=> message.innerHTML = "", 4000);
                        }
                    </script>
                    <?php $currency = ObtenerCurrency($row_DatosEvent['currency']); ?>
                    <div class="line_mngr_event">
                        <div style="width:100%; display:flex;">
                            <div class="line_mngr_fecha">
                                <?php echo $row_DatosEvent['event_start']; ?>
                            </div>
                            <div class="line_mngr_foto">
                                <img src='<?php if ($row_DatosEvent['foto'] != "") { ?> img/news/<?php echo $row_DatosEvent['foto']; ?> <?php } else { ?>  img/sys/not_img.png <?php } ?>' alt="" id="" style="width: 100%; position: relative; left:-10;">
                            </div>
                            <div class="line_mngr_description">
                                <h5><?php echo $row_DatosEvent['event_name']; ?></h5>
                                <input type="text" id="url<?php echo $row_DatosEvent['id_event']; ?>" style="opacity:0;" value="http://<?php echo $dominio; ?>/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>">
                                <p><?php echo $row_DatosEvent['event_adress']; ?><br/>
                                Ends <?php echo $row_DatosEvent['event_end']; ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="line_mngr_sold">
                        <?php echo ObtenerTicketsVendido($row_DatosEvent['id_event']); ?>/<?php echo ObtenerTicketsKvant($row_DatosEvent['id_event']); ?></br>
                        <?php 
                            $maxrange = ObtenerTicketsKvant($row_DatosEvent['id_event']);
                            $valuerange = ObtenerTicketsVendido($row_DatosEvent['id_event']);
                        ?>
                        <input type="range" id="myRange" value="<?php echo $valuerange; ?>" max="<?php echo $maxrange; ?>" class="range_input">
                        <div class="line_mngr_gross2">
                            <?php echo ObtenerGross($row_DatosEvent['id_event']); ?> <?php echo $currency ?>
                        </div>
                    </div>
                    <div class="line_mngr_gross">
                        <?php echo ObtenerGross($row_DatosEvent['id_event']); ?> <?php echo $currency ?>
                    </div>
                    <div class="line_mngr_status">
                        <?php echo visibilityEvent($row_DatosEvent['status']); ?>
                    </div>
                    </a>
                    <div class="line_mngr_menu">
                        <div class="arternative">
                            <button class="artbtn">o o o</button>
                            <div class="arternative-content">
                                <a href="<?php echo $dominio; ?>/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>" target="_bank" class="alt_button">View</a>
                                <a href="#" class="alt_button" onclick="copy<?php echo $row_DatosEvent['id_event']; ?>()">Copy URL</a>
                                <a href="event.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>" class="alt_button">Edit</a>
                                <a href="edit_event_status.php?postpone=<?php echo $row_DatosEvent['id_event']; ?>" class="alt_button" onclick="javascript:return asegurar_borrado();">Postpone</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php } while ($row_DatosEvent = mysqli_fetch_assoc($DatosEvent)); 
            }
            else
            { // Show if recordset is empty ?>
                <div class="line_vacio">
                    fins ingen register.
                </div>
            <?php } ?>
            <span style="color:red; font-size:12px; margin-left:30px;" id="message"></span>

            <a href="create.php"><div class="flying_button_resp">+</div></a>
        </div>
    </div>
    <div class="sidebar">
        <div style="width:100%; padding:55px 0 0; text-align:center;">
        <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0001") || $row_DatosUsuario['id_admin'] == "" ) : ?>
            <a href="create.php"><button class="button_2" value="Create event" >Create event</button></a>
        <?php endif ?>
        </div>

        <?php include("inc/barinfo.php"); ?>
    </div>
    
</div>