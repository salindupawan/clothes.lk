<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens | Clothes.lk</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="swiper-bundle.min.css">

    <link rel="icon" href="resources/c.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php" ?>
            <div class="col-12 bg-white">
                <!-- <div class="row">
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="category.php" class="text-decoration-none text-primary fs-5 ">Mens</a></p>
                    </div>
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="#" class="text-decoration-none text-black-50 fs-5">Womens</a></p>
                    </div>
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="#" class="text-decoration-none text-black-50 fs-5">Kids</a></p>
                    </div>
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="#" class="text-decoration-none text-black-50 fs-5">Accessories</a></p>
                    </div>
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="#" class="text-decoration-none text-black-50 fs-5">Home & Decor</a></p>
                    </div>
                    <div class="col-4 col-lg-2 ">
                        <p class="text-center  "><a href="#" class="text-decoration-none text-black-50 fs-5">Personal Care</a></p>
                    </div>

                    <hr>
                </div> -->
                <div class="row p-3" id="searchResults">
                    <div class="col-12 col-lg-2 mb-3 mb-lg-0 border-end">
                        <div class="row">

                            <div class="col-12">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                Brands
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <?php
                                                $brand_rs = Database::search("SELECT * FROM `brand` ");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($x = 0; $x < $brand_num; $x++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="<?php echo $brand_data["id"] ?>" name="brand" id="brand<?php echo $x ?>">
                                                        <label class="form-check-label" for="brand<?php echo $x ?>">
                                                            <?php echo $brand_data["b_name"] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }

                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                Category
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <?php
                                                $subCategory_rs = Database::search("SELECT * FROM `sub_category` WHERE `category_id`='1'");
                                                $subCategory_num = $subCategory_rs->num_rows;
                                                for ($y = 0; $y < $subCategory_num; $y++) {
                                                    $subCategory_data = $subCategory_rs->fetch_assoc();
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="<?php echo $subCategory_data["id"] ?>" name="subCategory" id="subCategory<?php echo $y ?>">
                                                        <label class="form-check-label" for="subCategory<?php echo $y ?>">
                                                            <?php echo $subCategory_data["name"] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                Colours
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <?php
                                                $colour_rs = Database::search("SELECT colour.name AS colour_name, colour.id AS id FROM  `colour` ");
                                                $colour_num = $colour_rs->num_rows;

                                                for ($z = 0; $z < $colour_num; $z++) {
                                                    $colour_data = $colour_rs->fetch_assoc();
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="<?php echo $colour_data["id"] ?>" name="colour" id="colour<?php echo $z ?>">
                                                        <label class="form-check-label" for="colour<?php echo $z ?>">
                                                            <?php echo $colour_data["colour_name"] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-heading4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4">
                                                Price
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading4">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  name="price" id="under2">
                                                    <label class="form-check-label" for="under2">
                                                        Under Rs. 2000
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  name="price" id="between2">
                                                    <label class="form-check-label" for="between2">
                                                        Rs. 2000 - Rs. 5000
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="price" id="over2">
                                                    <label class="form-check-label" for="over2">
                                                        Over Rs. 5000
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 d-grid mt-4">
                                <button class="btn btn-primary rounded rounded-5" onclick="filterProducts('<?php echo $brand_num ?>','<?php echo $subCategory_num ?>','<?php echo $colour_num ?>');">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 px-3 ">
                        <div class="row">
                            <div class="col-12 d-none d-lg-block">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 d-none d-lg-block mt-4">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <?php
                                    $subCategoryImages_rs = Database::search("SELECT * FROM `sub_category` INNER JOIN `subcategory_image`
                                     ON sub_category.id=subcategory_image.sub_category_id  WHERE `category_id`=1 LIMIT 6 OFFSET 0 ");
                                    $subCategoryImages_num = $subCategoryImages_rs->num_rows;

                                    for ($w = 0; $w < $subCategoryImages_num; $w++) {
                                        $subCategoryImages_data = $subCategoryImages_rs->fetch_assoc();
                                    ?>
                                        <div class="col-2 ">

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="resources/longsleeve1.jpg" class="rounded-circle border" style="height: 100px;" alt=""><br>
                                                    <span class="fw-bold text-black-50"><?php echo $subCategoryImages_data["name"] ?></span>
                                                </div>

                                            </div>

                                        </div>
                                    <?php
                                    }
                                    ?>



                                </div>




                            </div>

                            <!--  -->

                            <!--  -->



                            <div class="col-12 mt-3" id="productResults">
                                <div class="row">
                                    <hr>
                                    <?php
                                    $mens_rs = Database::search("SELECT product.id AS id , product.title AS title, product.price AS price , product.description AS description , product.qty AS qty , product.colour_id AS colour_id, sub_category.id AS sid  FROM `product` INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id WHERE `category_id`='1' AND `status_id`='1' ");
                                    $mens_num = $mens_rs->num_rows;
                                    ?>
                                    <div class="col-6 col-lg-3">
                                        <span class="fw-bold fs-3">All Products</span> &nbsp;
                                        <small class="fw-bold text-black-50"><?php echo $mens_num ?> Results</small>
                                    </div>
                                    <div class="col-6 col-lg-2 offset-lg-7 text-end d-none d-grid">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary  " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-arrow-down-up"></i> &nbsp; Order By
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Newest</a></li>
                                                <li><a class="dropdown-item" href="#">Price Low to High</a></li>
                                                <li><a class="dropdown-item" href="#">Price High to Low</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <?php
                                    for($p=0;$p<$mens_num;$p++){
                                        $product_data = $mens_rs->fetch_assoc();
                                        ?>
                                        
                                       
                                        <div class="col-12 col-lg-3 p-2">
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
                                                                `user_code`='" . $user . "'");
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
                                                                    `user_code`='" . $user . "'");
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
                                                              `user_code`='" . $user . "'");
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
                                                                $img[$product_data["id"].$y] = $image_data["code"];
                                                            ?>
                                                                <div class="col-2  rounded rounded-2  mt-2">
                                                                    <a href="#!"> <img src="<?php echo $img[$product_data["id"].$y]; ?>" id="img<?php echo $product_data['id'] ?><?php echo $y ?>" onclick="loadMainImg(<?php echo $product_data['id'] ?>,<?php echo $y ?>)" style="width: 50px;" id=""></a>
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
                                                                        $size_rs =Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id WHERE `product_id`='".$product_data["id"]."'  AND `status`='1'");
                                                                        $size_num=$size_rs->num_rows;

                                                                        for($w=0;$w<$size_num;$w++){
                                                                            $size_data=$size_rs->fetch_assoc();
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
            </div>
            <?php include "footer.php" ?>
        </div>
    </div>

</body>
<script src="swiper-bundle.min.js"></script>
<script src="script.js"></script>

</html>