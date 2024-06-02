<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body class="bg-body">

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php" ?>
            <div class="col-12 px-2 px-lg-5 mt-4">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="fw-bold">Shipping Details</h2>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>


                        </div>
                        <?php
                        if (isset($_SESSION["u"])) {

                            $email = $_SESSION["u"]["email"];

                            $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                              gender.id=user.gender_id WHERE `email`='" . $email . "'");

                            $image_rs = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $email . "'");

                            $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                               user_has_address.city_id=city.id INNER JOIN `district` ON 
                              city.district_id=district.id INNER JOIN `province` ON 
                                district.province_id=province.id WHERE `user_email`='" . $email . "'");

                            $details = $details_rs->fetch_assoc();
                            $image_details = $image_rs->fetch_assoc();
                            $address_details = $address_rs->fetch_assoc();

                        ?>
                            <div class="row">
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">First Name <span class="text-danger">*</span> </label>
                                    <input type="text" readonly class="form-control" value="<?php echo $details["fname"] ?>">
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" readonly class="form-control" value="<?php echo $details["lname"] ?>">
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                    <input type="email" readonly class="form-control " value="<?php echo $details["email"] ?>">
                                </div>

                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" readonly class="form-control " value="<?php echo $details["mobile"] ?>">
                                </div>
                                <?php
                                if (!empty($address_details["line1"])) {
                                ?>

                                    <div class="col-6  mt-3">
                                        <label class="form-label fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " id="line1" value="<?php echo $address_details["line1"] ?>">
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-6  mt-3">
                                        <label class="form-label fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " id="line1">
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (!empty($address_details["line2"])) {
                                ?>

                                    <div class="col-6  mt-3">
                                        <label class="form-label fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " id="line2" value="<?php echo $address_details["line2"] ?>">
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-6  mt-3">
                                        <label class="form-label fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" id="line2" class="form-control ">
                                    </div>
                                <?php
                                }
                                ?>


                                <?php
                                $province_rs = Database::search("SELECT * FROM `province`");
                                $district_rs = Database::search("SELECT * FROM `district`");
                                $city_rs = Database::search("SELECT * FROM `city`");

                                ?>




                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Province<span class="text-danger">*</span></label>
                                    <select name="" class="form-select" id="province">
                                        <option value="0">Select Province</option>
                                        <?php
                                        $province_num = $province_rs->num_rows;
                                        for ($x = 0; $x < $province_num; $x++) {
                                            $province_data = $province_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                if (!empty($address_details["province_id"])) {
                                                                                                    if ($province_data["id"] == $address_details["province_id"]) {
                                                                                                ?>selected<?php
                                                                                                        }
                                                                                                    }
                                                                                                            ?>><?php echo $province_data["name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <small class="text-danger" id="p1"></small>

                                </div>
                                
                                <div class="col-6  mt-3">
                                            <label class="form-label fw-bold">District</label>
                                            <select name="" class="form-select " id="district">
                                                <option value="0">Select District</option>
                                                <?php
                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $district_data["id"]; ?>
                                                        " <?php
                                                            if (!empty($address_details["district_id"])) {
                                                                if ($district_data["id"] == $address_details["district_id"]) {
                                                            ?>selected<?php
                                                                    }
                                                                }
                                                                        ?>><?php echo $district_data["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <small class="text-danger" id="d1"></small>

                                        </div>
                                        <div class="col-6  mt-3">
                                            <label class="form-label fw-bold">City</label>
                                            <select name="" id="city" class="form-select">
                                                <option value="0">Select City</option>
                                                <?php
                                                $city_num = $city_rs->num_rows;
                                                for ($x = 0; $x < $city_num; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $city_data["id"]; ?>
                                                        " <?php
                                                            if (!empty($address_details["city_id"])) {
                                                                if ($city_data["id"] == $address_details["city_id"]) {
                                                            ?>selected<?php
                                                                    }
                                                                }
                                                                        ?>><?php echo $city_data["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>
                                        <?php
                                        if (!empty($address_details["postal_code"])) {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Postal Code<span class="text-danger"></span></label>
                                                <input type="text" class="form-control " id="pcode" value="<?php echo $address_details["postal_code"] ?>">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Postal Code<span class="text-danger"></span></label>
                                                <input type="text" class="form-control " id="pcode">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                

                            </div>
                        <?php

                        } else if (isset($_SESSION["uk"])) {
                        ?>
                            <div class="row">
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">First Name <span class="text-danger">*</span> </label>
                                    <input type="text"  class="form-control " id="fname">
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control "  id="lname">
                                </div>
                                <div class="col-12  mt-3">
                                    <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                    <input type="email"  class="form-control "  id="email">
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2"><i onclick="showPassword1();" id="e1" class="bi bi-eye-fill"></i></span>
                                    </div>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2"><i onclick="showPassword2();" id="e2" class="bi bi-eye-fill"></i></span>
                                    </div>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Mobile <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control " id="mobile">
                                </div>
                                <?php
                                $province_rs = Database::search("SELECT * FROM `province`");
                                $district_rs = Database::search("SELECT * FROM `district`");
                                $city_rs = Database::search("SELECT * FROM `city`");
                                $gender_rs = Database::search("SELECT * FROM `gender`");
                               
                                ?>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Gender <span class="text-danger">*</span></label>
                                    <select name="" id="gender" class="form-select">
                                        <option value="0">Select Gender</option>
                                        <?php
                                        $gender_num = $gender_rs->num_rows;

                                        for ($x = 0; $x < $gender_num; $x++) {
                                            $d = $gender_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d["id"] ?>"><?php echo $d["gender_name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control " id="line1">
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Address Line 2 <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control " id="line2">
                                </div>

                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Province <span class="text-danger">*</span></label>
                                    <select name="" id="province" class="form-select">
                                        <option value="0">Select Province</option>
                                        <?php
                                                $province_num = $province_rs->num_rows;
                                                for ($x = 0; $x < $province_num; $x++) {
                                                    $province_data = $province_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $province_data["id"]; ?>" ><?php echo $province_data["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">District <span class="text-danger">*</span></label>
                                    <select name="" id="district" class="form-select">
                                        <option value="0">Select District</option>
                                        <?php
                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $district_data["id"]; ?>" ><?php echo $district_data["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">City <span class="text-danger">*</span></label>
                                    <select name="" id="city" class="form-select">
                                        <option value="0">Select City</option>
                                        <?php
                                                $city_num = $city_rs->num_rows;
                                                for ($x = 0; $x < $city_num; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $city_data["id"]; ?>" ><?php echo $city_data["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-6  mt-3">
                                    <label class="form-label fw-bold">Postal Code <span class="text-danger"></span></label>
                                    <input type="text" id="pcode" class="form-control ">
                                </div>

                            </div>
                        <?php
                        }
                        ?>

                        <div class="row mt-3">
                            <div class="col-12 mt-5">
                                <h2 class="fw-bold">Shipping Method</h2>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>

                                </div>
                            </div>
                            <div class="col-3">
                                <p class="fw-bold text-black-50">Pronto International</p>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold text-black-50">Islandwide Doorstep Delivery</p>
                            </div>
                            <div class="col-3">
                                <p class="fw-bold text-black-50">within 3-5 working days</p>
                            </div>
                        </div>
                        <div class="row mt-2 mb-5">
                            <div class="col-4 mb-3 text-end offset-8">
                                <small class="text-danger" id="responseText"></small>
                            </div>
                            <?php
                            if(isset($_SESSION["u"])){

                                ?>
                                <div class="col-2 offset-10 d-grid">
                                <a href="#!" onclick="checkOutNextu();" class="btn btn-dark">Next</a>
                            </div>
                                <?php

                            }else if($_SESSION["uk"]){
                                ?>
                                <div class="col-2 offset-10 d-grid">
                                <a href="#!" onclick="checkOutNextuk();" class="btn btn-dark">Next</a>
                            </div>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-12 mt-5 d-none d-lg-block col-lg-4 px-4">
                        <div class="row">
                            <div class="col-12 rounded-0 mt-3 mb-4 bg-light ">
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <h3 class="fw-bold">
                                            Order Summery
                                        </h3>
                                    </div>

                                    <div class="col-12 mt-3 mb-4">
                                        <div class="accordion rounded-0" id="accordionFlushExample">
                                            <div class="accordion-item bg-light">
                                                <?php
                                                if (isset($_SESSION["u"])) {

                                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $cart_num = $cart_rs->num_rows;
                                                ?>
                                                    <h2 class="accordion-header bg-light" id="flush-headingOne">
                                                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <?php echo $cart_num ?> Items in Cart
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <?php
                                                            for ($x = 0; $x < $cart_num; $x++) {
                                                                $cart_data = $cart_rs->fetch_assoc();

                                                                $product_rs = Database::search("SELECT * FROM `product`  WHERE `id`='" . $cart_data["product_id"] . "'");
                                                                $product_data = $product_rs->fetch_assoc();
                                                            ?>
                                                                <div class="card bg-light mb-3 border-0 rounded-0 border-bottom">
                                                                    <div class="row g-0">
                                                                        <?php
                                                                        $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $cart_data["product_id"]  . "'");
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
                                                                                    <div class="col-12 mt-3">
                                                                                        <?php
                                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                                        $colour_data = $colour_rs->fetch_assoc();
                                                                                        ?>
                                                                                        <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                                        <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <?php
                                                                                        $size_rs = Database::search("SELECT * FROM `size` WHERE `id`= '" . $cart_data["size_id"] . "'");
                                                                                        $size_data = $size_rs->fetch_assoc();
                                                                                        ?>
                                                                                        <span class="fs-6 mt-3 text-black-50">Size : </span>
                                                                                        <span class="fs-6 text-black-50"> <?php echo $size_data["name"] ?></span>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <span class="fs-6 mt-3 text-black-50">Quantity : </span>
                                                                                        <span class="fs-6 text-black-50"><?php echo $cart_data["cart_qty"] ?></span>
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

                                                } else if (isset($_SESSION["uk"])) {

                                                    $cart_rs = Database::search("SELECT * FROM `cart_non` WHERE `user_code`='" . $_SESSION["uk"] . "'");
                                                    $cart_num = $cart_rs->num_rows;
                                                ?>
                                                    <h2 class="accordion-header bg-light" id="flush-headingOne">
                                                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <?php echo $cart_num ?> Items in Cart
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <?php
                                                            for ($x = 0; $x < $cart_num; $x++) {
                                                                $cart_data = $cart_rs->fetch_assoc();

                                                                $product_rs = Database::search("SELECT * FROM `product`  WHERE `id`='" . $cart_data["product_id"] . "'");
                                                                $product_data = $product_rs->fetch_assoc();
                                                            ?>
                                                                <div class="card bg-light mb-3 border-0 rounded-0 border-bottom">
                                                                    <div class="row g-0">
                                                                        <?php
                                                                        $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $cart_data["product_id"]  . "'");
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
                                                                                    <div class="col-12 mt-3">
                                                                                        <?php
                                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                                        $colour_data = $colour_rs->fetch_assoc();
                                                                                        ?>
                                                                                        <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                                        <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <?php
                                                                                        $size_rs = Database::search("SELECT * FROM `size` WHERE `id`= '" . $cart_data["size_id"] . "'");
                                                                                        $size_data = $size_rs->fetch_assoc();
                                                                                        ?>
                                                                                        <span class="fs-6 mt-3 text-black-50">Size : </span>
                                                                                        <span class="fs-6 text-black-50"> <?php echo $size_data["name"] ?></span>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <span class="fs-6 mt-3 text-black-50">Quantity : </span>
                                                                                        <span class="fs-6 text-black-50"><?php echo $cart_data["cart_qty"] ?></span>
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
                                                }
                                                ?>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php" ?>
        </div>
    </div>



    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>