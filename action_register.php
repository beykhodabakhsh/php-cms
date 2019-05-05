<?php
include("includes/header.php");

if (isset($_POST['realname']) && !empty($_POST['realname']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
    isset($_POST['email']) && !empty($_POST['email'])) {
    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else {
    exit("تمامی فیلد ها باید پر شوند!");
}
if ($password != $repassword) {
    exit("رمز عبور و تکرار آن مطابقت ندارند!");
}
require("includes/db_connect.php");
$query = "INSERT INTO users(realname,username,password,email,type) VALUES('$realname','$username','$password','$email','0')";
if (mysqli_query($link, $query) === true) {
    echo "<div class='mt-4 alert alert-success' role='alert'>"
        . $realname . " عزیز، ثبت نام شما با ایمیل " . $email . " در سامانه ثبت شد
    " . "<br/> تا چند ثانیه دیگر به صفحه اصلی منتقل می شوید!" . "</div>";
    header("refresh:3;url=index.php");
} else {

    echo "<div class='mt-4 alert alert-danger' role='alert'>
    عضویت شما انجام نشد
    </div>";
}

include("includes/footer.php");
?>