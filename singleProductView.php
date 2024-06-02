<?php
$code = uniqid();
$user = "";
if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
} else {
    $user = setcookie("user", $code, time() + (60 * 60 * 24 * 365 * 10));
}
?>
<?php


if (isset($_GET["id"])) {

    $pid = $_GET["id"];


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/c.png" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include "header.php";

                $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id INNER JOIN `category` ON sub_category.category_id=category.id INNER JOIN `delivery_fee` ON product.delivery_fee_id=delivery_fee.id WHERE product.id='" . $pid . "'");
                $product_num = $product_rs->num_rows;

                if ($product_num == 1) {
                    $product_data = $product_rs->fetch_assoc();
                ?>


                    <div class="row ">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item "><a href="home.php" class="text-decoration-none text-black fw-bold">Home</a></li>
                                    <li class="breadcrumb-item "><a href="category.php" class="text-decoration-none text-black fw-bold"><?php echo $product_data["name"] ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 col-lg-5 mb-3 offset-lg-1">
                            <div class="row">
                                <?php
                                $mainImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $pid . "'");
                                $mainImage_data = $mainImage_rs->fetch_assoc();
                                
                                ?>
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="<?php echo $mainImage_data["code"] ?>" class="w-100" id="mainImg" alt="">
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <?php
                                       
                                        $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $pid . "'");
                                        $image_num = $image_rs->num_rows;
                                        $img = array();

                                        for ($y = 0; $y < $image_num; $y++) {
                                            $image_data = $image_rs->fetch_assoc();
                                           
                                        ?>
                                            <div class="col-3 col-lg-2  mt-2">
                                                <img src="<?php echo  $image_data["code"]; ?>" id="img<?php echo $y ?>" onclick="singlproductImages('<?php echo $y ?>')" class="w-100" alt="">
                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5 mt-4 mt-lg-0 offset-lg-1">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fw-bold"><?php echo $product_data["title"] ?></h2>
                                    <h4 class="fw-bold text-black-50">Rs. <?php echo $product_data["price"] ?>.00 + <small class="fs-6">Rs. <?php echo $product_data["fee"] ?>.00 (Shipping)</small></h4>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-2 col-lg-1">
                                            <img src="payment_method/visa_img.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <img src="payment_method/mastercard_img.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <img src="payment_method/american_express_img.png" class="w-100" alt="">
                                        </div>

                                        <div class="col-2 col-lg-1">
                                            <img src="payment_method/paypal_img.png" class="w-100" alt="">
                                        </div>

                                    </div>
                                </div>

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


                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="fs-5 fw-bold text-black-50">Colour</p>
                                        </div>
                                        <?php
                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                        $colour_data = $colour_rs->fetch_assoc();

                                        ?>
                                        <div class="col-3">
                                            <input type="text" class="form-control text-center border border-dark" disabled value="<?php echo $colour_data["name"] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <p class="fs-5 fw-bold text-black-50">Size</p>
                                        </div>
                                        <div class="col-3">
                                            <select name="" id="size<?php echo $pid ?>" class="form-select border border-dark">
                                                <?php
                                        

                                                $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id WHERE `product_id`='" .$pid . "' AND `status`='1' ");
                                                $size_num = $size_rs->num_rows;
                                                

                                                if (isset($_SESSION["u"])) {

                                                    $s_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                        `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $s_num = $s_rs->num_rows;

                                                    if ($s_num == 1) {
                                                        $s_data = $s_rs->fetch_assoc();

                                                        for ($w = 0; $w < $size_num; $w++) {
                                                            $size_data = $size_rs->fetch_assoc();
                                                ?>
                                                            <option value="<?php echo $size_data["size_id"] ?>" <?php if ($s_data["size_id"] == $size_data["size_id"]) { ?> selected <?php } ?>><?php echo $size_data["name"] ?></option>

                                                        <?php
                                                        }
                                                    } else {
                                                        for ($w = 0; $w < $size_num; $w++) {
                                                            $size_data = $size_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $size_data["size_id"] ?>"><?php echo $size_data["name"] ?></option>

                                                        <?php
                                                        }
                                                    }
                                                } else if (isset($_SESSION["uk"])) {

                                                    $s_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                        `user_code`='" . $_SESSION["uk"] . "'");
                                                    $s_num = $s_rs->num_rows;
                                                    if ($s_num == 1) {
                                                        $s_data = $s_rs->fetch_assoc();

                                                        for ($w = 0; $w < $size_num; $w++) {
                                                            $size_data = $size_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $size_data["size_id"] ?>" <?php if ($s_data["size_id"] == $size_data["size_id"]) { ?> selected <?php } ?>><?php echo $size_data["name"] ?></option>

                                                        <?php
                                                        }
                                                    } else {
                                                        for ($w = 0; $w < $size_num; $w++) {
                                                            $size_data = $size_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $size_data["size_id"] ?>"><?php echo $size_data["name"] ?></option>

                                                <?php
                                                        }
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <p class="fs-5 fw-bold text-black-50">Quantity</p>
                                        </div>
                                        <?php
                                        if ($product_data["qty"] == "0") {
                                        ?>
                                            <div class="col-12 mt-3 mb-3 ">
                                                <div class="row ">
                                                    <div class="col-3 mb-2">
                                                        <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" disabled onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" class="form-control text-center border border-dark" min="1" value="0">
                                                    </div>
                                                    <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                        <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                    </div>
                                                    <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                        <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                                    </div>



                                                </div>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-12 mt-3 mb-3 ">
                                                <div class="row ">
                                                    <?php
                                                    if (isset($_SESSION["u"])) {

                                                        $c_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                        `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                        $c_num = $c_rs->num_rows;

                                                        if ($c_num == 1) {
                                                            $c_data = $c_rs->fetch_assoc();
                                                    ?>
                                                            <div class="col-3 mb-2">
                                                                <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" class="form-control text-center border border-dark" min="1" value="<?php echo $c_data["cart_qty"] ?>">
                                                            </div>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <div class="col-3 mb-2">
                                                                <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" class="form-control text-center border border-dark" min="1" value="1">
                                                            </div>
                                                        <?php

                                                        }
                                                    } else if (isset($_SESSION["uk"])) {
                                                        $c_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" . $_SESSION["uk"] . "'");
                                                        $c_num = $c_rs->num_rows;

                                                        if ($c_num == 1) {
                                                            $c_data = $c_rs->fetch_assoc();
                                                        ?>
                                                            <div class="col-3 mb-2">
                                                                <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" class="form-control text-center border border-dark" min="1" value="<?php echo $c_data["cart_qty"] ?>">
                                                            </div>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <div class="col-3 mb-2">
                                                                <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" class="form-control text-center border border-dark" min="1" value="1">
                                                            </div>
                                                    <?php

                                                        }
                                                    }
                                                    ?>

                                                    <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                        <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                    </div>
                                                    <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                        <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                                    </div>



                                                </div>

                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="row">
                                        <?php
                                        if ($product_data["qty"] > 0) {
                                        ?>

                                            <div class="col-6 mt-4 d-grid">
                                                <a href="#!" class="btn btn-primary rounded rounded-5" onclick="buyNowSingleProduct(<?php echo $product_data['id'] ?>)">Buy Now</a>
                                            </div>
                                            <?php
                                            if (isset($_SESSION["u"])) {

                                                if ($product_data["qty"] == 0) {
                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                            ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Added to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            } else if (isset($_SESSION["uk"])) {

                                                if ($product_data["qty"] == 0) {
                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" . $_SESSION["uk"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    }
                                                } else {
                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Added to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                            <?php

                                                    }
                                                }
                                            }
                                            ?>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6 mt-4 d-grid">
                                                <a href="#!" class="btn btn-primary rounded rounded-5 disabled">Buy Now</a>
                                            </div>

                                            <?php
                                            if (isset($_SESSION["u"])) {

                                                if ($product_data["qty"] == 0) {
                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                            ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Added to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            } else if (isset($_SESSION["uk"])) {

                                                if ($product_data["qty"] == 0) {
                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" . $_SESSION["uk"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 disabled " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                                    <?php

                                                    }
                                                } else {
                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                                                    $cart_num = $cart_rs->num_rows;

                                                    if ($cart_num == 1) {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Added to Cart</button>
                                                        </div>
                                                    <?php

                                                    } else {

                                                    ?>
                                                        <div class="col-6 mt-4 d-grid">
                                                            <button class="btn btn-outline-primary rounded rounded-5 " id="sp<?php echo $product_data['id'] ?>" onclick="addToCartSinglProduct('<?php echo $product_data['id'] ?>')"><i class="bi bi-cart4 fs-5"></i> &nbsp; &nbsp; Add to Cart</button>
                                                        </div>
                                            <?php

                                                    }
                                                }
                                            }
                                            ?>



                                        <?php
                                        }
                                        ?>




                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 ">
                                            <p class="fs-5 fw-bold text-black-50">Description</p>
                                        </div>
                                        <div class="col-8 col-lg-5 mt-2">
                                            <label class="form-label">
                                                <?php echo $product_data['description'] ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-3">Similar Products</h2>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <?php
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `sub_category_id`='" . $product_data["sub_category_id"] . "'
                                    AND 
                                    `status_id`='1'  LIMIT 6 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();

                                        ?>
                                            <div class="col-12 col-lg-2 p-2">
                                                <a class="text-decoration-none text-black" data-bs-toggle="offcanvas" href="#offcanvasExample<?php echo $product_data['id'] ?>" role="button" aria-controls="offcanvasExample<?php echo $product_data['id'] ?>">
                                                    <?php
                                                    $productImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data['id'] . "'");
                                                    $productImage_data = $productImage_rs->fetch_assoc();
                                                    ?>
                                                    <div class="card shadow p-3">
                                                        <img src="<?php echo $productImage_data['code'] ?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                            <span class="card-text text-primary">Rs. <?php echo $product_data["price"] ?> .00</span> <br />

                                                            <a class="col-12 btn btn-primary rounded rounded-5 mt-3" href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>'>Buy Now</a>
                                                            <?php
                                                            if (isset($_SESSION["u"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                            ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"><i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                }
                                                            } else if (isset($_SESSION["uk"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" . $_SESSION["uk"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);">Add to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> <i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                            <?php

                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($_SESSION["u"])) {

                                                                $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                $wishlist_num = $wishlist_rs->num_rows;

                                                                if ($wishlist_num == 1) {

                                                            ?>
                                                                    <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['id'] ?>" onclick="addToWishlist(<?php echo $product_data['id'] ?>);">
                                                                        <i class="bi bi-heart-fill fs-5"></i> &nbsp; Added to Wishlist
                                                                    </button>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['id'] ?>" onclick="addToWishlist(<?php echo $product_data['id'] ?>);">
                                                                        <i class="bi bi-heart  fs-5"></i> &nbsp; Add to Wishlist
                                                                    </button>
                                                                <?php
                                                                }
                                                            } else if (isset($_SESSION["uk"])) {

                                                                $wishlist_rs = Database::search("SELECT * FROM `wishlist_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                              `user_code`='" . $_SESSION["uk"] . "'");
                                                                $wishlist_num = $wishlist_rs->num_rows;

                                                                if ($wishlist_num == 1) {

                                                                ?>
                                                                    <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['id'] ?>" onclick="addToWishlist(<?php echo $product_data['id'] ?>);">
                                                                        <i class="bi bi-heart-fill fs-5"></i> &nbsp; Added to Wishlist
                                                                    </button>
                                                                <?php

                                                                } else {

                                                                ?>
                                                                    <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2" id="wl<?php echo $product_data['id'] ?>" onclick="addToWishlist(<?php echo $product_data['id'] ?>);">
                                                                        <i class="bi bi-heart  fs-5"></i> &nbsp; Add to Wishlist
                                                                    </button>
                                                            <?php

                                                                }
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </a>



                                                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample<?php echo $product_data['id'] ?>" aria-labelledby="offcanvasExampleLabel<?php echo $product_data['id'] ?>">
                                                    <div class="offcanvas-header d-flex justify-content-end">


                                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>

                                                    <div class="offcanvas-body">
                                                        <div class="row ">
                                                            <?php
                                                            $mainImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $mainImage_data = $mainImage_rs->fetch_assoc();
                                                            ?>

                                                            <div class="col-12   rounded rounded-2 p-3">
                                                                <img src="<?php echo $mainImage_data["code"] ?>" id="mainImg<?php echo $product_data['id'] ?>" style="width: 360px; ">
                                                            </div>
                                                            <?php
                                                            $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $image_num = $image_rs->num_rows;

                                                            $img = array();

                                                            for ($y = 0; $y < $image_num; $y++) {
                                                                $image_data = $image_rs->fetch_assoc();
                                                                $img[$product_data["id"] . $y] = $image_data["code"];
                                                            ?>
                                                                <div class="col-2  rounded rounded-2  mt-2">
                                                                    <a href="#!"> <img src="<?php echo $img[$product_data["id"] . $y]; ?>" id="img<?php echo $product_data['id'] ?><?php echo $y ?>" onclick="loadMainImg(<?php echo $product_data['id'] ?>,<?php echo $y ?>)" style="width: 50px;" id=""></a>
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

                                                                        <select name="" id="" class="form-select">
                                                                            <?php
                                                                            $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id WHERE `product_id`='" . $product_data["id"] . "'");
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
                                                                        <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                                            <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                                        </div>
                                                                        <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                                            <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                                                        </div>

                                                                        <div class="col-4 mt-2 d-grid">
                                                                            <input type="number" class="form-control border-primary text-primary form-control-sm rounded rounded-5 fs-5 text-center" disabled id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" value="0" min="1">

                                                                        </div>
                                                                        <div class="col-8 d-grid mt-2">
                                                                            <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>' class="btn btn-primary btn-lg rounded rounded-5 text-center">View all Details</a>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="col-12 mt-3 mb-5 ">
                                                                    <div class="row ">
                                                                        <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                                            <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                                        </div>
                                                                        <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                                            <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
                                                                        </div>

                                                                        <div class="col-4 mt-2 d-grid">
                                                                            <input type="number" class="form-control border-primary text-primary form-control-sm rounded rounded-5 fs-5 text-center" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" onkeyup="offcanvasqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>);" value="1" min="1">

                                                                        </div>
                                                                        <div class="col-8 d-grid mt-2">
                                                                            <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>' class="btn btn-primary btn-lg rounded rounded-5 text-center">Buy it Now</a>

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


                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                <?php
                } else {
                    echo ("something went wrong");
                }


                ?>
                <?php include "footer.php" ?>
            </div>
        </div>


        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("Something went Wrong");
}
?>