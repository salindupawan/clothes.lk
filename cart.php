<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include "header1.php";

            if (isset($_SESSION["u"])) {

                $cart_rs = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id WHERE `user_email`= '" . $_SESSION["u"]["email"] . "' AND `qty`>0");
                $cart_num = $cart_rs->num_rows;

                $total = 0;
                $shipping = 0;
                $subtotal = 0;

                if ($cart_num > 0) {
            ?>
                    <div class="col-12  pe-0 pe-lg-3">
                        <div class="row">
                            <div class="col-12 p-3 mb-5 mb-lg-0 p-lg-5">
                                <div class="row">
                                    <div class="col-12 ">
                                        <h2 class="fw-bold text-start ">Shopping Cart <span class="fs-4">(<?php echo $cart_num ?> Items)</span> </h2>

                                    </div>

                                    <div class="col-4 col-lg-2 ms-2 border-bottom border-success border-4"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 mb-3  p-1 p-lg-5">
                                <div class="row">
                                    <div class="col-12  ">
                                        <div class="row border-4 mb-3 border-bottom">
                                            <div class="col-6">
                                                <p class="fw-bold">Item</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Price</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Quantity</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Subtotal</p>
                                            </div>

                                        </div>
                                        <?php
                                        for ($x = 0; $x < $cart_num; $x++) {

                                            $cart_data = $cart_rs->fetch_assoc();

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

                                            <div class="row  border-2 mb-3 border-bottom">
                                                <div class="col-6">
                                                    <div class="card  border-0 mb-3 w-100">
                                                        <div class="row g-0">
                                                            <?php
                                                            $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $cart_data["product_id"]  . "'");
                                                            $imge_data = $imge_rs->fetch_assoc();
                                                            ?>
                                                            <div class="col-4">
                                                                <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>'>
                                                                    <img src="<?php echo $imge_data["code"] ?>" class="img-fluid rounded" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="col-7 offset-1">
                                                                <div class="row">
                                                                    <div class="col-12   card-body">
                                                                        <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?> </h5>
                                                                        <div class="row">
                                                                            <div class="col-8 col-lg-6 mt-3">
                                                                                <span class="fs-6 fw-bold text-black-50">Size</span> <br>


                                                                                <?php
                                                                                $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id   WHERE `product_id`='" . $product_data["id"] . "' AND `status`='1' ");
                                                                                $size_num = $size_rs->num_rows;



                                                                                ?>
                                                                                <select name="" id="size<?php echo $product_data['id'] ?>" onchange="saveSize('<?php echo $product_data['id'] ?>')" class="form-select form-select-sm">
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
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                        $colour_data = $colour_rs->fetch_assoc();
                                                                        ?>
                                                                    <div class="col-12">
                                                                        <span class="fs-6 mt-3 text-black-50"> Colour : </span>
                                                                        <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                    </div>
                                                                    <div class="col-12 d-none d-lg-block mt-2">
                                                                        <a href="#!" onclick="deleteFromCart(<?php echo $product_data['id'] ?>);" class="btn btn-outline-secondary"> <i class="bi bi-trash3-fill"></i> &nbsp; Remove</a>
                                                                    </div>
                                                                    <div class="col-12 d-block d-lg-none ">
                                                                        <a href="#!" onclick="deleteFromCart(<?php echo $product_data['id'] ?>);" class="text-danger"> Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4 text-end mt-3">
                                                            <h3 class="fw-bold">
                                                                Rs. <br> <?php echo $product_data["price"] ?>.00
                                                            </h3>
                                                        </div>
                                                        <div class="col-4 ps-4 ps-lg-5  text-end mt-3  justify-content-end">
                                                            <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="cartqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>,<?php echo $product_data['price'] ?>);" onkeyup="cartqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>,<?php echo $product_data['price'] ?>);" value="<?php echo $cart_data["cart_qty"] ?>" min="1" class="form-control text-center fw-bold fs-5">
                                                        </div>
                                                        <div class="col-4 text-end mt-3">
                                                            <h3 class="fw-bold">
                                                                Rs. <br> <span class="fs-3 fw-bold" id="subtotal<?php echo $product_data["id"] ?>"><?php echo $product_data["price"] * $cart_data["cart_qty"] ?></span>.00
                                                            </h3>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <div class="row ">
                                                                <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                                    <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                                </div>
                                                                <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                                    <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
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
                                <div class="row p-0">

                                    <div class="col-4 offset-8 col-lg-2 offset-lg-10 d-grid ">
                                        <a href="#!" onclick="clearCart();" class="btn btn-outline-success rounded-0">Clear Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 px-5 mb-4 mb-lg-0 mt-2 mt-lg-5">
                                <div class="row">
                                    <div class="col-12 p-4 border">
                                        <h3 class="fw-bold">SUMMARY</h3>
                                        <hr>
                                        <div class="row px-3 ">
                                            <div class="col-6 mt-3">
                                                <span class="fs-6 ">Subtotal</span>
                                            </div>
                                            <div class="col-6 mt-3 text-end">
                                                <span class="fs-6">Rs. <span class="fs-6" id="subTotal"><?php echo $total ?></span>.00</span>
                                            </div>
                                            <hr>
                                            <div class="col-6 mt-1">
                                                <span class="fs-6 ">Shipping</span>
                                            </div>
                                            <div class="col-6 mt-1 text-end">
                                                <span class="fs-6">Rs. <span class="fs-6" id="shipping"><?php echo $shipping ?></span>.00</span>
                                            </div>
                                            <hr>
                                            <div class="col-6 mt-1">
                                                <span class="fs-5 fw-bold">Order Total</span>
                                            </div>
                                            <div class="col-6 mt-1 text-end">
                                                <span class="fs-6 fw-bold">Rs. <span class="fs-6" id="OrderTotal"><?php echo $total + $shipping ?></span>.00</span>
                                            </div>
                                            <hr class="mt-2">
                                            <div class="col-6 mt-4 d-grid offset-3" id="btn">
                                                <a href="checkout.php" class="btn btn-success rounded-0 border-success ">Procced to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php


                } else {

                ?>
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
                }
            } else if (isset($_SESSION["uk"])) {

                $cart_rs = Database::search("SELECT * FROM `cart_non` INNER JOIN `product` ON cart_non.product_id=product.id WHERE `user_code`= '" . $_SESSION["uk"] . "' AND `qty`> 0");
                $cart_num = $cart_rs->num_rows;


                $total = 0;
                $shipping = 0;
                $subtotal = 0;
                $price = array();

                if ($cart_num > 0) {
                ?>
                    <div class="col-12  pe-0 pe-lg-3">
                        <div class="row">
                            <div class="col-12 p-3 mb-5 mb-lg-0 p-lg-5">
                                <div class="row">
                                    <div class="col-12 ">
                                        <h2 class="fw-bold text-start ">Shopping Cart <span class="fs-4">(<?php echo $cart_num ?> Items)</span> </h2>

                                    </div>

                                    <div class="col-4 col-lg-2 ms-2 border-bottom border-success border-4"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 mb-3  p-1 p-lg-5">
                                <div class="row">
                                    <div class="col-12  ">
                                        <div class="row border-4 mb-3 border-bottom">
                                            <div class="col-6">
                                                <p class="fw-bold">Item</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Price</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Quantity</p>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p class="fw-bold">Subtotal</p>
                                            </div>

                                        </div>
                                        <?php
                                        for ($x = 0; $x < $cart_num; $x++) {

                                            $cart_data = $cart_rs->fetch_assoc();

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

                                            <div class="row  border-2 mb-3 border-bottom">
                                                <div class="col-6">
                                                    <div class="card  border-0 mb-3 w-100">
                                                        <div class="row g-0">
                                                            <?php
                                                            $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $cart_data["product_id"]  . "'");
                                                            $imge_data = $imge_rs->fetch_assoc();
                                                            ?>
                                                            <div class="col-4">
                                                                <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>'>
                                                                    <img src="<?php echo $imge_data["code"] ?>" class="img-fluid rounded" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="col-7 offset-1">
                                                                <div class="row">
                                                                    <div class="col-12 mb-0 mb-lg-4  card-body">
                                                                        <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?> </h5>
                                                                        <div class="row">
                                                                            <div class="col-8 col-lg-6 mt-3">
                                                                                <span class="fs-6 fw-bold text-black-50">Size</span> <br>


                                                                                <?php
                                                                                $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id   WHERE `product_id`='" . $product_data["id"] . "' AND `status`='1'");
                                                                                $size_num = $size_rs->num_rows;

                                                                                ?>
                                                                                <select name="" class="form-select form-select-sm" id="size<?php echo $product_data['id'] ?>" onchange="saveSize(<?php echo $product_data['id'] ?>)">
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 d-none d-lg-block mt-2">
                                                                        <a href="#!" onclick="deleteFromCart(<?php echo $product_data['id'] ?>);" class="btn btn-outline-secondary"> <i class="bi bi-trash3-fill"></i> &nbsp; Remove</a>
                                                                    </div>
                                                                    <div class="col-12 d-block d-lg-none ">
                                                                        <a href="#!" onclick="deleteFromCart(<?php echo $product_data['id'] ?>);" class="text-danger"> Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4 text-end mt-3">
                                                            <h3 class="fw-bold">
                                                                Rs. <br> <?php echo $product_data["price"] ?>.00
                                                            </h3>
                                                        </div>
                                                        <div class="col-4 ps-4 ps-lg-5  text-end mt-3  justify-content-end">
                                                            <input type="number" id="offcanvasqty<?php echo $product_data['id'] ?>" onchange="cartqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>,<?php echo $product_data['price'] ?>);" onkeyup="cartqtycalc(<?php echo $product_data['qty'] ?>,<?php echo $product_data['id'] ?>,<?php echo $product_data['price'] ?>);" value="<?php echo $cart_data["cart_qty"] ?>" min="1" class="form-control text-center fw-bold fs-5">
                                                        </div>
                                                        <div class="col-4 text-end mt-3">
                                                            <h3 class="fw-bold">
                                                                Rs. <br> <span class="fs-3 fw-bold" id="subtotal<?php echo $product_data["id"] ?>"><?php echo $product_data["price"] * $cart_data["cart_qty"] ?></span>.00
                                                            </h3>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <div class="row ">
                                                                <div class="col-12 mt-2 d-none" id="tsuccess<?php echo $product_data['id'] ?>">
                                                                    <p class="text-success fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> You have selected the maximum quantity availble at the moment.</p>
                                                                </div>
                                                                <div class="col-12 d-none mt-2" id="tdanger<?php echo $product_data['id'] ?>">
                                                                    <p class="text-danger fw-bold fs-6"><i class="bi bi-info-circle-fill"></i> Hmm...Sorry, requested amount for this item is not availble at the moment.</p>
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
                                <div class="row p-0">

                                    <div class="col-4 offset-8 col-lg-2 offset-lg-10 d-grid ">
                                        <a href="#!" onclick="clearCart();" class="btn btn-outline-success rounded-0">Clear Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 px-5 mb-4 mb-lg-0 mt-2 mt-lg-5">
                                <div class="row">
                                    <div class="col-12 p-4 border">
                                        <h3 class="fw-bold">SUMMARY</h3>
                                        <hr>
                                        <div class="row px-3 ">
                                            <div class="col-6 mt-3">
                                                <span class="fs-6 ">Subtotal</span>
                                            </div>
                                            <div class="col-6 mt-3 text-end">
                                                <span class="fs-6">Rs. <span class="fs-6" id="subTotal"><?php echo $total ?></span>.00</span>
                                            </div>
                                            <hr>
                                            <div class="col-6 mt-1">
                                                <span class="fs-6 ">Shipping</span>
                                            </div>
                                            <div class="col-6 mt-1 text-end">
                                                <span class="fs-6">Rs. <span class="fs-6" id="shipping"><?php echo $shipping ?></span>.00</span>
                                            </div>
                                            <hr>
                                            <div class="col-6 mt-1">
                                                <span class="fs-5 fw-bold">Order Total</span>
                                            </div>
                                            <div class="col-6 mt-1 text-end">
                                                <span class="fs-6 fw-bold">Rs. <span class="fs-6" id="OrderTotal"><?php echo $total + $shipping ?></span>.00</span>
                                            </div>
                                            <hr class="mt-2">
                                            <div class="col-6 mt-4 d-grid offset-3" id="btn">
                                                <a href="checkout.php"  class="btn btn-success rounded-0 border-success ">Procced to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php


                } else {
                ?>
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
                }
            } else {
            }
            ?>




            <?php include "footer.php" ?>
        </div>
    </div>



    <script src="script.js"></script>
</body>

</html>