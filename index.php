<title>Main - Podeman7</title>
<?php
include("includes/header.php");

include("includes/db_connect.php");
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
?>
<section class="main-section-g">
    <div class="title-products">
        <h2>محصولات ایرانی شاپ</h2>
    </div>
    <div class="products-section row">
        <?php
        $counter = 0;
        while ($row = mysqli_fetch_array($result)) {
            $counter++;
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 pr-1 pl-1 mb-2">
                <a href="product_page.php?id=<?php echo($row['pro_code']); ?>">
                    <article class="product-box"
                    ">
                    <img class="product-image" src="<?php echo "images/products/" . $row['pro_image']; ?>" alt="">
                    <h3><?php echo($row['pro_name']); ?></h3>
                    <p class="product-description"><?php echo (substr($row['pro_detail'], 0, 130)) . "..."; ?></p>
                    <p class="product-quantity">موجودی: <?php echo($row['pro_qty']); ?></p>
                    <p class="product-price"><?php echo($row['pro_price']); ?> تومان</p>
                    <button type="button" class="btn btn-secondary btn-lg btn-block">خرید</button>
                    </article>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php
include("includes/footer.php");
?>