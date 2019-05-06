<title>Register - Podeman7</title>
<?php
include("includes/header.php");

if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
    echo "شما قبلا وارد حساب کاربری خود شده اید!" . "<br/><br/>" .
        "<a href='logout.php'>
    <button class='btn btn-danger my-2 my-sm-0 ml-2' type='submit'>خروج</button>
    </a> " .
        "<a href='index.php'>
    <button class='btn btn-info my-2 my-sm-0 ml-2' type='submit'>صفحه نخست</button>
    </a> ";
} else {
    ?>

    <di class="register-section mt-5 d-flex justify-content-center mb-lg-5">
        <div class="register-box ">
            <h2 class="text-center mb-5 font-weight-bold">صفحه ثبت نام</h2>
            <form action="action_register.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">نام</label>
                        <input name="realname" type="text" class="form-control" placeholder="بیژن">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold" for="inputPassword4">نام کاربری</label>
                        <input name="username" type="text" class="form-control" placeholder="bizhan">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold" for="inputEmail4">ایمیل</label>
                        <input name="email" type="email" class="form-control" placeholder="info@gmail.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold" for="inputPassword4">رمز عبور</label>
                        <input name="password" type="password" class="form-control" placeholder="123456">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold" for="inputPassword5">تکرار رمز عبور</label>
                        <input name="repassword" type="password" class="form-control" placeholder="123456">
                    </div>

                </div>
                <div class="form-group rememberme-section mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="btn btn-primary">عضویت</button>
                </div>
            </form>
        </div>
    </di>

    <?php
}
include("includes/footer.php");
?>