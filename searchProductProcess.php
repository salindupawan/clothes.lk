<?php

session_start();
require "connection.php";

$searchText = $_GET["text"];

$product_rs = Database::search("SELECT product.id AS pid , product.title AS title, product.price AS price , 
product.description AS description , product.qty AS qty , product.colour_id AS colour_id, sub_category.id AS sid  FROM `product` 
INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id WHERE `category_id`='1' AND `status_id`='1' AND `title` LIKE '%" . $searchText . "%' ");

$product_num = $product_rs->num_rows;
?>
<div class="col-12 mt-3 mb-3">
    <span class="fw-bold fs-3"><?php echo ($searchText) ?></span> &nbsp;
    <small class="fw-bold text-black-50"><?php echo $product_num ?> Results</small>
    <hr>
</div>
<?php

for ($x = 0; $x < $product_num; $x++) {
    $product_data = $product_rs->fetch_assoc();
?>
    <div class="col-12 col-lg-2 p-2">
        <a class="text-decoration-none text-black" data-bs-toggle="offcanvas" href="#offcanvasExample<?php echo $product_data['pid'] ?>" role="button" aria-controls="offcanvasExample<?php echo $product_data['pid'] ?>">
            <?php
            $productImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["pid"] . "'");
            $productImage_data = $productImage_rs->fetch_assoc();
            ?>
            <div class="card shadow p-3">
                <img src="<?php echo $productImage_data['code'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                    <span class="card-text text-primary">Rs. <?php echo $product_data["price"] ?> .00</span> <br />

                    <a class="col-12 btn btn-primary rounded rounded-5 mt-3" href='<?php echo "singleProductView.php?id=" . $product_data["pid"] ?>'>Buy Now</a>

                    <?php
                    if (isset($_SESSION["u"])) {

                        if ($product_data["qty"] == 0) {
                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                            $cart_num = $cart_rs->num_rows;

                            if ($cart_num == 1) {

                    ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> Add to Cart</button>

                            <?php

                            } else {
                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> Add to Cart</button>

                            <?php
                            }
                        } else {
                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                            $cart_num = $cart_rs->num_rows;

                            if ($cart_num == 1) {

                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"><i class="bi bi-check-lg"></i> Added to Cart</button>

                            <?php

                            } else {
                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> Add to Cart</button>

                            <?php
                            }
                        }
                    } else if (isset($_SESSION["uk"])) {

                        if ($product_data["qty"] == 0) {
                            $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                                `user_code`='" . $user . "'");
                            $cart_num = $cart_rs->num_rows;

                            if ($cart_num == 1) {

                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);">Add to Cart</button>

                            <?php

                            } else {

                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> Add to Cart</button>

                            <?php

                            }
                        } else {
                            $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                            $cart_num = $cart_rs->num_rows;

                            if ($cart_num == 1) {

                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> <i class="bi bi-check-lg"></i> Added to Cart</button>

                            <?php

                            } else {

                            ?>
                                <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['pid'] ?>" onclick="addToCart(<?php echo $product_data['pid'] ?>);"> Add to Cart</button>

                    <?php

                            }
                        }
                    }
                    ?>


                    <?php
                    if (isset($_SESSION["u"])) {

                        $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                        $wishlist_num = $wishlist_rs->num_rows;

                        if ($wishlist_num == 1) {

                    ?>
                            <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['pid'] ?>" onclick="addToWishlist(<?php echo $product_data['pid'] ?>);">
                                <i class="bi bi-heart-fill fs-5"></i> &nbsp; Added to Wishlist
                            </button>
                        <?php

                        } else {
                        ?>
                            <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['pid'] ?>" onclick="addToWishlist(<?php echo $product_data['pid'] ?>);">
                                <i class="bi bi-heart  fs-5"></i> &nbsp; Add to Wishlist
                            </button>
                        <?php
                        }
                    } else if (isset($_SESSION["uk"])) {

                        $wishlist_rs = Database::search("SELECT * FROM `wishlist_non` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                                                              `user_code`='" . $_SESSION["uk"] . "'");
                        $wishlist_num = $wishlist_rs->num_rows;

                        if ($wishlist_num == 1) {

                        ?>
                            <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['pid'] ?>" onclick="addToWishlist(<?php echo $product_data['pid'] ?>);">
                                <i class="bi bi-heart-fill fs-5"></i> &nbsp; Added to Wishlist
                            </button>
                        <?php

                        } else {

                        ?>
                            <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['pid'] ?>" onclick="addToWishlist(<?php echo $product_data['pid'] ?>);">
                                <i class="bi bi-heart  fs-5"></i> &nbsp; Add to Wishlist
                            </button>
                    <?php

                        }
                    }
                    ?>


                </div>
            </div>
        </a>



        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample<?php echo $product_data['pid'] ?>" aria-labelledby="offcanvasExampleLabel<?php echo $product_data['pid'] ?>">
            <div class="offcanvas-header d-flex justify-content-end">


                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <div class="row ">
                    <?php
                    $mainImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["pid"] . "'");
                    $mainImage_data = $mainImage_rs->fetch_assoc();
                    ?>

                    <div class="col-12   rounded rounded-2 p-3">
                        <img src="<?php echo $mainImage_data["code"] ?>" id="mainImg<?php echo $product_data['pid'] ?>" style="width: 360px; ">
                    </div>
                    <?php
                    $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["pid"] . "'");
                    $image_num = $image_rs->num_rows;

                    $img = array();

                    for ($y = 0; $y < $image_num; $y++) {
                        $image_data = $image_rs->fetch_assoc();
                        $img[$product_data["pid"] . $y] = $image_data["code"];
                    ?>
                        <div class="col-2  rounded rounded-2  mt-2">
                            <a href="#!"> <img src="<?php echo $img[$product_data["pid"] . $y]; ?>" id="img<?php echo $product_data['pid'] ?><?php echo $y ?>" onclick="loadMainImg(<?php echo $product_data['pid'] ?>,<?php echo $y ?>)" style="width: 50px;" id=""></a>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- <div class="col-2  rounded rounded-2  mt-2">
                                                                <img src="resources/gf1.jpg" style="width: 50px;" >
                                                            </div>
                                                            <div class="col-2    rounded rounded-2  mt-2">
                                                                <img src="resources/gf3.jpg" style="width: 50px;" >
                                                            </div> -->
                </div>
                <div class="row ">
                    <?php
                    if ($product_data["qty"] > 0) {
                    ?>

                        <div class="col-12  fs-5 border-bottom mt-3 pb-3">
                            <h6><span class="badge bg-white border-success text-success fs-6"><i class="bi bi-check2-square  fs-6"></i> &nbsp; In Stock</span></h6>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="col-12 fs-5 border-bottom mt-3 pb-3">
                            <h6><span class="badge bg-white border-danger text-danger fs-6"><i class="bi bi-x-square"></i> &nbsp; Out of Stock</span></h6>
                        </div>

                    <?php
                    }
                    ?>



                    <div class="col-12 mt-3">
                        <h5 class="offcanvas-title fw-bold" id="offcanvasExampleLabel"><?php echo $product_data["title"] ?></h5>
                        <p class="fw-bold text-black-50">Rs. <?php echo $product_data["price"] ?>.00</p>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">
                            <?php echo $product_data["description"] ?>
                        </label>
                    </div>

                    <div class="col-4 mt-4">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <h5>Colour</h5>
                            </div>
                            <?php
                            $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                            $colour_data = $colour_rs->fetch_assoc();
                            ?>
                            <div class="col-12 ">
                                <input type="text" class="form-control text-center" disabled value="<?php echo $colour_data["name"] ?>">
                            </div>
                        </div>

                    </div>

                    <div class="col-8 mt-4">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <h5>Size</h5>
                            </div>
                            <div class="col-12">

                                <select class="form-select">
                                    <?php
                                    $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id WHERE `product_id`='" . $product_data["pid"] . "' AND `status`='1'");
                                    $size_num = $size_rs->num_rows;

                                    for ($w = 0; $w < $size_num; $w++) {
                                        $size_data = $size_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $size_data["size_id"] ?>"><?php echo $size_data["name"] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                    </div>



                    <?php
                    if ($product_data["qty"] == "0") {
                    ?>
                        <div class="col-12 mt-3 mb-5 ">
                            <div class="row ">
                                <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['pid'] ?>">
                                    <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                </div>
                                <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['pid'] ?>">
                                    <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                </div>

                                <div class="col-4 mt-2 d-grid">
                                    <input type="number" class="form-control border-primary text-primary form-control-sm rounded rounded-5 fs-5 text-center" disabled id="offcanvasqty<?php echo $product_data['pid'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['pid'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['pid'] ?>);" value="0" min="1">

                                </div>
                                <div class="col-8 d-grid mt-2">
                                    <a href='<?php echo "singleProductView.php?id=" . $product_data["pid"] ?>' class="btn btn-primary btn-lg rounded rounded-5 text-center">View all Details</a>

                                </div>

                            </div>

                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-12 mt-3 mb-5 ">
                            <div class="row ">
                                <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['pid'] ?>">
                                    <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                </div>
                                <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['pid'] ?>">
                                    <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                </div>

                                <div class="col-4 mt-2 d-grid">
                                    <input type="number" class="form-control border-primary text-primary form-control-sm rounded rounded-5 fs-5 text-center" id="offcanvasqty<?php echo $product_data['pid'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['pid'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['pid'] ?>);" value="1" min="1">

                                </div>
                                <div class="col-8 d-grid mt-2">
                                    <a href='<?php echo "singleProductView.php?id=" . $product_data["pid"] ?>' class="btn btn-primary btn-lg rounded rounded-5 text-center">Buy it Now</a>

                                </div>

                            </div>

                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php
}

?>