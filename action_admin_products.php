<?php
include("includes/header.php");
require("includes/db_connect.php");

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
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    switch ($_GET['action']) {
        case 'EDIT':
            $query = "UPDATE products SET pro_code='$pro_code',pro_name='$pro_name',pro_qty='$pro_qty',pro_price='$pro_price',pro_detail='$pro_detail' WHERE pro_code='$id'";
            if (mysqli_query($link, $query) === true) {
                echo "محصول انتخاب شده با موفقیت ویرایش شد";
            } else {
                echo "خطا در ویرایش محصول";
            }
            break;
        case 'DELETE':
            $query = "DELETE products SET pro_code='$pro_code',pro_name='$pro_name',pro_qty='$pro_qty',pro_price='$pro_price',pro_detail='$pro_detail' WHERE pro_code='$id'";
            if (mysqli_query($link, $query) === true) {
                echo "محصول انتخاب شده با موفقیت حذف شد";
            } else {
                echo "خطا در حذف محصول";
            }
            break;
    }
    mysqli_close($link);
    exit();
}

$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
$isupload = 1;
$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
$check = getimagesize($_FILES['pro_image']["tmp_name"]);

if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg") {
    if (file_exists($target_file)) {
        $isupload = 0;
        die("فایلی با همین نام در سرویس دنده وجود دارد، لطفا نام فایل خود را تغییر دهید.");
    }
    die ("لطفا یک فایل تصویری را اپلود کنید");
    $isupload = 0;
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