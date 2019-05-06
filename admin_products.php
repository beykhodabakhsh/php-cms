<title>Manage Products - Podeman7</title>
<?php
include("includes/header.php");
require("includes/db_connect.php");
if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] == "admin") {

    ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="prodcut-import-section mt-2 mb-2 d-flex justify-content-center">
                <div class="prodcut-import-box ">
                    <h2 class="text-center mb-5 font-weight-bold">افزودن محصول</h2>
                    <?php
                    $url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = "";
                    $btn_caption = "افزودن کالا";
                    if (isset($_GET['action'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM products WHERE pro_code='$id'";
                        $result = mysqli_query($link, $query);
                        if ($_GET['action'] == 'EDIT') {
                            if ($row = mysqli_fetch_array($result)) {
                                $pro_code = $row['pro_code'];
                                $pro_name = $row['pro_name'];
                                $pro_price = $row['pro_price'];
                                $pro_qty = $row['pro_qty'];
                                $pro_image = $row['pro_image'];
                                $pro_detail = $row['pro_detail'];
                                $url = "?id=$pro_code&action=EDIT";
                                $btn_caption = "ویرایش کالا";
                            }
                        }
                        if ($_GET['action'] == 'DELETE') {
                            if ($row = mysqli_fetch_array($result)) {
                                $pro_code = $row['pro_code'];
                                $pro_name = $row['pro_name'];
                                $pro_price = $row['pro_price'];
                                $pro_qty = $row['pro_qty'];
                                $pro_image = $row['pro_image'];
                                $pro_detail = $row['pro_detail'];
                                $url = "?id=$pro_code&action=DELETE";
                                $btn_caption = "حذف کالا";
                            }
                        }
                    }
                    if (isset($_GET['action']) && $_GET['action'] == 'DELETE') {
                        $id = $_GET['id'];
                        $url = "?id=$pro_code&action=DELETE";
                        $btn_caption = "حذف کالا";
                    }
                    ?>
                    <form name="add_product" action="action_admin_products.php<?php if (!empty($url)) echo($url); ?>"
                          method="POST"
                          enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold" for="inputPassword4">کد کالا</label>
                                <input name="pro_code" id="pro_code" type="text" class="form-control"
                                       placeholder="125" value="<?php echo($pro_code); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold" for="inputPassword4">نام کالا</label>
                                <input name="pro_name" id="pro_name" type="text" class="form-control"
                                       placeholder="کفش مشکی نایکی" value="<?php echo($pro_name); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold" for="inputPassword4">موجودی کالا</label>
                                <input name="pro_qty" id="pro_qty" type="text" class="form-control"
                                       placeholder="17" value="<?php echo($pro_qty); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold" for="inputPassword4">قیمت کالا (تومان)</label>
                                <input name="pro_price" id="pro_price" type="text" class="form-control"
                                       placeholder="125000" value="<?php echo($pro_price); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold" for="inputPassword4">تصویر کالا</label>

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="pro_image" id="pro_image" type="file"
                                               class="custom-file-input"
                                               value="<?php if (!empty($pro_image)) echo("<img src='images/products/$pro_image'"); ?>">>
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold" for="inputPassword4">توضیحات تکمیلی کالا</label>
                                <textarea name="pro_detail" id="pro_detail" type="password" wrap="virtual"
                                          class="form-control"><?php echo($pro_detail); ?></textarea>
                            </div>
                        </div>
                        <div class="submit-btn">
                            <?php
                            if($btn_caption == "حذف کالا") {
                                echo "<button onclick='ckeck_input();' type='submit' class='btn btn-danger'>".$btn_caption."</button>";
                            } else if ($btn_caption == "ویرایش کالا") {
                                echo "<button type='submit' class='btn btn-primary'>".$btn_caption."</button>";
                            } else {
                                echo "<button type='submit' class='btn btn-primary'>".$btn_caption."</button>";
                            }
                            ?>
                            <button type="reset" class="btn btn-dark">ریست</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="prodcut-manage-section mt-2 mb-2 d-flex justify-content-center">
                <div class="prodcut-manage-box ">
                    <h2 class="text-center mb-5 font-weight-bold">مدیریت محصولات</h2>
                    <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($link, $query);
                    ?>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>کد</th>
                            <th>نام</th>
                            <th>موجودی</th>
                            <th>قیمت</th>
                            <th>تصویر</th>
                            <th>مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo($row['pro_code']) ?></td>
                                <td><?php echo($row['pro_name']) ?></td>
                                <td><?php echo($row['pro_qty']) ?></td>
                                <td><?php echo($row['pro_price']) ?></td>
                                <td><img width="80px" height="80px"
                                         src="images/products/<?php echo($row['pro_image']) ?>"/></td>
                                <td>
                                    <div class="mb-2"><a
                                                href="admin_products.php?id=<?php echo($row['pro_code']); ?>&action=EDIT">ویرایش</a>
                                    </div>
                                    <div><a class="color-red"
                                            href="admin_products.php?id=<?php echo($row['pro_code']); ?>&action=DELETE">حذف</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        function ckeck_input() {
            var q = confirm("برای حذف محصول اطمینان دارید؟");
            if (q == true) {
                var validator = true;
                if (validator) {
                    document.order.submit();
                }
            }
        }
    </script>
    <?php
} else {
    echo "شما دسترسی لازم برای مشاهده این صفحه را ندارید!" . "<br/><br/>" .
        "<a href='index.php'>
<button class='btn btn-info my-2 my-sm-0 ml-2' type='submit'>صفحه نخست</button>
</a>";
}

include("includes/footer.php");
?>