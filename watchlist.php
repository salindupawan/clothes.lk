<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row ">
            <?php include "header.php";
            
            ?>

            <div class="col-12">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="resources/wishlistimg.jpg" class="img-fluid w-100" alt="...">

                        </div>

                    </div>

                </div>
            </div>


            <div class="col-12 bg-body p-2 rounded rounded-3 border mt-3 mb-3" >
                <div class="row " id="searchResults">
                    <div class="col-12">
                        <div class="row">
                            <?php
                            if (isset($_SESSION["u"])) {
                                $wishlist_rs = Database::search("SELECT 
                                product.id AS id , product.title AS title, product.price AS price , product.description AS description , product.qty AS qty , product.colour_id AS colour_id
                                  FROM `wishlist` INNER JOIN `product` ON wishlist.product_id=product.id WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  AND `status_id`='1'");
                                $wishlist_num = $wishlist_rs->num_rows;

                                if ($wishlist_num > 0) {

                                    for ($x = 0; $x < $wishlist_num; $x++) {
                                        $product_data = $wishlist_rs->fetch_assoc();


                            ?>
                                        <div class="col-12 col-lg-2 p-3">
                                            <a class="text-decoration-none text-black" data-bs-toggle="offcanvas" href="#offcanvasExample<?php echo $product_data['id'] ?>" role="button" aria-controls="offcanvasExample<?php echo $product_data['id'] ?>">

                                                <div class="card shadow p-3">
                                                    <?php
                                                    $productImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data['id'] . "'");
                                                    $productImage_data = $productImage_rs->fetch_assoc();
                                                    ?>
                                                    <div class="col-12">
                                                        <img src="<?php echo $productImage_data['code'] ?>" class="card-img-top" alt="...">

                                                    </div>


                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5 class="card-title text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                <span class="card-text text-primary"> Rs. <?php echo $product_data["price"] ?> .00</span> <br />
                                                            </div>
                                                            <div class="col-12 text-end" style="margin-top: -20px;">
                                                                <a href="#!" onclick="RemoveWishlist(<?php echo $product_data['id'] ?>);"><i class="bi bi-heart-fill text-danger fs-2" id="h<?php echo $product_data['id'] ?>"></i></a>
                                                            </div>

                                                            <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>' class="col-10 offset-1 btn btn-primary rounded rounded-5 mt-2">Buy Now</a>
                                                            <?php
                                                            if (isset($_SESSION["u"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                            ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"><i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                }
                                                            } else if (isset($_SESSION["uk"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" . $user . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);">Add to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> <i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                            <?php

                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <!-- <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2">Add to Cart</button> -->
                                                        </div>


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
                                } else {
                                    ?>
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="row ">
                                            <div class="col-6 offset-3 d-flex justify-content-center mt-5">
                                                <img src="resources/emptyWishlist.png" style="height: 400px;" alt="">
                                            </div>

                                            <div class="col-12 text-center" style="margin-bottom: 140px;">
                                                <h3 class="fw-bold fs-4 ">Hmm... Sorry we were unable to find what you are looking.</h3>
                                                <p class=" fs-6 text-black-50">At Clothes.lk we have a wide range of product collection for everyone including men, women, kids, athletes. Let’s <br>
                                                    find something for you.</p>
                                                <div class="row">
                                                    <div class="col-4 d-grid offset-4 mt-4">
                                                        <a href="home.php" class="btn btn-outline-primary  fs-5 rounded rounded-5">Let's find something</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else if (isset($_SESSION["uk"])) {

                                $wishlist_rs = Database::search("SELECT 
                                product.id AS id , product.title AS title, product.price AS price , product.description AS description , product.qty AS qty , product.colour_id AS colour_id
                                  FROM `wishlist_non` INNER JOIN `product` ON wishlist_non.product_id=product.id WHERE `user_code`='" . $_SESSION["uk"] . "' AND `status_id`='1'");
                                $wishlist_num = $wishlist_rs->num_rows;

                                if ($wishlist_num > 0) {

                                    for ($x = 0; $x < $wishlist_num; $x++) {
                                        $product_data = $wishlist_rs->fetch_assoc();


                                    ?>
                                        <div class="col-12 col-lg-2 p-3">
                                            <a class="text-decoration-none text-black" data-bs-toggle="offcanvas" href="#offcanvasExample<?php echo $product_data['id'] ?>" role="button" aria-controls="offcanvasExample<?php echo $product_data['id'] ?>">

                                                <div class="card shadow p-3">
                                                    <?php
                                                    $productImage_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data['id'] . "'");
                                                    $productImage_data = $productImage_rs->fetch_assoc();
                                                    ?>
                                                    <div class="col-12">
                                                        <img src="<?php echo $productImage_data['code'] ?>" class="card-img-top" alt="...">

                                                    </div>


                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5 class="card-title text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                <span class="card-text text-primary"> Rs. <?php echo $product_data["price"] ?> .00</span> <br />
                                                            </div>
                                                            <div class="col-12 text-end" style="margin-top: -20px;">
                                                                <a href="#!" onclick="RemoveWishlist(<?php echo $product_data['id'] ?>);"><i class="bi bi-heart-fill text-danger fs-2" id="h<?php echo $product_data['id'] ?>"></i></a>
                                                            </div>

                                                            <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>' class="col-10 offset-1 btn btn-primary rounded rounded-5 mt-2">Buy Now</a>
                                                            <?php
                                                            if (isset($_SESSION["u"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                            ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                               `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"><i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php
                                                                    }
                                                                }
                                                            } else if (isset($_SESSION["uk"])) {

                                                                if ($product_data["qty"] == 0) {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_code`='" .$_SESSION["uk"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);">Add to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2 disabled" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                                    <?php

                                                                    }
                                                                } else {
                                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_code`='" . $_SESSION["uk"] . "'");
                                                                    $cart_num = $cart_rs->num_rows;

                                                                    if ($cart_num == 1) {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> <i class="bi bi-check-lg"></i> Added to Cart</button>

                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2" id="ac<?php echo $product_data['id'] ?>" onclick="addToCart(<?php echo $product_data['id'] ?>);"> Add to Cart</button>

                                                            <?php

                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <!-- <button class="col-10 offset-1 btn btn-info text-white rounded rounded-5 mt-2">Add to Cart</button> -->
                                                        </div>


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
                                } else {
                                    ?>
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="row ">
                                            <div class="col-6 offset-3 d-flex justify-content-center mt-5">
                                                <img src="resources/emptyWishlist.png" style="height: 400px;" alt="">
                                            </div>

                                            <div class="col-12 text-center" style="margin-bottom: 140px;">
                                                <h3 class="fw-bold fs-4 ">Hmm... Sorry we were unable to find what you are looking.</h3>
                                                <p class=" fs-6 text-black-50">At Clothes.lk we have a wide range of product collection for everyone including men, women, kids, athletes. Let’s <br>
                                                    find something for you.</p>
                                                <div class="row">
                                                    <div class="col-4 d-grid offset-4 mt-4">
                                                        <a href="home.php" class="btn btn-outline-primary  fs-5 rounded rounded-5">Let's find something</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>




                </div>
            </div>


            <?php include "footer.php" ?>
        </div>
    </div>



    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="script.js"></script>
</body>

</html>