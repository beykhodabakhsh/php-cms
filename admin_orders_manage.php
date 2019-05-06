<title>Manage Orders - Podeman7</title>
<?php
include("includes/header.php");
require("includes/db_connect.php");
if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] == "admin") {

    ?>
    <div class=" row">
        <section class="orders-box col-lg-12">
            <div class="prodcut-manage-section mt-2 mb-2 d-flex justify-content-center">
                <div class="prodcut-manage-box ">
                    <h2 class="text-center mb-5 font-weight-bold">مدیریت سفارشات</h2>
                    <?php
                    $query = "SELECT * FROM orders";
                    $result = mysqli_query($link, $query);
                    ?>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>کد سفارش</th>
                            <th>نام کاربری</th>
                            <th>زمان سفارش</th>
                            <th>کد محصول</th>
                            <th>تعداد</th>
                            <th>قیمت</th>
                            <th>شماره تماس</th>
                            <th>آدرس</th>
                            <th>کد پیگیری</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo($row['id']) ?></td>
                                <td><?php echo($row['username']) ?></td>
                                <td><?php echo($row['orderdate']) ?></td>
                                <td><?php echo($row['pro_code']) ?></td>
                                <td><?php echo($row['pro_qty']) ?></td>
                                <td><?php echo ($row['pro_price']) . " تومان"; ?></td>
                                <td><?php echo($row['mobile']) ?></td>
                                <td><?php echo($row['address']) ?></td>
                                <td><?php echo($row['trackcode']) ?></td>
                                <td><?php echo($row['state']) ?></td>
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