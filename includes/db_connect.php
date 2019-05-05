<?php
$link = mysqli_connect("localhost","root","123456","shop_db");
if (mysqli_connect_errno())
{
    exit("خطایی رخ داده است:".mysqli_connect_error());
}

?>