<title>order Page - Podeman7</title>
<?php
include("includes/header.php");
include("includes/db_connect.php");
$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}
$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
?>
<section class="main-section-g">
    <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) { ?>
        <form name="add_product" action="action_order.php" method="post" enctype="multipart/form-data">
        <article class="row product-order-box mt-5">
                <div class="col-lg-8">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">تعداد مورد نیاز کالا *</label>
                            <input value="" name="pro_qty" id="pro_qty" type="text" class="form-control"
                                   onchange="calc_price();">
                        </div>
                        <?php
                        $query_users = "SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'";
                        $result_users = mysqli_query($link, $query_users);
                        $user_row = mysqli_fetch_array($result_users);
                        ?>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">نام و نام خانوادگی *</label>
                            <input value="<?php echo($user_row["realname"]); ?>" name="realname" type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">ایمیل *</label>
                            <input value="<?php echo($user_row["email"]); ?>" name="email" type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold" for="inputPassword4">شماره تماس *</label>
                            <input value="" name="mobile" id="mobile" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bold" for="inputPassword4">آدرس دقیق پستی *</label>
                            <textarea name="address" id="address" type="text" wrap="virtual"
                                      class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bold">قیمت نهایی (تومان)</label>
                            <input readonly value="" name="total_price" id="total_price" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-success btn-lg" onclick="ckeck_input();">خرید نهایی
                        </button>
                    </div>

                </div>
                <div class="col-lg-4 pr-5">
                    <input readonly value="<?php echo($row['pro_name']); ?>" name="pro_name" id="pro_name"
                           type="text" class="form-control mb-3 no-input">
                    <img class="product-image product-image-order mb-3"
                         src="images/products/<?php echo($row['pro_image']); ?>" alt="">
                    <br/>

                    <label class="font-weight-bold" for="inputPassword4">کد کالا</label>
                    <input readonly value="<?php echo($row['pro_code']); ?>" name="pro_code" id="pro_code"
                           type="text" class="form-control mb-3">
                    <label class="font-weight-bold">موجودی:</label>
                    <input readonly value="<?php echo($row['pro_qty']); ?>" type="text" class="form-control mb-3">
                    <label class="font-weight-bold">قیمت واحد:</label>
                    <input readonly name="pro_price" id="pro_price" value="<?php echo($row['pro_price']); ?>" type="text"
                           class="form-control mb-3">
                </div>

        </article>
        </form>
    <?php } else { ?>
        <div class="mt-4 alert alert-success">قبل از خرید نیاز است تا ثبت نام کنید یا وارد شوید!</div>
        <a href="register.php">
            <button class="btn btn-success my-2 my-sm-0 ml-2 " type="submit">عضویت</button>
        </a>
        <a href="login.php">
            <button class="btn btn-info my-2 my-sm-0" type="submit">ورود</button>
        </a>
    <?php } ?>
</section>
<script>
    function calc_price() {
        var pro_qty = <?php  echo($row['pro_qty']); ?>;
        var price = document.getElementById('pro_price').value;
        var count = document.getElementById('pro_qty').value;
        var total_price;
        if (count > pro_qty) {
            alert("تعداد مورد نظر شما از موجودی انبار بیشتر است!");
            document.getElementById('pro_qty').value = 0;
            count = 0;
        }
        if (count == 0 || count == '') {
            total_price = 0;
        } else {
            total_price = count * price;
        }
        document.getElementById('total_price').value = total_price;
    }

    function ckeck_input() {
        var q = confirm("از صحت اطلاعات وارد شده، اطمینان دارید");
        if (q == true) {
            var validator = true;
            var count = document.getElementById('pro_qty').value;
            var mobile = document.getElementById('mobile').value;
            var address = document.getElementById('address').value;

            if (count == 0 || count == '') {
                validator = false;
            }
            if (mobile.length < 11) {
                validator = false;
            }
            if (address.length < 15) {
                validator = false;
            }
            if (validator) {
                document.order.submit();
            } else {
                alert("برخی از فیلد ها به درستی کامل نشده اند، لطفا مجددا آن ها را بررسی کنید");
            }
        }
    }
</script>
<?php
include("includes/footer.php");
?>