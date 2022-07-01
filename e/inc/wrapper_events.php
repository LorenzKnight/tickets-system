<?php include("inc/tickets_form.php"); ?> 
<div class="headbanner">
    <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="">
</div>
<div class="container">
    <div class="overhead">
        <div class="banner">
            <img src="../img/news/<?php echo $row_DatosEvent['foto']; ?>" alt="" id="" style="" width="100%" height="120%">
        </div>
        <div class="summary">
            <p style="color:#666;"><?php echo $row_DatosEvent['event_start']; ?></p>
            <h3 style="font-weight:400;"><?php echo $row_DatosEvent['event_name']; ?></h3>
            <p style="color:#666;">by <?php echo ObtenerNombreUsuario($row_DatosEvent['organizer']); ?> <?php echo ObtenerApellidoUsuario($row_DatosEvent['organizer']); ?></p>

            <?php
                $dateNowDayBefore = date('Y-m-d');
                $date_past = strtotime('-1 month', strtotime($dateNowDayBefore));
                $date_past = date('m', $date_past);
                
                
                // echo $feesPM;
                
            ?>
        </div>
    </div>
    <div class="buyfijo">
    <?php if($row_DatosEvent['end_datetime'] > $dateNow) { ?>
        <?php $random_digit = rand(00000000,99999999); ?>
        <form style="margin:0;" action="temp_login.php" method="post" name="formrequest" id="formrequest">
            <input type="hidden" name="user_name" id="user_name" value="<?php echo $random_digit; ?>"/>
            <input type="hidden" name="password" id="password" value="tempuser2468"/>
            <input type="hidden" name="id_event" id="id_event" value="<?php echo $_GET['eventno']; ?>"/>
            <input type="hidden" name="MM_insert" id="MM_insert" value="formrequest" />
            <input type="submit" style="padding: 15px 105px;" class="button_3" value="Buy ticket" />
        </form>
    <?php } else { ?>
        <div class="salesended">
            Sales ended
        </div>
    <?php } ?>
    </div>
    <div class="contenido">
        <div class="buy">
        <?php if($row_DatosEvent['end_datetime'] > $dateNow) { ?>
            <a href="/e/events.php?eventno=<?php echo $row_DatosEvent['id_event']; ?>&discount=1"><input style="padding: 15px 60px;" class="button_3" value="Buy ticket" /></a>
        <?php } else { ?>
            <div class="salesended">
                Sales ended
            </div>
        <?php } ?>
        </div>
        <div class="description">
            <h5><?php echo $row_DatosEvent['summary']; ?></h5>
            
            <h3>About this event</h3>

            <p style="color:#666; font-size:14px;"><?php echo $row_DatosEvent['description']; ?></p>
        </div>
        <div class="sidebar_r">
            <h4 style="font-weight:400; color:#333;">Date and Time</h4>
            <p style="color:#666; font-size:14px; margin:0;"><?php echo $row_DatosEvent['event_start']; ?> <?php echo $row_DatosEvent['time_start']; ?> -</p>
            <p style="color:#666; font-size:14px; margin:0;"><?php echo $row_DatosEvent['event_end']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
            
            <h4 style="font-weight:400; color:#333;">Location</h4>
            <p style="color:#666; font-size:14px; margin:0;"><?php echo $row_DatosEvent['event_adress']; ?> <?php echo $row_DatosEvent['time_end']; ?></p>
        </div>
    </div>
    <!-- <div id="mapa">
        --ACA VA NUESTRO MAPA--
    </div> -->
</div>
<script type="text/javascript">
    // var divMapa = document.getElementById('mapa');
    // navigator.geolocation.getCurrentPosition( fn_ok, fn_mal );
    // function fn_mal() { }
    // function fn_ok(rta) {
    //     var lat = rta.coords.latitude;
    //     var lon = rta.coords.longitude;

    //     var gLatLon = new google.maps.LatLng(lat, lon);
    //     var objConfig = {
    //         zoom: 17,
    //         center: gLatLon
    //     }

    //     var gMapa = new google.maps.Map(divMapa, objConfig);
    //     var objConfigMarker = {
    //         position: gLatLon,
    //         map: gMapa,
    //         title: "Usted esta aca"
    //     }

    //     var gMarker = new google.maps.Marker(objConfigMarker);

    //     var gCoder = new google.maps.Geocoder();
    //     var objInformacion = {
    //         address: 'Ånäsvägen 44, Göteborg'
    //     }
    //     gCoder.geocode(objInformacion, fn_coder);

    //     function fn_coder(datos) {
    //         var coordenadas = datos[0].geometry.location; //obj LatLong
    //         var config = {
    //             map: gMapa,
    //             position: coordenadas,
    //             title: 'Loops'
    //         }
    //         var gMarkerDV = new google.maps.Marker(config);
    //     }
    // }


    // intrucciones aqui
    // https://www.youtube.com/watch?v=GLO5wtHWPyM
    // https://www.youtube.com/watch?v=c35r-vnrMr4&t=0s
</script>