<title>Setting up PHP Session</title>
<?php
include("includes/header.php");
if (isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}
$msg = " " . $_SESSION['counter'] . " " . "بار این صفحه را مشاهده کردید";
?>
<div class="pt-5">
    <?php
    echo $msg;
    ?>
</div>
<?php
include("includes/footer.php");
?>