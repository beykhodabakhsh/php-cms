<title>Manage Orders - Podeman7</title>
<?php
include("includes/header.php");
require("includes/db_connect.php");
if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] != "admin") {
    ?>
    <?php
    if (isset($_POST['order_track']) && !empty($_POST['order_track'])) {
        $order_track = $_POST['order_track'];
    } else {
        exit("تمامی فیلد ها باید پر شوند!");
    }
    ?>
    <div class=" row">
        <section class="orders-box col-lg-12">
            <div class="prodcut-manage-section mt-2 mb-2 d-flex justify-content-center">
                <div class="prodcut-manage-box ">
                    <h2 class="text-center mb-5 font-weight-bold">پیگیری سفارشات</h2>
                    <?php
                    $query = "SELECT state FROM orders WHERE trackcode='$order_track'";
                    $result = mysqli_query($link, $query);
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>وضعیت سفارش</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php
                                    if ($row['state'] == "0") {
                                        echo("سفارش شما ثبت شده و بزودی با شما تماس خواهیم گرفت");
                                    }
                                    else if ($row['state'] == "1") {
                                        echo("اطلاعات شما دریافت شده و محصول در حال بسته بندی می باشد");
                                    }
                                    else if ($row['state'] == "2") {
                                        echo("مرسوله به پیک تحویل داده شده");
                                    } else {
                                        echo("سفارش شما یافت نشد");
                                    }


                                    ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <?php
} else {
    echo "شما دسترسی لازم برای مشاهده این صفحه را ندارید!" . "<br/><br/>" .
        "<a href='index.php'>
<button class='btn btn-info my-2 my-sm-0 ml-2' type='submit'>صفحه نخست</button>
</a>";
}

include("includes/footer.php");
?>
