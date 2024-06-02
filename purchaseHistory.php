<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php";
            if (isset($_SESSION["u"])) {

                $invoice_rs = Database::search("SELECT * FROM `invoice_products` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `status`='1'");
                $invoice_num = $invoice_rs->num_rows;


            ?>




                <div class="col-12 pt-3" style="background-color: E3E5E4;">
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="home.php" class="text-decoration-none text-black fw-bold">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Purchasing History</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 bg-body rounded rounded-3 border">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <h2 class="fw-bold">Purchase History</h2>
                        </div>

                        <div class="col-12 mt-2 mb-3">
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="row">


                                <div class="col-12 ">
                                    <div class="row">
                                        <?php
                                        if ($invoice_num > 0) {
                                        ?>

                                            <div class="col-12 col-lg-6  offset-lg-1 ">
                                                <div class="row">

                                                    <?php
                                                    for ($x = 0; $x < $invoice_num; $x++) {
                                                        $invoice_data = $invoice_rs->fetch_assoc();
                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <div class="col-12 " id="div<?php echo $invoice_data["id"]  ?>">
                                                            <div class="card mb-3 shadow ">
                                                                <div class="row g-0">
                                                                    <?php
                                                                    $img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='".$product_data["id"]."' ");
                                                                    $img_data = $img_rs->fetch_assoc();
                                                                    ?>
                                                                    <div class="col-4 col-lg-3 p-2">
                                                                        <img src="<?php echo $img_data["code"] ?>" class="img-fluid rounded-start" alt="...">
                                                                    </div>
                                                                    <div class="col-7 col-lg-8  px-lg-3">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                            <span class="fs-6 fw-bold text-black-50"> Rs. <?php echo $product_data["price"] ?> .00</span><br>
                                                                            <div class="row">
                                                                                <div class="col-12 mt-3">
                                                                                    <?php
                                                                                    $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "' ");
                                                                                    $colour_data = $colour_rs->fetch_assoc();
                                                                                    ?>
                                                                                    <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                                    <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <?php
                                                                                    $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $invoice_data["size_id"] . "'");
                                                                                    $size_data = $size_rs->fetch_assoc();
                                                                                    ?>
                                                                                    <span class="fs-6 mt-3 text-black-50">Size : </span>
                                                                                    <span class="fs-6 text-black-50"> <?php echo $size_data["name"] ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-6 mt-3 text-black-50">Quantity : </span>
                                                                                    <span class="fs-6 text-black-50"> <?php echo $invoice_data["qty"] ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-6 mt-3 text-black-50"><?php echo $invoice_data["date"] ?></span>

                                                                                </div>
                                                                                <div class="col-12 mt-1 mt-lg-4">
                                                                                    <a href='<?php echo "singleProductView.php?id=" . $product_data["id"] ?>' class="">
                                                                                        <span class="fs-6 mt-3 text-decoration-underline fw-bold text-primary">Buy Again</span>

                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1  mt-3">
                                                                        <div class="row">

                                                                            <div class="col-12  ">
                                                                                <a href="#!" onclick="deleteFromPurchaseHistory(<?php echo $invoice_data['id'] ?>);" class="text-danger"><i class="bi bi-trash3-fill fs-4"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php


                                                    }
                                                    ?>


                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-lg-9 col-4 offset-8 col-lg-3 d-grid mt-4 mb-4">
                                                                <button class="btn btn-danger rounded rounded-5" onclick="deleteAllFromInvoice();"><i class="bi bi-trash3-fill"></i> Delete All</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-12 col-lg-5 mb-4 px-5 d-none d-lg-block">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img src="resources/gf2.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf1.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf4.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf3.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf2.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf1.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="resources/gf3.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-12 mb-5 ">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <img src="resources/emptyPurchaseHistory.png" style="height:300px ;" alt="">
                                                    </div>
                                                    <div class="col-12 text-center mt-4">
                                                        <h4 class="text-black-50 fw-bold">You have not purchased any item yet...</h4>
                                                    </div>
                                                    <div class="col-6 col-lg-4 offset-lg-4 offset-3 mt-3 d-grid">
                                                        <a href="home.php" class="btn btn-outline-warning rounded-5 fs-5">Let's find something</a>
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
                ?>
                    <div class="col-12 mb-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img src="resources/emptyPurchaseHistory.png" style="height:300px ;" alt="">
                            </div>
                            <div class="col-12 text-center mt-4">
                                <h4 class="text-black-50 fw-bold">You have not purchased any item yet...</h4>
                            </div>
                            <div class="col-6 col-lg-4 offset-lg-4 offset-3 mt-3 d-grid">
                                <a href="home.php" class="btn btn-outline-warning rounded-5 fs-5">Let's find something</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
                ?>
                </div>
                <?php include "footer.php" ?>
        </div>
    </div>



    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="script.js"></script>
</body>

</html>