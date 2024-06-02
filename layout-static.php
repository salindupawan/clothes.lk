<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Static Navigation - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
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
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
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
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Carousel</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Carousel</li>
                    </ol>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Home Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
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
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Purchasing History</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="resources/wishlistimg.jpg" class="img-fluid w-100" alt="...">

                                            </div>

                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-6">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">wishlist</h6>
                                </div>
                                <div class="card-body">
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
                                    <div class="row mt-3">
                                        <div class="col-12 ">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-12 mt-2 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Mens Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlsmen" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsmen" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsmen" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Womens Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlsWomens" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsWomens" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsWomens" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Kids Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlsKids" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsKids" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsKids" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Accessories Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlsAccessories" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsAccessories" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsAccessories" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Home & Decor Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlshd" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlshd" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlshd" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="fw-bold">Personal Care Page</h6>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControlspc" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item ">
                                                <img src="resources/carosal i11.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">2nd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="resources/carosal i2.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black">
                                                    <h5 class="bg-light rounded-2">3rd Image</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="resources/carosal i3.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption text-black ">
                                                    <h5 class="bg-light rounded-2">This is Active Image</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlspc" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlspc" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-lg-8">
                                            <p class=" text-black-50">For quality Output, Please upload 1920*320 px Images.</p>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-outline-primary ">Upload Images</a>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <a href="#" class="btn btn-sm btn-primary ">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>