<?php
    $query_DatosUsuarioheader = sprintf("SELECT * FROM users WHERE id_user=%s", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
    $DatosUsuarioheader = mysqli_query($con, $query_DatosUsuarioheader) or die(mysqli_error($con));
    $row_DatosUsuarioheader = mysqli_fetch_assoc($DatosUsuarioheader);
    $totalRows_DatosUsuarioheader = mysqli_num_rows($DatosUsuarioheader);
?>
<div class="head">
    <div class="logo">
        <a href="index.php"><img src="../img/sys/ticketsgenerator.svg" alt=""></a>
    </div>
    <div class="head_space">
    </div>
    <div class="config_m">
        <ul>
            <?php
            if ((isset($_SESSION['MM_Username'])) && ($_SESSION['MM_Username'] != ""))
            { ?>
            <li><a href="#">
                <?php
                    echo ObtenerNombreUsuario($_SESSION['tks_UserId']);
                    echo " ". ObtenerApellidoUsuario($_SESSION['tks_UserId']);
                ?>
                <div class="flecha_abajo" style="float: right;"></div></a>
                    <div class="dropdown-config-content">
                        <ul>
                            <!-- <li><a href="#" onclick="mostrar()">My Profil</a></li> -->
                            <li><a href="manage.php">Manage events</a></li>
                            <?php if(showPermissions($_SESSION['tks_UserId'], "TSYS-P0014") || $row_DatosUsuarioheader['id_admin'] == "" ) : ?>
                            <!-- <li><a href="">Organizer</a></li> -->
                            <?php endif ?>
                            <li><a href="multiuser.php">Multi-User Access</a></li>
                            <?php if($row_DatosUsuarioheader['rank'] < 2) : ?>
                            <li><a href="user_list_manager.php" style="background-color:rgb(24, 1, 105); color:#FFF;">Accounts manager <?php //echo $_SESSION['tks_Nivel']; ?></a></li>
                            <?php endif ?>
                            <li><a style="border-top: 1px solid #CCC;" href="logout.php" onclick="javascript:return asegurarlogout ();">Log out</a></li>
                        </ul>
                    </div>
            </li>
            <?php }
            else
            { ?>
                <li><a href="index.php">Log in</a></li>
            <?php } ?>
        </ul>
    </div>

</div>