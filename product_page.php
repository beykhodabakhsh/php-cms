<title>Product Page - Podeman7</title>
<?php
include("includes/header.php");
include("includes/db_connect.php");
$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}
$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);

?>
<section class="main-section-g">
    <article class="row product-page-box mt-5">
        <?php
        if ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-5">
                <img class="product-image product-image-page"
                     src="<?php echo "images/products/" . $row['pro_image']; ?>" alt="">
            </div>
            <div class="col-lg-7">
                <h2><?php echo($row['pro_name']); ?></h2>
                <p class="product-description product-description-box"><?php echo (substr($row['pro_detail'], 0, 530)) . "..."; ?></p>
                <p class="product-quantity">موجودی: <?php echo($row['pro_qty']); ?></p>
                <p class="product-price">قیمت: <?php echo($row['pro_price']); ?> تومان</p>
                <a href="order.php?id=<?php echo($row['pro_code']); ?>">
                    <button type="button" class="btn btn-success btn-lg">خرید</button>
                </a>
            </div>
            <?php
        }
        ?>
    </article>
</section>
<?php
include("includes/footer.php");
?>