<title>Login - Podeman7</title>
<?php
include("includes/header.php");

if (isset($_SESSION["state_login"]) === true) {
    echo "شما قبلا وارد حساب کاربری خود شده اید!" . "<br/><br/>" .
        "<a href='logout.php'>
    <button class='btn btn-danger my-2 my-sm-0 ml-2' type='submit'>خروج</button>
    </a> " .
        "<a href='index.php'>
    <button class='btn btn-info my-2 my-sm-0 ml-2' type='submit'>صفحه نخست</button>
    </a> ";

} else {
    ?>

    <div class="register-section mt-5 d-flex justify-content-center">
        <div class="register-box ">
            <h2 class="text-center mb-5 font-weight-bold">صفحه ورود</h2>
            <form action="action_login.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold" for="inputPassword4">نام کاربری</label>
                        <input name="username" type="text" class="form-control" placeholder="bizhan">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold" for="inputPassword4">رمز عبور</label>
                        <input name="password" type="password" class="form-control" placeholder="123456">
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
                    <button type="submit" class="btn btn-primary">ورود</button>
                </div>
            </form>
        </div>
    </div>

    <?php
}

include("includes/footer.php");
?>