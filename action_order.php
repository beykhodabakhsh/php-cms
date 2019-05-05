<title>Action order Page - Podeman7</title>
<?php
include("includes/header.php");
?>
<section class="main-section-g">
    <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
        $pro_code = $_POST['pro_code'];
        $pro_name = $_POST['pro_name'];
        $pro_qty = $_POST['pro_qty'];
        $pro_price = $_POST['pro_price'];
        $total_price = $_POST['total_price'];

        $realname = $_POST['realname'];
        $email = $_POST['email'];

        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        $username = $_SESSION['username'];

        include("includes/db_connect.php");
        $query = "INSERT INTO orders(id,username,orderdate,pro_code,pro_qty,pro_price,mobile,address,trackcode,state) VALUES('0','$username','" . date('y-m-d') . "','$pro_code','$pro_qty','$pro_price','$mobile','$address','000000000000000000000000','0')";
        if (mysqli_query($link, $query) === true) {
            echo "<div class='mt-2 alert alert-success'>متشکریم، سفارش شما با موفقیت ثبت شد! <br/>
            کاربر گرامی آقا/خانم $realname 
            شما محصول $pro_name به تعداد $pro_qty با کد $pro_code با قیمت پایه $pro_price و هزینه کلی $total_price تومان را سفارش داده اید. 
            </div>
              <div class='mt-2 alert alert-info'>پس از بررسی های لازم، با شما تماس گرفته خواهد شد!</div>
              ";
            $query = "UPDATE products SET pro_qty =pro_qty-$pro_qty WHERE pro_code='$pro_code'";
            mysqli_query($link, $query);
        } else {
            echo "ثبت نشد";
        }


        ?>
        <article class="row product-order-box mt-5">

        </article>
    <?php } else { ?>
        <div class="mt-4 alert alert-success">نیاز است تا ثبت نام کنید یا وارد شوید!</div>
        <a href="register.php">
            <button class="btn btn-success my-2 my-sm-0 ml-2 " type="submit">عضویت</button>
        </a>
        <a href="login.php">
            <button class="btn btn-info my-2 my-sm-0" type="submit">ورود</button>
        </a>
    <?php } ?>
</section>

<?php
include("includes/footer.php");
?>