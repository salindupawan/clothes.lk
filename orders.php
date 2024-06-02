<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Orders | Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

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
                    <h1 class="mt-4">Orders</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                    <!-- <div class="card mb-4">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                .
                            </div>
                        </div> -->
                    <!-- <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            This Week Orders
                        </div>
                        <div class="card-body"><canvas id="myAreaChartOrders" width="100%" height="30"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>

                    


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="bi bi-cart-check-fill"></i>
                            All Orders
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order id</th>
                                        <th>Product Details</th>
                                        <th>Shipping Details</th>
                                        <th>Ordered Date</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Order id</th>
                                        <th>Product Details</th>
                                        <th>Shipping Details</th>
                                        <th>Ordered Date</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $invoice_rs = Database::search("SELECT  * FROM `invoice`   ORDER BY `date` DESC ");
                                    $invoice_num = $invoice_rs->num_rows;
                                    for ($x = 0; $x < $invoice_num; $x++) {
                                        $invoice_data = $invoice_rs->fetch_assoc();

                                    ?>



                                        <tr>
                                            <td>1</td>
                                            <td class="text-decoration-underline"><?php echo $invoice_data["order_id"] ?></td>
                                            <td class="text-center d-grid"><a href="#!" class="btn btn-sm btn-outline-dark" onclick="productDetails('<?php echo $invoice_data['order_id'] ?>');">Open</a></td>
                                            <td class="text-center"><a href="#!" class="btn btn-sm btn-outline-dark d-grid" onclick="shippingDetails('<?php echo $invoice_data['order_id'] ?>');">Open</a></td>
                                            <td><?php echo $invoice_data["date"] ?></td>
                                            <?php
                                            if($invoice_data["status"]==0){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-primary" id="btn<?php echo $invoice_data['order_id'] ?>" onclick="changeInvoiceStatus('<?php echo $invoice_data['order_id'] ?>')">Confirm Order</button></td>
                                                
                                                <?php
                                            }else if($invoice_data["status"]==1){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-warning" id="btn<?php echo $invoice_data['order_id'] ?>" onclick="changeInvoiceStatus('<?php echo $invoice_data['order_id'] ?>')">Packing</button></td>
                                                
                                                <?php
                                            }else if($invoice_data["status"]==2){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-info" id="btn<?php echo $invoice_data['order_id'] ?>" onclick="changeInvoiceStatus('<?php echo $invoice_data['order_id'] ?>')">Dispatched</button></td>
                                                
                                                <?php
                                            }else if($invoice_data["status"]==3){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-success" id="btn<?php echo $invoice_data['order_id'] ?>" onclick="changeInvoiceStatus('<?php echo $invoice_data['order_id'] ?>')">Shipping</button></td>
                                                
                                                <?php
                                            }else if($invoice_data["status"]==4){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-danger disabled" id="btn<?php echo $invoice_data['order_id'] ?>" >Delivered</button></td>
                                                
                                                <?php
                                            }else if($invoice_data["status"]==5){
                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-primary disabled" id="btn<?php echo $invoice_data['order_id'] ?>" onclick="changeInvoiceStatus(<?php echo $invoice_data['order_id'] ?>)">Confirm Order</button></td>
                                                
                                                <?php
                                            }

                                            if($invoice_data["status"]==0){

                                                ?>
                                            <td class="text-center"><button class="btn btn-sm btn-danger" id="cbtn<?php echo $invoice_data['order_id'] ?>" onclick="cancelOrder('<?php echo $invoice_data['order_id'] ?>')">Cancel Order</button></td>
                                                
                                                <?php

                                            }else if($invoice_data["status"]==5){

                                                ?>
                                                <td class="text-center"><button class="btn btn-sm btn-danger disabled" id="cbtn<?php echo $invoice_data['order_id'] ?>" >Canceled</button></td>
                                                    
                                                    <?php

                                            }else{
                                                ?>
                                                <td class="text-center"><button class="btn btn-sm btn-danger disabled" id="cbtn<?php echo $invoice_data['order_id'] ?>" >Cancel Order</button></td>
                                                    
                                                    <?php
                                            }
                                            ?>
                                            <td class="text-center"><a href="#!" class="fs-5 text-danger" onclick="printInvoice('<?php echo $invoice_data['order_id'] ?>');"><i class="bi bi-printer-fill"></i></a></td>
                                            <!-- model 1-->
                                            <div class="modal" tabindex="-1" id="productDetails<?php echo $invoice_data["order_id"] ?>">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content" id="printProduct<?php echo $invoice_data["order_id"] ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Product Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body d-flex justify-content-center">
                                                        <div class="row">

                                                            <?php
                                                            $product_rs = Database::search("SELECT * FROM `invoice_products` WHERE `invoice_order_id`='" . $invoice_data["order_id"] . "'");
                                                            $product_num = $product_rs->num_rows;

                                                            for ($y = 0; $y < $product_num; $y++) {
                                                                $product_data = $product_rs->fetch_assoc();

                                                                $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='".$product_data["size_id"]."'");
                                                                $size_data = $size_rs->fetch_assoc();

                                                                $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$product_data["product_id"]."'");
                                                                $p_data = $p_rs->fetch_assoc();

                                                                $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='".$p_data["colour_id"]."'");
                                                                $colour_data = $colour_rs->fetch_assoc();

                                                                $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='".$product_data["product_id"]."'");
                                                                $image_data = $image_rs->fetch_assoc();

                                                                


                                                            ?>

                                                                
                                                                    <div class="col-12">



                                                                        <div class="card mb-3 shadow ">
                                                                            <div class="row g-0">
                                                                                <div class="col-4 p-2">
                                                                                    <img src="<?php echo $image_data["code"] ?>" class="img-fluid rounded-start" alt="...">
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title fw-bold text-decoration-underline"><?php echo $p_data["title"] ?></h5>
                                                                                        <span class="fs-6 fw-bold text-black-50"> Rs. <?php echo $p_data["price"] ?> .00</span>
                                                                                        <div class="row mt-lg-3">
                                                                                            <div class="col-12 mt-0">
                                                                                                <span class="fs-6 mt-3 text-black-50">Product Id : </span>
                                                                                                <span class="fs-6 text-black-50"> <?php echo $p_data["product_code"] ?></span>
                                                                                            </div>
                                                                                            <div class="col-12 mt-0 ">
                                                                                                <span class="fs-6 mt-3 text-black-50">Colour : </span>
                                                                                                <span class="fs-6 text-black-50"> <?php echo $colour_data["name"] ?></span>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <span class="fs-6 mt-3 text-black-50">Size : </span>
                                                                                                <span class="fs-6 text-black-50"> <?php echo $size_data["name"] ?></span>
                                                                                            </div>

                                                                                            <div class="col-10">
                                                                                                <span class="fs-6 mt-3 text-black-50">Quantity : </span>
                                                                                                <span class="fs-6 text-black-50"> <?php echo $product_data["qty"] ?></span>
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

                                                        <div class="modal-footer">
                                                            Total product(s) : <?php echo $product_num ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- model 1-->

                                            <!-- model 2-->
                                            <div class="modal" tabindex="-1" id="shippingDetails<?php echo $invoice_data["order_id"] ?>">
                                            <?php
                                            $invoice_product_rs=Database::search("SELECT * FROM `invoice_products` WHERE `invoice_order_id` ='".$invoice_data["order_id"]."'");
                                            $invoice_product_data = $invoice_product_rs->fetch_assoc();
                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$invoice_product_data["user_email"]."'");
                                            $user_data =$user_rs->fetch_assoc();
                                            $user_h_address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '".$user_data["email"]."'");
                                            $user_h_address_data = $user_h_address->fetch_assoc();
                                            $city_rs = Database::search("SELECT * FROM `city` WHERE `id`= '".$user_h_address_data["city_id"]."'");
                                            $city_data = $city_rs->fetch_assoc();
                                            $district_rs = Database::search("SELECT * FROM `district` WHERE `id`='".$city_data["district_id"]."'");
                                            $district_data = $district_rs->fetch_assoc();
                                            $user_img_rs = Database::search("SELECT * FROM `user_image` WHERE `user_email`='".$user_data["email"]."'");
                                            $user_img_num = $user_img_rs->num_rows;
                                            ?>
                                                <div class="modal-dialog">
                                                    <div class="modal-content" id="printData<?php echo $invoice_data["order_id"] ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Shipping Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body p-4">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="fw-bold"><?php echo $user_data["fname"] ?> <?php echo $user_data["lname"] ?>,</h5>
                                                                    <h6><?php echo $user_h_address_data["line1"] ?> <?php echo $user_h_address_data["line2"] ?>,</h6>
                                                                    <h6><?php echo $city_data["name"] ?>,</h6>
                                                                    <h6><?php echo $district_data["name"] ?>.</h6>
                                                                    <h6><?php echo $user_h_address_data["postal_code"] ?></h6>
                                                                </div>
                                                                <div class="col-6 text-center justify-content-center">
                                                                    <?php
                                                                    if($user_img_num==1){
                                                                        $user_img_data = $user_img_rs->fetch_assoc();
                                                                        ?>
                                                                    <img src="<?php echo $user_img_data["path"] ?>" style="height: 100px; width: 100px;" class="rounded-circle" alt=""> <br>
                                                                        
                                                                        <?php

                                                                    }else{
                                                                        ?>
                                                                    <img src="resources/emptyUser.png" style="height: 100px; width: 100px;" class="rounded-circle" alt=""> <br>
                                                                        
                                                                        <?php

                                                                    }
                                                                    ?>
                                                                    <small><?php echo $user_data["email"] ?></small>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <!-- model -->

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
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
    <script src="assets/demo/chart-area-demo-orders.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</body>

</html>