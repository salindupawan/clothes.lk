<?php
session_start();

if (!isset($_SESSION["u"])) {
    $code = uniqid();

    $user;
    if (isset($_SESSION["uk"])) {
        $user = $_SESSION["uk"];
    } else {
        $_SESSION["uk"] = $code;
        $user = $_SESSION["uk"];
    }
}
   




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="col-12 mt-1">
        <div class="row mb-2">

            <div class="col-12 offset-lg-1 col-lg-1 d-flex justify-content-center ">
                <a href="home.php"> <img src="resources/logo.png" style="width: 100px;" alt=""></a>
            </div>
            <div class="col-10 ms-3 ms-lg-0 col-lg-8 mt-3 ">
                <div class="row">
                    <div class="col-9 col-lg-9 offset-lg-1 ">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control " placeholder="Search Anything" id="searchText">
                            <span class="input-group-text" id="basic-addon2" ><a href="#!" class="text-black" onclick="SearchProducts();"><i class="bi bi-search"></i></a></span>
                        </div>
                        

                    </div>
                    <div class="col-2">
                    <a href="category.php" class="btn btn-light">Advanced</a>
                    </div>
                </div>
            </div>
            <div class="col-1  col-lg-2">
                <div class="row">
                    <div class="col-2 my-3 d-none d-lg-block">
                        <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <img src="resources/cart.png" style="width: 30px;" alt="">

                        </a>
                    </div>
                    <div class="col-2 ms-2 d-none my-3 d-lg-block">
                        <img src="resources/wishlist.png" onclick="window.location='watchlist.php'" style="width: 30px;" alt="">

                    </div>
                    <div class="col-4 offset-2">
                        <div class="row">
                            <div class="dropdown">
                                <label class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    require "connection.php";

                                    if (isset($_SESSION["u"])) {

                                        $data = $_SESSION["u"];
                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $data["email"] . "'");
                                        $user_data = $user_rs->fetch_assoc();

                                        $profileImage = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $data["email"] . "'");
                                        $profileImageNum = $profileImage->num_rows;

                                        if ($profileImageNum == 1) {
                                            $imgData = $profileImage->fetch_assoc();
                                    ?>
                                            <img src="<?php echo $imgData["path"] ?>" class="round rounded-circle" style="width: 50px; height: 50px;" alt="">

                                        <?php
                                        } else {
                                        ?>
                                            <img src="resources/emptyUser.png" class="round rounded-circle" style="width: 45px; height: 45px;" alt="">

                                        <?php

                                        }
                                    } else {
                                        ?>
                                        <img src="resources/emptyUser.png" class="round rounded-circle" style="width: 45px; height: 45px;" alt="">
                                    <?php
                                    }
                                    ?>

                                </label>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($_SESSION["u"])) {

                                    ?>
                                        <li>
                                            <p class="dropdown-item fw-bold curserpoint">Hello <?php echo $user_data["fname"] ?>!</p>
                                        <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>

                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <p class="dropdown-item fw-bold curserpoint">Hello User!</p>
                                        <li><a class="dropdown-item" href="index.php">Sign in or Regester</a></li>

                                        </li>
                                    <?php
                                    }
                                    ?>


                                    <li><a class="dropdown-item" href="adminSignIn.php">Admin</a></li>
                                    <li><a class="dropdown-item" href="dashboard.php">dashboard</a></li>
                                    <li><a class="dropdown-item" href="addProduct.php">Add Products</a></li>
                                    <li><a class="dropdown-item" href="updateProduct.php">Update Products</a></li>
                                    <li><a class="dropdown-item" href="watchlist.php">Wishlist</a></li>
                                    <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History</a></li>
                                    <li><a class="dropdown-item" href="singleProductView.php">Single Product View</a></li>
                                    <li><a class="dropdown-item" href="invoice.php">Invoice</a></li>
                                    <li><a class="dropdown-item d-block d-lg-none" href="watchlist.php">Wishlist</a></li>

                                    <li><a class="dropdown-item d-block d-lg-none" href="cart.php" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            Cart
                                        </a></li>

                                    <?php
                                    if (isset($_SESSION["u"])) {

                                    ?>
                                        <li><a class="dropdown-item" href="#" onclick="signOut();">Sign Out</a></li>

                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                            <?php
                            if (isset($_SESSION["u"])) {
                            ?>

                                <?php
                                $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id WHERE `user_email`= '" . $_SESSION["u"]["email"] . "' AND `qty`>0 AND `status_id`='1'");
                                $cart_num = $cart_rs->num_rows;

                                $total = 0;
                                $shipping = 0;
                                $subtotal = 0;

                                if ($cart_num > 0) {
                                ?>
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title fs-2" id="offcanvasRightLabel">Cart <span class="fs-5">(<?php echo $cart_num ?>)</span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();
                                            ?>
                                                <div class="col-12  ">

                                                    <?php
                                                    $product_rs = Database::search("SELECT * FROM `product`  WHERE `id`='" . $cart_data["product_id"] . "'");
                                                    $product_data = $product_rs->fetch_assoc();

                                                    $total = $total + ($product_data["price"] * $cart_data["cart_qty"]);

                                                    $deliveryfee_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `id`= '" . $product_data["delivery_fee_id"] . "'");
                                                    $deliveryfee_data = $deliveryfee_rs->fetch_assoc();
                                                    $deliveryfee = $deliveryfee_data["fee"];

                                                    if ($shipping < $deliveryfee) {
                                                        $shipping = $deliveryfee;
                                                    }
                                                    ?>

                                                    <div class="card mb-3 shadow" id="card<?php echo $product_data['id'] ?>">

                                                        <div class="row g-0">
                                                            <?php
                                                            $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $imge_data = $imge_rs->fetch_assoc();
                                                            ?>
                                                            <div class="col-4 p-2">
                                                                <img src="<?php echo $imge_data["code"] ?>" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                    <span class="fs-6 fw-bold text-black-50"> Rs. <?php echo $product_data["price"] ?> .00</span><br>
                                                                    <div class="row">
                                                                        <?php
                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                        $colour_data = $colour_rs->fetch_assoc();
                                                                        ?>
                                                                        <div class="col-12 mt-3">
                                                                            <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                            <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                        </div>
                                                                        <div class="col-3 mt-3 mb-2">
                                                                            <span class="fs-6 mt-3 text-black-50">Size : </span>

                                                                        </div>
                                                                        <div class="col-6 mt-3 mb-2">
                                                                            <?php
                                                                            $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id   WHERE `product_id`='" . $product_data["id"] . "' AND `status`='1' ");
                                                                            $size_num = $size_rs->num_rows;

                                                                            ?>
                                                                            <select name="" id="sizeheader<?php echo $product_data['id'] ?>" onchange="saveSizeHeader(<?php echo $product_data['id'] ?>)" class="form-select form-select-sm">
                                                                                <?php
                                                                                for ($y = 0; $y < $size_num; $y++) {
                                                                                    $size_data = $size_rs->fetch_assoc();
                                                                                ?>
                                                                                    <option value="<?php echo $size_data["size_id"] ?>" <?php if ($cart_data["size_id"] == $size_data["size_id"]) { ?> selected <?php } ?>><?php echo $size_data["name"] ?></option>

                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-12 ">
                                                                            <span class="fs-6 mt-3 text-black-50">Qty : </span>
                                                                            <span class="fs-6 text-black-50"> <?php echo $cart_data["cart_qty"] ?></span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>

                                    </div>
                                <?php


                                } else {

                                ?>
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title fs-2" id="offcanvasRightLabel">Cart <span class="fs-5">(0)</span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="row ">
                                                    <div class="col-6 offset-3 d-flex justify-content-center mt-5">
                                                        <img src="resources/emptyCart.png" style="height: 300px;" alt="">
                                                    </div>

                                                    <div class="col-12 text-center" style="margin-bottom: 140px;">
                                                        <h3 class="fw-bold fs-5 ">Ooops... You don't have anything in the cart at the moment.</h3>

                                                        <div class="row">
                                                            <div class="col-6 d-grid offset-3 mt-4">
                                                                <a href="home.php" class="btn btn-outline-primary  fs-5 rounded rounded-5">Let's find something</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                        </div>

                                    </div>
                                <?php


                                }


                                ?>


                                <?php
                                if ($cart_num > 0) {
                                ?>
                                    <div class="offcanvas-bottom ">
                                        <div class="row px-3 ">
                                            <div class="col-6">
                                                <?php
                                                if ($cart_num == 1) {
                                                ?>
                                                    <p class="fs-6">Total ( <?php echo $cart_num ?> item)</p>

                                                <?php

                                                } else {
                                                ?>
                                                    <p class="fs-6">Total ( <?php echo $cart_num ?> items)</p>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-6 fw-bold">Rs. <?php echo $total ?>.00</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="fs-6">Shipping</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-6 fw-bold">Rs. <?php echo $shipping ?>.00</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="fs-5 fw-bold">Subtotal</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-5 fw-bold">Rs. <?php echo $total + $shipping ?>.00</p>
                                            </div>
                                            <div class="col-6 mb-3 d-grid">
                                                <button class="btn btn-primary rounded rounded-5">Checkout</button>
                                            </div>
                                            <div class="col-6 mb-3 d-grid">
                                                <a href="cart.php" class="btn btn-outline-primary rounded rounded-5">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            <?php

                            } else if (isset($_SESSION["uk"])) {



                            ?>

                                <?php
                                $cart_rs = Database::search("SELECT * FROM `cart_non` INNER JOIN `product` ON cart_non.product_id=product.id WHERE `user_code`= '" . $_SESSION["uk"] . "' AND `qty`> 0 AND `status_id`='1'");
                                $cart_num = $cart_rs->num_rows;

                                $total = 0;
                                $shipping = 0;
                                $subtotal = 0;

                                if ($cart_num > 0) {
                                ?>
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title fs-2" id="offcanvasRightLabel">Cart <span class="fs-5">(<?php echo $cart_num ?>)</span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();
                                            ?>
                                                <div class="col-12  ">

                                                    <?php
                                                    $product_rs = Database::search("SELECT * FROM `product`  WHERE `id`='" . $cart_data["product_id"] . "' ");
                                                    $product_data = $product_rs->fetch_assoc();

                                                    $total = $total + ($product_data["price"] * $cart_data["cart_qty"]);


                                                    $deliveryfee_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `id`= '" . $product_data["delivery_fee_id"] . "'");
                                                    $deliveryfee_data = $deliveryfee_rs->fetch_assoc();
                                                    $deliveryfee = $deliveryfee_data["fee"];

                                                    if ($shipping < $deliveryfee) {
                                                        $shipping = $deliveryfee;
                                                    }
                                                    ?>

                                                    <div class="card mb-3 shadow ">

                                                        <div class="row g-0">
                                                            <?php
                                                            $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $imge_data = $imge_rs->fetch_assoc();
                                                            ?>
                                                            <div class="col-4 p-2">
                                                                <img src="<?php echo $imge_data["code"] ?>" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                    <span class="fs-6 fw-bold text-black-50"> Rs. <?php echo $product_data["price"] ?> .00</span><br>
                                                                    <div class="row">
                                                                        <?php
                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                        $colour_data = $colour_rs->fetch_assoc();
                                                                        ?>
                                                                        <div class="col-12 mt-3">
                                                                            <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                            <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                        </div>
                                                                        <div class="col-3 mt-3 mb-2">
                                                                            <span class="fs-6 mt-3 text-black-50">Size : </span>

                                                                        </div>
                                                                        <div class="col-6 mt-3 mb-2">
                                                                            <?php
                                                                            $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id   WHERE `product_id`='" . $product_data["id"] . "' AND `status`='1'");
                                                                            $size_num = $size_rs->num_rows;

                                                                            ?>
                                                                            <select name="" id="sizeheader<?php echo $product_data['id'] ?>" onchange="saveSizeHeader(<?php echo $product_data['id'] ?>)" class="form-select form-select-sm">
                                                                                <?php
                                                                                for ($y = 0; $y < $size_num; $y++) {
                                                                                    $size_data = $size_rs->fetch_assoc();
                                                                                ?>
                                                                                    <option value="<?php echo $size_data["size_id"] ?>" <?php if ($cart_data["size_id"] == $size_data["size_id"]) { ?> selected <?php } ?>><?php echo $size_data["name"] ?></option>

                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-12 ">
                                                                            <span class="fs-6 mt-3 text-black-50">Qty : </span>
                                                                            <span class="fs-6 text-black-50"> <?php echo $cart_data["cart_qty"] ?></span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>

                                    </div>
                                <?php


                                } else {

                                ?>
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title fs-2" id="offcanvasRightLabel">Cart <span class="fs-5">(0)</span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="row ">
                                                    <div class="col-6 offset-3 d-flex justify-content-center mt-5">
                                                        <img src="resources/emptyCart.png" style="height: 300px;" alt="">
                                                    </div>

                                                    <div class="col-12 text-center" style="margin-bottom: 140px;">
                                                        <h3 class="fw-bold fs-5 ">Ooops... You don't have anything in the cart at the moment.</h3>

                                                        <div class="row">
                                                            <div class="col-6 d-grid offset-3 mt-4">
                                                                <a href="home.php" class="btn btn-outline-primary  fs-5 rounded rounded-5">Let's find something</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                        </div>

                                    </div>
                                <?php


                                }


                                ?>


                                <?php
                                if ($cart_num > 0) {
                                ?>
                                    <div class="offcanvas-bottom ">
                                        <div class="row px-3 ">
                                            <div class="col-6">
                                                <?php
                                                if ($cart_num == 1) {
                                                ?>
                                                    <p class="fs-6">Total ( <?php echo $cart_num ?> item)</p>

                                                <?php

                                                } else {
                                                ?>
                                                    <p class="fs-6">Total ( <?php echo $cart_num ?> items)</p>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-6 fw-bold">Rs. <?php echo $total ?>.00</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="fs-6">Shipping</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-6 fw-bold">Rs. <?php echo $shipping ?>.00</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="fs-5 fw-bold">Subtotal</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="fs-5 fw-bold">Rs. <?php echo $total + $shipping ?>.00</p>
                                            </div>
                                            <div class="col-6 mb-3 d-grid">
                                                <button class="btn btn-primary rounded rounded-5">Checkout</button>
                                            </div>
                                            <div class="col-6 mb-3 d-grid">
                                                <a href="cart.php" class="btn btn-outline-primary rounded rounded-5">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            <?php

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </div>

    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>