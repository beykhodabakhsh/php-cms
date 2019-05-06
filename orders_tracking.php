<title>Manage Orders - Podeman7</title>
<?php
include("includes/header.php");
require("includes/db_connect.php");
if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] != "admin") {
    ?>
    <section class="order-tracking">
        <form name="track_orders" action="action_orders_tracking.php"
              method="POST"
              enctype="multipart/form-data">
            <div class="text-center">
                <h3>پیگیری سفارشات</h3>
                <p>کد پیگیری خود را وارد کنید</p>
            </div>
            <div class="input-group mb-5">
                <input name="order_track" id="order_track" type="text" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">پیگیری</button>
                </div>
            </div>
        </form>
    </section>
    <?php
} else {
    echo "شما دسترسی لازم برای مشاهده این صفحه را ندارید!" . "<br/><br/>" .
        "<a href='index.php'>
<button class='btn btn-info my-2 my-sm-0 ml-2' type='submit'>صفحه نخست</button>
</a>";
}

include("includes/footer.php");
?>
