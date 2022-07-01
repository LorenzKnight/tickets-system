<?php
    $query_DatosEvent = sprintf("SELECT * FROM events WHERE id_event=%s",
                                    GetSQLValueString($_GET['eventno'], "int")); 
    $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
    $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
    $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
    $query_DatosUsuarioInSideBar = sprintf("SELECT * FROM users WHERE id_user=%s", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
    $DatosUsuarioInSideBar = mysqli_query($con, $query_DatosUsuarioInSideBar) or die(mysqli_error($con));
    $row_DatosUsuarioInSideBar = mysqli_fetch_assoc($DatosUsuarioInSideBar);
    $totalRows_DatosUsuarioInSideBar = mysqli_num_rows($DatosUsuarioInSideBar);
?>
<div class="sidebar_l" id="sidebar_l">
    <div class="sidebar_capsule">
        <h2><?php echo $row_DatosEvent['event_name']; ?></h2>
        <p><?php echo $row_DatosEvent['event_start']; ?></p>
        
        <div class="sidemenu">
            <ul>
                <a href="manage.php"><li id="abox">Switch Event</li></a>

                <a href="#" onclick="menulink(0)" <?php if ($menuactive == 0) { ?> class="active" <?php }?>><li>Dashboard</li></a>
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0002") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                <a href="#" onclick="menulink(1)" <?php if ($menuactive == 1) { ?> class="active" <?php }?>><li>Details</li></a>
                <a href="#" onclick="menulink(2)" <?php if ($menuactive == 2) { ?> class="active" <?php }?>><li>Basic info</li></a>
                <?php endif ?>
                <a href="#" onclick="menulink(3)" <?php if ($menuactive == 3) { ?> class="active" <?php }?>><li>Ticket</li></a> 
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0005") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                <a href="#" onclick="menulink(4)" <?php if ($menuactive == 4) { ?> class="active" <?php }?>><li>Manage Attendees</li></a> 
                <?php endif ?>
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0008") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                <a href="#" onclick="menulink(5)" <?php if ($menuactive == 7) { ?> class="active" <?php }?>><li>Discount / Access Codes</li></a> 
                <?php endif ?>
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0004") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                <a href="#" onclick="menulink(6)" <?php if ($menuactive == 5) { ?> class="active" <?php }?>><li>Payments Options</li></a> 
                <?php endif ?>
                <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0012") || $row_DatosUsuarioInSideBar['id_admin'] == "" ) : ?>
                <a href="#" onclick="menulink(7)" <?php if ($menuactive == 6) { ?> class="active" <?php }?>><li>On Site Check-in</li></a> 
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
<div class="sidemenu_btn" id="sidemenu_btn">
    <div class="menu_btn" id="menu_btn" onclick="menuslider()">menu</div>
    <div class="close_btn" id="close_btn" onclick="closemenu()">close</div>
</div>
<script>
    function menuslider() {
        var sidemenu = document.getElementById('sidebar_l');
        var menubtn = document.getElementById('sidemenu_btn');
        var menu = document.getElementById('menu_btn');

        var stylessidebar_l = {
			"width": "600px",
            "transition": "ease-out 0.3s",
            "animation": "none"
		};
        var stylesbtn = {
            "background-color": "red",
			"margin-left": "600px",
            "transition": "ease-out 0.3s",
            "animation": "none"
		};
        
        Object.assign(sidemenu.style, stylessidebar_l);
        Object.assign(menubtn.style, stylesbtn);
        document.getElementById("menu_btn").style.display="none";
        document.getElementById("close_btn").style.display="block";
    }
    function closemenu() {
        var sidemenu = document.getElementById('sidebar_l');
        var menubtn = document.getElementById('sidemenu_btn');

        var stylessidebar_l = {
			"width": "0px",
            "transition": "ease-out 0.3s"
		};
        var stylesbtn = {
            "background-color": "green",
			"margin-left": "0px",
            "transition": "ease-out 0.3s"
		};

        Object.assign(sidemenu.style, stylessidebar_l);
        Object.assign(menubtn.style, stylesbtn);
        document.getElementById("menu_btn").style.display="block";
        document.getElementById("close_btn").style.display="none";
    }
    if (screen.width < 1024) {
        function menulink(referencia) {
            var sidemenu = document.getElementById('sidebar_l');
            var menubtn = document.getElementById('sidemenu_btn');

            var stylessidebar_l = {
                "width": "0px",
                "transition": "ease-out 0.3s"
            };
            var stylesbtn = {
                "background-color": "green",
                "margin-left": "0px",
                "transition": "ease-out 0.3s"
            };

            Object.assign(sidemenu.style, stylessidebar_l);
            Object.assign(menubtn.style, stylesbtn);
            document.getElementById("menu_btn").style.display="block";
            document.getElementById("close_btn").style.display="none";

            var ref = referencia;

            if (ref == 0) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="dashboard.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 1) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="details.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 2) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="event.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 3) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="tickets.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 4) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="attendee.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 5) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="discount.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else if (ref == 6) {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="payments.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            } else {
                setTimeout(ruta, 300);
                function ruta(ref) {
                    location.href="onsite_checkin.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
                }
            }
        }
    } else {
        function menulink(ref) {
            if (ref == 0) {
                location.href="dashboard.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 1) {
                location.href="details.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 2) {
                location.href="event.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 3) {
                location.href="tickets.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 4) {
                location.href="attendee.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 5) {
                location.href="discount.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else if (ref == 6) {
                location.href="payments.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            } else {
                location.href="onsite_checkin.php?eventno=<?php echo $row_DatosEvent['id_event'];?>";
            }
        }
    }
</script>