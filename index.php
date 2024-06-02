<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes.lk </title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/c.png" />
</head>

<body class="main-body">
    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-items-center">
            <!-- header -->
            <div class="col-12 fixed-top mt-3">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12 text-center title1">Keep Calm & Stay Classy</div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">
                    <div class="background col-6 d-none d-lg-block"></div>
                    <div class="col-12 col-lg-6 " id="signUpBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control form-control-sm " id="f" />
                                <small class="text-danger" id="fl"></small>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control form-control-sm" id="l" />
                                <small class="text-danger" id="ll"></small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" id="e" />
                                <small class="text-danger" id="el"></small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control form-control-sm" id="p" />
                                <small class="text-danger" id="pl"></small>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control form-control-sm" id="m" />
                                <small class="text-danger" id="ml"></small>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select name="" id="g" class="form-select form-select-sm">
                                    <?php
                                    require "connection.php";
                                    $gender_rs = Database::search("SELECT * FROM `gender`");
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
                            
                            <div class="col-12 col-lg-6 mt-4 d-grid">
                                <button class="btn btn-sm btn-dark" onclick="signUp();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 mt-4 d-grid">
                                <button class="btn btn-sm btn-outline-dark" onclick="changeView();">Already have an account? Sign In</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6 d-none p-3" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Sign In</p>
                            </div>
                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email2" value="<?php echo $email; ?>" />
                                <small class="text-danger" id="e2l"></small>

                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control form-control-sm" id="password2" value="<?php echo $password; ?>" />
                                <small class="text-danger" id="p2l"></small>

                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberme" checked>
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            
                            <div class="col-6 mt-3 text-end">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12">
                            <small class="text-danger" id="ol"></small>

                            </div>
                            <div class="col-12 col-lg-6 mt-4 d-grid">
                                <button class="btn btn-sm btn-dark" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 mt-4 d-grid">
                                <button class="btn btn-sm btn-outline-dark" onclick="changeView();">Regester</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->

            <!-- model -->
            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control form-control-sm" id="npi" />
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                    <small class="text-danger" id="mnpl"></small>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control form-control-sm" id="rnp" />
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                    <small class="text-danger" id="mrpl"></small>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control form-control-sm" id="vc" />
                                </div>
                                <small class="text-danger" id="mvcl"></small>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-dark" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model -->

            <!-- footer -->

            <div class="col-12 fixed-bottom ">
                <p class="text-center">&copy; 2022 Clothes.lk | All Right Reserved</p>
            </div>

            <!-- footer -->
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>