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
    <title>Users | Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />


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
                    <h1 class="mt-4">Users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Last 2 Weeks User Engagement
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="bi bi-person-fill"></i>
                            All Users
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>User Details</th>
                                        <th>Ordered Products</th>
                                        <th>Registered Date</th>
                                        <th></th>
                                        

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>User Details</th>
                                        <th>Ordered Products</th>
                                        <th>Registered Date</th>
                                        <th></th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $user_rs = Database::search("SELECT * FROM `user`");
                                    $user_num = $user_rs->num_rows;
                                    for ($x = 0; $x < $user_num; $x++) {
                                        $user_data = $user_rs->fetch_assoc();

                                    ?>



                                        <tr>
                                            <td><?php echo $x + 1 ?></td>
                                            <td class=""><?php echo $user_data["fname"] ?> <?php echo $user_data["lname"] ?></td>
                                            <td class="text-center"><a href="#!" class="btn btn-sm btn-outline-dark d-grid" onclick="userDetails('<?php echo $user_data['email'] ?>');">Open</a></td>
                                            <td class="text-center d-grid"><a href="#!" class="btn btn-sm btn-outline-dark" onclick="orderedProducts('<?php echo $user_data['email'] ?>');">Open</a></td>

                                            <td><?php echo $user_data["joined_date"] ?></td>
                                            <td class="text-center"><button class="btn btn-sm btn-primary" onclick="sendEmail('<?php echo $user_data['email'] ?>');">Send Email</button></td>
                                            
                                            <!-- model 1-->
                                            <div class="modal" tabindex="-1" id="orderedProducts<?php echo $user_data["email"] ?>">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ordered Products</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body d-flex justify-content-center">
                                                            <div class="row">


                                                                <?php
                                                                $invoice_product_rs = Database::search("SELECT * FROM `invoice_products` WHERE `user_email`='" . $user_data["email"] . "'");
                                                                $invoice_product_num = $invoice_product_rs->num_rows;

                                                                if ($invoice_product_num == 0) {
                                                                ?>
                                                                    <div class="col-12">

                                                                        <img src="resources/emptyCart.png" style="height: 200px;" alt="">
                                                                    </div>
                                                                    <?php
                                                                } else {



                                                                    for ($y = 0; $y < $invoice_product_num; $y++) {
                                                                        $invoice_product_data = $invoice_product_rs->fetch_assoc();

                                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_product_data["product_id"] . "'");
                                                                        $product_data = $product_rs->fetch_assoc();

                                                                        $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $invoice_product_data["size_id"] . "'");
                                                                        $size_data = $size_rs->fetch_assoc();



                                                                        $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                        $colour_data = $colour_rs->fetch_assoc();

                                                                        $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id`='" . $product_data["id"] . "'");
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
                                                                                            <h5 class="card-title fw-bold text-decoration-underline"><?php echo $product_data["title"] ?></h5>
                                                                                            <span class="fs-6 fw-bold text-black-50"> Rs. <?php echo $product_data["price"] ?> .00</span>
                                                                                            <div class="row mt-lg-3">
                                                                                                <div class="col-12 mt-0">
                                                                                                    <span class="fs-6 mt-3 text-black-50">Product Id : </span>
                                                                                                    <span class="fs-6 text-black-50"> <?php echo $product_data["product_code"] ?></span>
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
                                                                                                    <span class="fs-6 text-black-50"> <?php echo $invoice_product_data["qty"] ?></span>
                                                                                                </div>


                                                                                            </div>

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

                                                        <div class="modal-footer">
                                                            <?php
                                                            if ($invoice_product_num == 0) {
                                                            ?>
                                                                Total product(s) : 0

                                                            <?php
                                                            } else {
                                                            ?>
                                                                Total product(s) : <?php echo $invoice_product_num ?>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- model 1-->

                                            <!-- model 2-->
                                            <div class="modal" tabindex="-1" id="userDetails<?php echo $user_data['email'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">User Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body p-4">

                                                            <?php
                                                            $user_address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $user_data["email"] . "'");
                                                            $user_address_data = $user_address->fetch_assoc();

                                                            $gender_rs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $user_data["gender_id"] . "' ");
                                                            $gender_data = $gender_rs->fetch_assoc();

                                                            $city_rs = Database::search("SELECT * FROM `city` WHERE `id`= '" . $user_address_data["city_id"] . "'");
                                                            $city_data = $city_rs->fetch_assoc();
                                                            $district_rs = Database::search("SELECT * FROM `district` WHERE `id`='" . $city_data["district_id"] . "'");
                                                            $district_data = $district_rs->fetch_assoc();
                                                            $user_img_rs = Database::search("SELECT * FROM `user_image` WHERE `user_email`='" . $user_data["email"] . "'");
                                                            $user_img_num = $user_img_rs->num_rows;
                                                            ?>

                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <span class="fw-bold fs-5"><?php echo $user_data["fname"] ?> <?php echo $user_data["lname"] ?></span> <small><?php echo $gender_data["gender_name"] ?></small>

                                                                    <h6><?php echo $user_address_data["line1"] ?> <?php echo $user_address_data["line2"] ?>,</h6>
                                                                    <h6><?php echo $city_data["name"] ?>,</h6>
                                                                    <h6><?php echo $district_data["name"] ?>.</h6>
                                                                    <h6><?php echo $user_address_data["postal_code"] ?></h6>
                                                                </div>
                                                                <div class="col-4 text-center justify-content-center">
                                                                    <?php
                                                                    if($user_img_num==1){
                                                                        $user_img_data =$user_img_rs->fetch_assoc();
                                                                        ?>
                                                                    <img src="<?php echo $user_img_data["path"] ?>" style="height: 100px; width: 100px;" class="rounded-circle" alt=""> <br>
                                                                        
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                    <img src="resources/emptyUser.png" style="height: 100px; width: 100px;" class="rounded-circle" alt=""> <br>
                                                                        
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <small class="fw-bold"><?php echo $user_data["email"] ?></small>
                                                                    <small><?php echo $user_data["mobile"] ?></small>

                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <!-- model -->
                                            <!-- model 3-->
                                            <div class="modal" tabindex="-1" id="sendEmail<?php echo $user_data['email'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Send Email</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body p-4">

                                                            <div class="row">
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control" id="floatingInput"  value="<?php echo $user_data['email'] ?>" readonly>
                                                                    <label for="floatingInput">&nbsp; To </label>
                                                                </div>
                                                                <div class=" mb-3">
                                                                    <textarea  class="form-control" onkeyup="removeResponseTextFromSendEmail('<?php echo $user_data['email'] ?>');" id="mailValue<?php echo $user_data['email'] ?>" cols="30" rows="10" placeholder="Subject"></textarea>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <small class="text-danger" id="responseSendEmail<?php echo $user_data['email'] ?>"></small>
                                                            <button type="button" class="btn btn-sm btn-dark" onclick="sendEmailMsg('<?php echo $user_data['email'] ?>');">Send</button>
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
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</body>

</html>