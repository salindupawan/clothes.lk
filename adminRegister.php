<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Regestration</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%, #9FACE6 100%);">

    <div class="col-12 col-lg-6 offset-lg-3   border border-1 rounded rounded-3 border-dark p-3 border-opacity-75" style="margin-top: 180px;">
        <div class="row g-2 ">
            <div class="col-12">
                <p class="title2">Admin register</p>
            </div>

            <div class="col-6">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control form-control-sm" id="email2" />
            </div>
            <div class="col-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="email2" />
            </div>
            <div class="col-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email2" />
            </div>
            <div class="col-12 d-none">
                <label class="form-label">Verification Code</label>
                <input type="text" class="form-control form-control-sm "  id="email2" />
            </div>
            
            <!-- <div class="col-6 mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberme" checked>
                    <label class="form-check-label">Remember Me</label>
                </div>
            </div> -->
            <div class="col-12 mt-3 text-end">

            </div>
            <div class="col-12 mb-3 col-lg-6 mt-4 d-grid">
                <a href="dashboard.php" class="btn btn-sm btn-outline-dark">Back to Dashboard</a>
            </div>
            <div class="col-12 mb-3 col-lg-6 mt-4 d-grid">
                <a href="adminPanel.php" class="btn btn-sm btn-dark">Send Verification Code</a>
            </div>

        </div>
        
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>