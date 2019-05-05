<?php
include("includes/header.php");

if (isset($_POST['pro_code']) && !empty($_POST['pro_code']) &&
    isset($_POST['pro_name']) && !empty($_POST['pro_name']) &&
    isset($_POST['pro_qty']) && !empty($_POST['pro_qty']) &&
    isset($_POST['pro_price']) && !empty($_POST['pro_price']) &&
    isset($_POST['pro_detail']) && !empty($_POST['pro_detail'])) {
    $pro_code = $_POST['pro_code'];
    $pro_name = $_POST['pro_name'];
    $pro_qty = $_POST['pro_qty'];
    $pro_price = $_POST['pro_price'];
    $pro_image = basename($_FILES['pro_image']['name']);
    $pro_detail = $_POST['pro_detail'];
} else {
    echo $pro_code = $_POST['pro_code'];
    echo $pro_name = $_POST['pro_name'];
    echo $pro_qty = $_POST['pro_qty'];
    echo $pro_price = $_POST['pro_price'];
    echo $pro_image = basename($_FILES['pro_image']['name']);
    echo $pro_detail = $_POST['pro_detail'];
    exit("تمامی فیلد ها باید پر شوند!");
}

$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
$isupload = 1;
$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
$check = getimagesize($_FILES['pro_image']["tmp_name"]);

if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg") {
    echo "لطفا یک فایل تصویری را اپلود کنید";
    $isupload = 0;
}
if (file_exists($target_file)) {
    $isupload = 0;
    die("فایلی با همین نام در سرویس دنده وجود دارد، لطفا نام فایل خود را تغییر دهید.");

}
if ($_FILES["pro_image"]["size"] > 500000) {
    $isupload = 0;
    die("سایز فایل انتخابی، بیش تر از 500 کیلوبایت است، لطفا سایز فایل خود را کاهش دهید.");

}

if ($check !== false) {
    $isupload = 1;
} else {
    $isupload = 0;
    die("فایل انتخاب شده تصویر نیست!");
}

if ($isupload == 0) {
    die("فایل شما با موفقیت آپلود نشد.");
} else {
    if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {

    } else {
        die ("خطا در هنگام آپلود فایل در سرویس دهنده.");
    }
}
if ($isupload == 1) {
    require("includes/db_connect.php");
    $query = "INSERT INTO products(pro_code,pro_name,pro_qty,pro_price,pro_image,pro_detail) VALUES('$pro_code','$pro_name','$pro_qty','$pro_price','$pro_image','$pro_detail')";
    if (mysqli_query($link, $query) === true) {
        echo "<div class='mt-4 alert alert-success' role='alert'>محصول با موفقیت به انبار اضافه شد";
    } else {
        echo "<div class='mt-4 alert alert-danger' role='alert'>خطا در اضافه شدن محصول به انبار";
    }
}
mysqli_close($link);


include("includes/footer.php");
?>