
<?php require_once('connections/conexion.php');?>
<?php if($_GET["created"]):?>
<?php
    $eventno = ObtenerEventoCreate($_SESSION['tks_UserId']);
    $updateGoTo = "tickets.php?eventno=$eventno&ticketcreateddone=1";
    header(sprintf("Location: %s", $updateGoTo));
?>
<?php endif ?>


<?php if($_GET["ticket"]):?>
<?php
    $eventno = ObtenerEventoEdit($_SESSION['tks_UserId']);
    $updateGoTo = "tickets.php?eventno=$eventno&ticketeditdone=1";
    header(sprintf("Location: %s", $updateGoTo));
?>
<?php endif ?>


<?php if($_GET["code"]):?>
<?php
    $eventno = ObtenerEventoEditFcode($_SESSION['tks_UserId']);
    $updateGoTo = "discount.php?eventno=$eventno&codeeditdone=1";
    header(sprintf("Location: %s", $updateGoTo));
?>
<?php endif ?>


<?php if($_GET["purchaseEdited"]):?>
<?php
    $eventno = ObtenerEventoEditedAttendee($_SESSION['tks_UserId']);
    $updateGoTo = "attendee.php?eventno=$eventno&attendeeeditdone=1";
    header(sprintf("Location: %s", $updateGoTo));
?>
<?php endif ?>