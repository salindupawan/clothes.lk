<?php
session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $subCategory_rs = Database::search("SELECT sub_category.id AS id, sub_category.name AS name,sub_category.category_id AS cid FROM `sub_category` INNER JOIN `category` ON sub_category.category_id=category.id WHERE `category_id`='4'");
    $cid_rs = Database::search("SELECT sub_category.id AS id, sub_category.name AS name,sub_category.category_id AS cid FROM `sub_category` INNER JOIN `category` ON sub_category.category_id=category.id WHERE `category_id`='4'");
    $subCategory_num = $subCategory_rs->num_rows;
    $cid_data = $cid_rs->fetch_assoc();


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mens - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">salindu Pawan</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> -->
                    <!-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item disabled" href="#!">Settings</a></li>
                        <li><a class="dropdown-item " href="adminRegister.php">Register as new Admin</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="charts.php">All Products</a>
                                    <a class="nav-link" href="mensTable.php">Mens</a>
                                    <a class="nav-link" href="womensTable.php">Womens</a>
                                    <a class="nav-link" href="kidsTable.php">Kids</a>
                                    <a class="nav-link" href="accessoriesTable.php">Accessories</a>
                                    <a class="nav-link" href="homedecorTable.php">Home & Decor</a>
                                    <a class="nav-link" href="personalcareTable.php">Personal Care</a>
                                </nav>
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.php">401 Page</a>
                                        <a class="nav-link" href="404.php">404 Page</a>
                                        <a class="nav-link" href="500.php">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <!-- <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> -->
                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-cart3"></i></div>
                                Orders
                            </a>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill"></i></div>
                                Users
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Accessories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="charts.php">All Products</a></li>
                            <li class="breadcrumb-item active">Accessories</li>
                        </ol>
                        <div class="row">
                            <div class="col-5 col-lg-4">
                                
                            
                                <select  id="changeSubCategory" class="form-select " onchange="changeSubCategory(<?php echo $cid_data['cid'] ?>);">


                                    <option value="0">Accessories all Product</option>
                                    <?php
                                    for ($k = 0; $k < $subCategory_num; $k++) {
                                        $sdata = $subCategory_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $sdata["id"] ?>"><?php echo $sdata["name"] ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                                
                            </div>
                        </div>


                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>

                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Product id</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Added Date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product id</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Added Date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                       
                                        $product_rs = Database::search("SELECT product.id AS id, product.title AS title, product.price AS price,product.qty AS qty,product.datetime_added AS datetime_added,product.product_code AS product_code,product.description AS description ,product.delivery_fee_id AS delivery_fee_id,product.colour_id AS colour_id,product.status_id AS status_id,product.sub_category_id AS sub_category_id,product.brand_id AS brand_id  FROM `product` INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id INNER JOIN `category` ON sub_category.category_id=category.id WHERE `category`.`id`='".$cid_data['cid'] ."'");
                                        $product_num = $product_rs->num_rows;

                                        for ($x = 0; $x < $product_num; $x++) { 
                                            $product_data = $product_rs->fetch_assoc();
                                            $id =  $product_data['id'];
                                            
                                        ?>


                                            <tr>

                                                <td class="text-primary "><?php echo $product_data["product_code"] ?> <a href="#!" class="text-black text-end text-decoration-none">&nbsp; &nbsp;<i class="bi bi-eye-fill" onclick="adminProduct(<?php echo $product_data['id'] ?>,<?php echo $product_num ?>);"></i></a></td>
                                                <td><?php echo $product_data["title"] ?></td>
                                                <td><?php echo $product_data["price"] ?></td>
                                                <td><?php echo $product_data["qty"] ?></td>
                                                <td><?php echo $product_data["datetime_added"] ?></td>
                                                <td class="text-center"><button class="btn btn-sm btn-primary" onclick="updateProductModal(<?php echo $product_data['id'] ?>,<?php echo $product_num ?>);">Update</button></td>
                                                <?php
                                                $status = $product_data["status_id"];
                                                if ($status == 1) {
                                                ?>
                                                    <td class="text-center"><button id="pb<?php echo $product_data['id'] ?>" class="btn btn-sm btn-danger" onclick="deactiveProduct(<?php echo $product_data['id'] ?>)">Deactivate</button></td>

                                                <?php

                                                } else {
                                                ?>
                                                    <td class="text-center"><button class="btn btn-sm btn-success" id="pb<?php echo $product_data['id'] ?>" onclick="deactiveProduct(<?php echo $product_data['id'] ?>)">Activate</button></td>

                                                <?php
                                                }
                                                ?>
                                                <!-- model -->
                                                <div class="modal" tabindex="-1" id="adminProduct<?php echo $product_data['id'] ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-body d-flex justify-content-center">

                                                                <div class="card" style="width: 15rem;">
                                                                    <?php
                                                                    $imge_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"]  . "'");
                                                                    $imge_data = $imge_rs->fetch_assoc();
                                                                    ?>

                                                                    <img src="<?php echo $imge_data["code"] ?>" class="card-img-top p-2" alt="...">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                        <span class="card-text text-primary">Rs. <?php echo $product_data["price"] ?> .00</span> <br />

                                                                        <h6 class="text-black-50">Size :
                                                                            <?php
                                                                            $size_rs = Database::search("SELECT * FROM `product_has_size` INNER JOIN `size` ON product_has_size.size_id=size.id   WHERE `product_id`='" . $product_data["id"] . "' AND `status`='1'");
                                                                            $size_num = $size_rs->num_rows;

                                                                            for ($y = 0; $y < $size_num; $y++) {
                                                                                $size_data = $size_rs->fetch_assoc();
                                                                                echo $size_data["name"] . " ";
                                                                            }



                                                                            ?>
                                                                        </h6>
                                                                        <h6 class="text-black-50">Qty : <?php echo $product_data["qty"] ?></h6>
                                                                        <h6 class="text-black-50">Description</h6>
                                                                        <small class="text-black-50">
                                                                            <?php echo $product_data["description"] ?>
                                                                        </small>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- model -->
                                                <!--  -->
                                                <div class="modal" tabindex="-1" id="updateProductModal<?php echo $product_data['id'] ?>">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update Product</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="">
                                                                    <div class="row">
                                                                        <div class="col-12 rounded rounded-3 mb-3">
                                                                            <div class="row ">

                                                                                <?php


                                                                                $product_img_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                                $product_img_num = $product_img_rs->num_rows;



                                                                                ?>

                                                                                <div class="col-12 d-flex justify-content-center px-2">

                                                                                    <?php
                                                                                    for ($z = 0; $z < $product_img_num; $z++) {
                                                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                                                    ?>
                                                                                        <img src="<?php echo $product_img_data["code"] ?>" class="border p-2 rounded" style="height: 120px;  width: 90px;" id="i<?php echo $z ?><?php echo $product_data['id'] ?>" alt="">

                                                                                    <?php


                                                                                    }
                                                                                    ?>


                                                                                </div>
                                                                                <div class="col-12 mt-3 mb-3">
                                                                                    <div class="row">
                                                                                        <div class="col-12 text-center mb-1">
                                                                                            <small class="text-danger " id="updateProductResponse<?php echo $product_data['id'] ?>"></small>
                                                                                        </div>
                                                                                        <div class="col-6 col-lg-4 offset-3 offset-lg-4 d-grid">
                                                                                            <input type="file" class="d-none" id="imageuploader<?php echo $product_data['id'] ?>" multiple>
                                                                                            <label for="imageuploader<?php echo $product_data['id'] ?>" class="btn btn-outline-dark rounded rounded-5" onclick="changeProductImage(<?php echo $product_data['id'] ?>);">Upload Images</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                                $sub_category_rs = Database::search("SELECT * FROM `sub_category` WHERE `id`='" . $product_data["sub_category_id"] . "'");
                                                                                $sub_category_data = $sub_category_rs->fetch_assoc();

                                                                                $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $sub_category_data["category_id"] . "'");
                                                                                $category_data = $category_rs->fetch_assoc();

                                                                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $product_data["brand_id"] . "'");
                                                                                $brand_data = $brand_rs->fetch_assoc();

                                                                                $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                                $colour_data = $colour_rs->fetch_assoc();

                                                                                $delivery_rs = Database::search("SELECT * FROM `delivery_fee` WHERE `id`='" . $product_data["delivery_fee_id"] . "'");
                                                                                $delivery_data = $delivery_rs->fetch_assoc();



                                                                                $producthasSize_rs = Database::search("SELECT * FROM `product_has_size` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                                $producthasSize_num = $producthasSize_rs->num_rows;

                                                                                ?>
                                                                                <div class="col-6  mt-3">
                                                                                    <label class="form-label fw-bold">Category</label>
                                                                                    <select class="form-select form-select-sm" disabled>
                                                                                        <option><?php echo $category_data["c_name"] ?></option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6  mt-3">
                                                                                    <label class="form-label fw-bold">Sub Category</label>
                                                                                    <select class="form-select form-select-sm" disabled>
                                                                                        <option><?php echo $sub_category_data["name"] ?></option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6  mt-3">
                                                                                    <label class="form-label fw-bold">Brand</label>
                                                                                    <select class="form-select form-select-sm" disabled>
                                                                                        <option><?php echo $brand_data["b_name"] ?></option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6 mt-3">
                                                                                    <label class="form-label fw-bold">Colour</label>
                                                                                    <select class="form-select form-select-sm" disabled>
                                                                                        <option><?php echo $colour_data["name"] ?></option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 col-lg-12 mt-3">
                                                                                    <label class="form-label fw-bold">Title</label>
                                                                                    <input type="text" id="t<?php echo $product_data['id'] ?>" class="form-control form-control-sm" value="<?php echo $product_data['title'] ?>">
                                                                                </div>
                                                                                <div class="col-12 col-lg-12 mt-3">
                                                                                    <label class="form-label fw-bold">Product Id</label>
                                                                                    <input type="text" disabled class="form-control form-control-sm" value="<?php echo $product_data['product_code'] ?>">
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="row">



                                                                                        <div class="col-4 col-lg-4 mt-3">
                                                                                            <label class="form-label fw-bold">Size</label>
                                                                                            <?php
                                                                                            for ($y = 0; $y < $producthasSize_num; $y++) {
                                                                                                $producthasSize_data = $producthasSize_rs->fetch_assoc();
                                                                                            ?>
                                                                                                <div class="form-check">
                                                                                                    <input class="form-check-input" type="checkbox" id="s<?php echo $producthasSize_data["size_id"] ?><?php echo $product_data["id"] ?>" <?php if ($producthasSize_data["status"] == 1) { ?> checked <?php } ?> id="<?php echo $sizeUpdate_data["id"] ?>"> &nbsp;
                                                                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                                                                        <?php
                                                                                                        $sizeUpdate_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $producthasSize_data["size_id"] . "'");
                                                                                                        $sizeUpdate_data = $sizeUpdate_rs->fetch_assoc();

                                                                                                        echo $sizeUpdate_data["name"] ?>
                                                                                                    </label>
                                                                                                </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>



                                                                                        </div>
                                                                                        <div class="col-8 col-lg-8">
                                                                                            <div class="row">





                                                                                                <div class="col-12  mt-3">
                                                                                                    <label class="form-label fw-bold">Quantity</label>
                                                                                                    <input type="number" id="q<?php echo $product_data['id'] ?>" min="0" value="<?php echo $product_data['qty'] ?>" class="form-control form-control-sm">
                                                                                                </div>
                                                                                                <div class="col-12  mt-3">
                                                                                                    <label class="form-label fw-bold">Price</label>
                                                                                                    <div class="input-group input-group-sm ">
                                                                                                        <span class="input-group-text">Rs.</span>
                                                                                                        <input type="text" disabled class="form-control form-control-sm" value="<?php echo $product_data['price'] ?>" aria-label="Amount (to the nearest dollar)">
                                                                                                        <span class="input-group-text">.00</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12  mt-3">
                                                                                                    <label class="form-label fw-bold">Delivery fee</label>
                                                                                                    <div class="input-group input-group-sm ">
                                                                                                        <span class="input-group-text">Rs.</span>
                                                                                                        <input type="text" class="form-control form-control-sm" id="dil<?php echo $product_data['id'] ?>" value="<?php echo $delivery_data['fee'] ?>" aria-label="Amount (to the nearest dollar)">
                                                                                                        <span class="input-group-text">.00</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 mt-3">
                                                                                    <label class="form-label fw-bold">Description</label>
                                                                                    <textarea cols="30" rows="10" id="des<?php echo $product_data['id'] ?>" class="form-control form-control-sm"><?php echo $product_data['description'] ?></textarea>
                                                                                </div>



                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-primary" onclick="updateProduct(<?php echo $product_data['id'] ?>);">Save Product</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Clothes.lk 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location:home.php");
}
?>