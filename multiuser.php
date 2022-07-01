<?php require_once('connections/conexion.php');?>
<?php require_once('inc/seguridad.php');?>
<?php
 $query_DatosUserAdmin = sprintf("SELECT * FROM users WHERE id_user=%s AND id_admin IS NULL", 
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
 $DatosUserAdmin = mysqli_query($con, $query_DatosUserAdmin) or die(mysqli_error($con));
 $row_DatosUserAdmin = mysqli_fetch_assoc($DatosUserAdmin);
 $totalRows_DatosUserAdmin = mysqli_num_rows($DatosUserAdmin);
?>
<?php
    $query_DatosMultiuser = sprintf("SELECT * FROM users WHERE id_admin=%s",
                                    GetSQLValueString($_SESSION['tks_UserId'], "int")); 
    $DatosMultiuser = mysqli_query($con, $query_DatosMultiuser) or die(mysqli_error($con));
    $row_DatosMultiuser = mysqli_fetch_assoc($DatosMultiuser);
    $totalRows_DatosMultiuser = mysqli_num_rows($DatosMultiuser);
?>
<?php
    $query_DatosEvent = sprintf("SELECT * FROM events WHERE organizer=%s AND status=%s",
                                    GetSQLValueString($_SESSION['tks_UserId'], "int"),
                                    0); 
    $DatosEvent = mysqli_query($con, $query_DatosEvent) or die(mysqli_error($con));
    $row_DatosEvent = mysqli_fetch_assoc($DatosEvent);
    $totalRows_DatosEvent = mysqli_num_rows($DatosEvent);
?>
<?php
    // $editFormAction = $_SERVER['PHP_SELF'];
    // if (isset($_SERVER['QUERY_STRING'])) {
    // $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
    // }

    // if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formmultiuser")) {
    //     if (comprobaremailunico($_POST["email"]))
    //     {
    // $insertSQL = sprintf("INSERT INTO users(email, id_admin) 
    //                         VALUES (%s, %s)",
    //                         GetSQLValueString($_POST["email"], "text"),                      
    //                         GetSQLValueString($_POST["id_admin"], "int"));

    
    // $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));
    
    
    
    // $insertGoTo = $_SERVER['HTTP_REFERER'];
    // if (isset($_SERVER['QUERY_STRING'])) {
    //     $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //     $insertGoTo .= $_SERVER['QUERY_STRING'];
    // }
    // header(sprintf("Location: %s", $insertGoTo));
    //     } else {
    // $insertGoTo = "multiuser.php?existe=1";
    // if (isset($_SERVER['QUERY_STRING'])) {
    //     $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //     $insertGoTo .= $_SERVER['QUERY_STRING'];
    // }
    // header(sprintf("Location: %s", $insertGoTo));
    //     }
    // }
?>

<!-- codigo para las condiciones -->
<?php
    
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formpermissions")) {

    if (comprobaremailunico($_POST["email"])) {

                    $insertSQL = sprintf("INSERT INTO users(email, id_admin, rank, acount_no) 
                                            VALUES (%s, %s, %s, %s)",
                                            GetSQLValueString($_POST["email"], "text"),                      
                                            GetSQLValueString($_POST["id_admin"], "int"),
                                            GetSQLValueString($_POST["rank"], "int"),
                                            GetSQLValueString($_POST["acount_no"], "int"));

                    $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

        if($_POST['permissions'] != "") {

                if(is_array($_POST['permissions'])) {

                    // realizamos el ciclo de los checkbox selccionados
                    while(list($key,$value) = each($_POST['permissions'])) {

                        $insertSQL = sprintf("INSERT INTO multi_user_access(id_user, email, id_admin, acount_no, permissions) 
                                                VALUES (%s, %s, %s, %s, %s)",
                                                GetSQLValueString(recogerusuariomultiple($_POST["email"]), "int"),
                                                GetSQLValueString($_POST["email"], "text"),
                                                GetSQLValueString($_POST["id_admin"], "int"),
                                                GetSQLValueString($_POST["acount_no"], "int"),                    
                                                GetSQLValueString($value, "text"));

                        $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

                        $id_multiUser = recogerusuariomultiple($_POST["email"]);

                        $insertGoTo = "multiuser.php?newdone=$id_multiUser";
                        if (isset($_SERVER['QUERY_STRING'])) {
                            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                            $insertGoTo .= $_SERVER['QUERY_STRING'];
                        }
                        header(sprintf("Location: %s", $insertGoTo));
                    }
                }
        } else {

            $id_multiUser = recogerusuariomultiple($_POST["email"]);

            $insertGoTo = "multiuser.php?newdone=$id_multiUser";
            if (isset($_SERVER['QUERY_STRING'])) {
                $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                $insertGoTo .= $_SERVER['QUERY_STRING'];
            }
            header(sprintf("Location: %s", $insertGoTo));
    
        }
    
    } else {

        $insertGoTo = "multiuser.php?existe=1";
        if (isset($_SERVER['QUERY_STRING'])) {
            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
            $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));

    }
}      
?>

<!-- codigo para editar las condiciones -->
<?php
    
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formpermissionsedit")) {

                    $query_Delete = sprintf("DELETE FROM multi_user_access WHERE id_user=%s", GetSQLValueString($_POST["id_user"], "int"));
                    echo $query_Delete;
                    $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error());

        if($_POST['permissions'] != "") {

                if(is_array($_POST['permissions'])) {

                    // realizamos el ciclo de los checkbox selccionados
                    while(list($key,$value) = each($_POST['permissions'])) {

                        $insertSQL = sprintf("INSERT INTO multi_user_access(id_user, email, id_admin, acount_no, permissions) 
                                                VALUES (%s, %s, %s, %s, %s)",
                                                GetSQLValueString($_POST["id_user"], "int"),
                                                GetSQLValueString(ObtenerEmailUsuario($_POST["id_user"]), "text"),
                                                GetSQLValueString($_POST["id_admin"], "int"),
                                                GetSQLValueString($_POST["acount_no"], "int"),                    
                                                GetSQLValueString($value, "text"));

                        $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));

                        $insertGoTo = "multiuser.php?editdone=1";
                        if (isset($_SERVER['QUERY_STRING'])) {
                            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                            $insertGoTo .= $_SERVER['QUERY_STRING'];
                        }
                        header(sprintf("Location: %s", $insertGoTo));

                    }
                }
        } else {

            $insertGoTo = "multiuser.php";
            if (isset($_SERVER['QUERY_STRING'])) {
                $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                $insertGoTo .= $_SERVER['QUERY_STRING'];
            }
            header(sprintf("Location: %s", $insertGoTo));
        }  
}      
?>
<html>
<head>
<meta charset="iso-8859-1">
<title><?php echo $pageName; ?></title>
<link rel="shortcut icon" href="favicon-32x32.png">
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="icon" href="img/sys/tg_icon.png">

<script>
</script>
</head>
<body>
<?php include("inc/header.php"); ?>
<?php include("inc/wrapper_multiuser.php"); ?>
<?php include("inc/foot.php"); ?>   
</body>
</html>