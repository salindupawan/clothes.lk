<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | New Tech</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include "header.php" ?>
            <div class="col-6">
                <h2 class="fw-bold text-black-50">Order Details</h2>
            </div>
            <div class="col-6 btn-toolbar justify-content-end">
                <button class="btn btn-outline-dark me-2">Print</button>
                <button class="btn btn-outline-danger me-2">Export as PDF</button>
            </div>
            <div class="mt-2">
                <hr>
            </div>
            <div class="col-4 col-lg-5 px-1 px-lg-5">
                <h4 class="fw-bold mb-5">Order Information</h4>
                <p class="fs-5"><b class="fs-5">Buyer : </b>Salindu Pawan</p>
                <p class="fs-5"><b class="fs-5">Order Placed On : </b>Friday, Mar 23 2022</p>
                <p class="fs-5"><b class="fs-5">Payment Method : </b>Paypal</p>
                <p class="fs-5"><b class="fs-5">Payment Date : </b>Friday, Mar 23 2022</p>
            </div>
            <div class="col-4 col-lg-4">
                <h4 class="fw-bold mb-5">Shipping Address</h4>
                <p class="fs-5"><b class="fs-5">Salindu Pawan </b></p>
                <p class="fs-5">No.13/A , <br> De Soyza mw. <br> Colombo 5 <br>Colombo </p>
            </div>
            <div class="col-4 col-lg-3">
                <div class="row">
                    <div class="col-12">
                        <h4 class="fw-bold mb-5">Order Total</h4>
                    </div>
                    <div class="col-12 border-top ">
                        <p class="fs-5"><b class="fs-5">Total :  </b>Rs. 180000.00</p>
                    </div>
                    <div class="col-12 border-top ">
                        <p class="fs-5"><b class="fs-5">Shipping :  </b>Rs. 600.00</p>
                    </div>
                    <div class="col-12 border-top border-bottom">
                        <p class="fs-5"><b class="fs-5">Subtotal :  </b>Rs. 180600.00</p>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <hr>
            </div>

            <div class="col-12 px-2 px-lg-5">
                <h3 class="fw-bold text-black-50">
                    Item(s) Brought From Clothes.lk
                </h3>
                <p>Order Number : <b>00007665-45445</b></p>
                
            </div>
            <div class="">
                <hr>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr class="border-bottom border-top">
                            <th>#</th>
                            <th>Item Name</th>
                            <th class="">Unit Price</th>
                            <th class="">Quantity</th>
                            <th class="">Shipping Service</th>
                            <th class="text-end">Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" fs-5">01</td>
                            <td>
                                <span class="fs-5">Apple iPhone 12</span>
                            </td>
                            <td class="fs-5">Rs . 100000.00</td>
                            <td class="fs-5">01</td>
                            <td class="fs-5">Pronto Domestic</td>
                            <td class="fs-5 text-end">Rs . 100000.00</td>
                        </tr>
                        <tr>
                            <td class=" fs-5">02</td>
                            <td>
                                <span class="fs-5">Apple iPhone 8+</span>
                            </td>
                            <td class="fs-5">Rs . 80000.00</td>
                            <td class="fs-5">01</td>
                            <td class="fs-5">Pronto Domestic</td>
                            <td class="fs-5 text-end">Rs . 80000.00</td>
                        </tr>
                    </tbody>

                </table>
            </div>
            
            <div class="col-12 text-center mt-5 mb-5" >
                        <span class="fs-1 fw-bold text-primary">Thank You !</span>
                    </div>

            <?php include "footer.php" ?>
        </div>
    </div>




    <script src="script.js"></script>
</body>

</html>