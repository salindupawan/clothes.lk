<?php
session_start();
require "connection.php";

if(isset($_SESSION["au"])){

    $value = $_POST["v"];
    $cid = $_POST["cid"];
    

    $query = "SELECT * FROM `product`  WHERE";
    
   


    if($value==0){
        $query = "SELECT * FROM `product` INNER JOIN `sub_category` ON product.sub_category_id=sub_category.id INNER JOIN `category` ON sub_category.category_id=category.id WHERE `category`.`id`='".$cid."'";

    }else {
        $subCategory_rs = Database::search("SELECT sub_category.id AS id, sub_category.name AS name FROM `sub_category` INNER JOIN `category` ON sub_category.category_id=category.id WHERE `category`.`id`='".$cid."'");
        $subCategory_num = $subCategory_rs->num_rows;
    
        for($x=0;$x<$subCategory_num;$x++){
            $subCategory_data = $subCategory_rs->fetch_assoc();
    
            if($value==$subCategory_data["id"]){
                $query .= "  `sub_category_id`='".$value."'";
            }
        }
    }

   




    ?>
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
                                        
                                        <tbody>
                                            <?php
                                            $product_rs = Database::search($query);
                                            $product_num = $product_rs->num_rows;

                                            
                                           
                                            for ($h = 0; $h < $product_num; $h++) {
                                                $product_data = $product_rs->fetch_assoc();
                                            ?>


                                                <tr>

                                                    <td class="text-primary "><?php echo $product_data["product_code"] ?> <a href="#!" class="text-black text-end text-decoration-none">&nbsp; &nbsp;<i class="bi bi-eye-fill" onclick="adminProduct(<?php echo $product_data['id'] ?>);"></i></a></td>
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
                                                    <div class="modal " tabindex="-1" id="updateProductModal<?php echo $product_data['id'] ?>">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                            <div class="modal-content bg-body">
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
    <?php







}else{
    header("Location:home.php");
}
?>