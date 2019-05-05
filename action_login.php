<?php
include("includes/header.php");

if (isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
} else {
    exit("تمامی فیلد ها باید پر شوند!");
}

## Connect to DataBase
require("includes/db_connect.php");

## Fetch exists from DataBase
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
if ($row) {
    $_SESSION["state_login"] = true;
    $_SESSION["realname"] = $row['realname'];
    $_SESSION["username"] = $row['username'];
    if ($row['type'] == 0) {
        $_SESSION["user_type"] = "public";
        echo "<div class='mt-4 alert alert-success' role='alert'>" . $row['realname'] . "
    شما با نام کاربری " . $username . " وارد سامانه شدید
    " . "<br/> تا چند ثانیه دیگر به صفحه اصلی منتقل می شوید!" . "</div>";
        header("refresh:3;url=index.php");
    } elseif ($row['type'] == 1) {
        $_SESSION["user_type"] = "admin";

        echo "<div class='mt-4 alert alert-success' role='alert'>" . $row['realname'] . "
        ادمین عزیز، شما با نام کاربری " . $username . " وارد سامانه شدید
        " . "<br/> تا چند ثانیه دیگر به صفحه نخست منتقل می شوید!" . "</div>";
        header("refresh:3;url=index.php");
    }

} else {
    echo "<div class='mt-4 alert alert-danger' role='alert'>
    نام کاربری یا رمز عبور وارد شده است.
    </div>
    <a href='login.php'>
        <button class='btn btn-info my-2 my-sm-0' type='submit'>ورود مجدد</button>
    </a> 
    ";
}
mysqli_close($link);

include("includes/footer.php");
?>