<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/c.png" />
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4 col-lg-6 offset-lg-3 rounded rounded-3 mb-3 bg-body shadow">
                <div class="row p-3">
                    <div class="col-12">
                        <h2 class="fw-bold text-black-50">Update Products</h2>
                        <hr>
                    </div>
                    <div class="col-12 d-flex justify-content-center px-2">
                        <img src="resources/ex1.jpg" class="border p-2 rounded" style="height: 120px;  width: 90px;" id="i0" alt="">
                        <img src="resources/ex1.jpg" class="border p-2 rounded" style="height: 120px; margin-left: 10px; width: 90px;" id="i1" alt="">
                        <img src="resources/ex1.jpg" class="border p-2 rounded" style="height: 120px; margin-left: 10px; width: 90px;" id="i2" alt="">
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <div class="row">
                            <div class="col-4 col-lg-4 offset-4 offset-lg-4 d-grid">
                                <input type="file" class="d-none" id="imageuploader" multiple>
                                <label for="imageuploader" class="btn btn-outline-dark rounded rounded-5" onclick="changeProductImage();">Upload Images</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6  mt-3">
                        <label class="form-label fw-bold">Category</label>
                        <select class="form-select form-select-sm" disabled>
                            <option>Select Category</option>
                        </select>
                    </div>
                    <div class="col-6  mt-3">
                        <label class="form-label fw-bold">Sub Category</label>
                        <select class="form-select form-select-sm" disabled>
                            <option>Select Sub Category</option>
                        </select>
                    </div>
                    <div class="col-6  mt-3">
                        <label class="form-label fw-bold">Brand</label>
                        <select class="form-select form-select-sm" disabled>
                            <option>Select Brand</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label class="form-label fw-bold">Colour</label>
                        <select class="form-select form-select-sm" disabled>
                            <option>Select Colour</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-12 mt-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-12">
                        <div class="row">



                            <div class="col-4 col-lg-4 mt-3">
                                <label class="form-label fw-bold">Size</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1"> &nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        XS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">&nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        S
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">&nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        M
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">&nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        L
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">&nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        XL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">&nbsp;
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        XXL
                                    </label>
                                </div>

                            </div>
                            <div class="col-8 col-lg-8">
                                <div class="row">





                                    <div class="col-12  mt-3">
                                        <label class="form-label fw-bold">Quantity</label>
                                        <input type="number" min="1" value="1" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-12  mt-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control form-control-sm" disabled aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="col-12  mt-3">
                                        <label class="form-label fw-bold">Delivery fee</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control form-control-sm" disabled m aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea cols="30" rows="30" class="form-control form-control-sm"></textarea>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-4 col-lg-3 offset-2 offset-lg-3 d-grid">
                                <a href="#" class="btn btn-outline-primary rounded rounded-5" onclick="previewProduct();">Preview</a>
                            </div>
                            <div class="col-4 col-lg-3  d-grid">
                                <a href="#" class="btn btn-primary rounded rounded-5">Add Product</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- model -->
                <div class="modal" tabindex="-1" id="addProduct">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body d-flex justify-content-center">

                                <div class="card" style="width: 20rem;">
                                    <img src="resources/longsleeve1.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-decoration-underline">Deedat Longsleeves p43a2 </h5>
                                        <span class="card-text text-primary">Rs. 4100 .00</span> <br />

                                        <button class="col-12 btn btn-primary rounded rounded-5 mt-3">Buy Now</button>
                                        <button class="col-12 btn btn-info text-white rounded rounded-5 mt-2">Add to Cart</button>
                                        <button class="col-12 btn btn-outline-primary rounded rounded-5 mt-2">
                                            <i class="bi bi-heart  fs-5"></i> &nbsp; Add to Watchlist
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- model -->
            </div>


        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>