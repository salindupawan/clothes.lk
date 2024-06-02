<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
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


                <div class="col-12  mt-4 col-lg-6 offset-lg-3 rounded rounded-3 mb-3 bg-body shadow ">
                    <div class="row p-3">
                        <div class="col-12">
                            <h2 class="fw-bold text-black-50">My Profile</h2>
                            <hr>
                        </div>
                        <div class="col-12 d-flex justify-content-center px-2">
                            <input type="file" class="d-none" accept="image/*" id="imageuploader">
                            <?php
                            if (empty($image_details["path"])) {
                            ?>
                                <label for="imageuploader" onclick="changeImage();" class="Imageuploadh">
                                    <img src="resources/emptyUser.png" id="viewImg"  class="border rounded rounded-circle" style="height: 120px;  width: 120px;" alt="">
                                </label>
                            <?php

                            } else {
                            ?>
                                <label for="imageuploader" onclick="changeImage();" class="Imageuploadh">
                                    <img src="<?php echo $image_details["path"] ?>" id="viewImg" class="border rounded rounded-circle" style="height: 120px;  width: 120px;" alt="">
                                </label>
                            <?php
                            }
                            ?>


                        </div>
                        <div class="col-12 mt-2 d-flex justify-content-center">
                        <small class="text-danger" id="i1"></small>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <div class="row">
                                <div class="col-4 col-lg-4 offset-4 offset-lg-4 d-grid">

                                </div>
                            </div>
                        </div>
                        <div class="col-6  mt-3">
                            <label class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $details["fname"] ?>" id="fname">
                        </div>
                        <div class="col-6  mt-3">
                            <label class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $details["lname"] ?>" id="lname">
                        </div>
                        <div class="col-6  mt-3">
                            <label class="form-label fw-bold">Mobile</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $details["mobile"] ?>" id="mobile">
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label fw-bold">Regestered Date</label>
                            <input type="text" readonly class="form-control form-control-sm" value="<?php echo $details["joined_date"] ?>">

                        </div>
                        <div class="col-12  mt-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="text" readonly class="form-control form-control-sm" value="<?php echo $details["email"] ?>">
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="row">


                                        <?php
                                        if (!empty($address_details["line1"])) {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Address Line 1</label>
                                                <input type="text" class="form-control form-control-sm" id="line1" value="<?php echo $address_details["line1"] ?>">
                                                <small class="text-danger" id="l1"></small>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Address Line 1</label>
                                                <input type="text" class="form-control form-control-sm" id="line1">
                                                <small class="text-danger" id="l1"></small>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($address_details["line2"])) {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Address Line 2</label>
                                                <input type="text" class="form-control form-control-sm" id="line2" value="<?php echo $address_details["line2"] ?>">
                                                <small class="text-danger" id="l2"></small>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Address Line 2</label>
                                                <input type="text" class="form-control form-control-sm" id="line2">
                                                <small class="text-danger" id="l2"></small>

                                            </div>
                                        <?php
                                        }

                                        $province_rs = Database::search("SELECT * FROM `province`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        $city_rs = Database::search("SELECT * FROM `city`");

                                        ?>




                                        <div class="col-6  mt-3">
                                            <label class="form-label fw-bold">Province</label>
                                            <select name="" class="form-select form-select-sm " id="province">
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
                                            <select name="" class="form-select form-select-sm" id="district">
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
                                            <select name="" id="city" class="form-select form-select-sm">
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
                                            <small class="text-danger" id="c1"></small>

                                        </div>
                                        <?php
                                        if (!empty($address_details["postal_code"])) {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Postal Code</label>
                                                <input type="text" class="form-control form-control-sm" id="pcode" value="<?php echo $address_details["postal_code"] ?>">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6  mt-3">
                                                <label class="form-label fw-bold">Postal Code</label>
                                                <input type="text" class="form-control form-control-sm" id="pcode">
                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="col-12 mb-3 mt-5">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <small class="fw-bold text-success" id="f1"></small>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <small class="text-danger" id="f2"></small>
                                </div>

                                <div class="col-4 offset-4 mt-3 d-grid">
                                    <a href="#!" class="btn btn-outline-dark rounded rounded-5" onclick="updateProfile();">Update Profile</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php

            } else {
            ?>
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center ">
                            <img src="resources/loginImg1.png" style="height: 490px;" alt="">

                        </div>
                        <div class="col-2 d-grid offset-5">
                            <a href="index.php" class="btn btn-outline-primary fs-5 rounded-5">Log in First</a>

                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>