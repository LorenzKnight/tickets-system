<?php
    $query_DatosEvent = sprintf("SELECT * FROM events WHERE status=%s AND id_event=%s", 
                                    1,
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
<div class="sidebar_l">
    <div class="sidemenu">
        <ul>
            <a href="accounts_manager.php" <?php if ($menuactive == 1) { ?> class="active" <?php }?>><li>Statistics</li></a>
            <a href="user_list_manager.php" <?php if ($menuactive == 2) { ?> class="active" <?php }?>><li>User List</li></a>
            <a href="events_list_manager.php" <?php if ($menuactive == 3) { ?> class="active" <?php }?>><li>Event List</li></a>
            <a href="contents.php" <?php if ($menuactive == 4) { ?> class="active" <?php }?>><li>Content / Info / Update</li></a>
        </ul>
    </div>
</div>