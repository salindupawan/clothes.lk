<?php
session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $sub_id = $_POST["id"];
    $cat_id = $_POST["pid"];

    $subcatImg_rs = Database::search("SELECT * FROM `subcategory_image` WHERE `sub_category_id`='" . $sub_id . "'");
    $subcatImg_num = $subcatImg_rs->num_rows;

    if ($subcatImg_num == 0) {
?>
        <div class="col-12 mt-2 d-flex justify-content-center">
            <input type="file" class="d-none" id="subcatImageUploader<?php echo $cat_id ?>">
            <label for="subcatImageUploader<?php echo $cat_id ?>" class="updatesubcatimg" onclick="addcategoryImage(<?php echo $cat_id ?>);">
                <img src="resources/noImage.jpg" class="rounded-circle" style="height: 120px; width: 120px;" id="img<?php echo $cat_id ?>" alt="">

            </label>
        </div>
        <div class="col-12 text-center">
            <small class="text-black-50">For Quality Output, Upload 1:1 Image.</small>

        </div>
        <div class="col-4 offset-4 mt-2 d-grid">
            <button class="btn btn-sm btn-outline-secondary">Update</button>
        </div>
    <?php
    } else {
        $subcatImg_data = $subcatImg_rs->fetch_assoc();

    ?>
        <div class="col-12 mt-2 d-flex justify-content-center">
            <input type="file" class="d-none" id="subcatImageUploader<?php echo $cat_id ?>">
            <label for="subcatImageUploader<?php echo $cat_id ?>" class="updatesubcatimg" onclick="addcategoryImage(<?php echo $cat_id ?>);">
                <img src="<?php echo $subcatImg_data["path"] ?>" class="rounded-circle" style="height: 120px; width: 120px;" id="img<?php echo $cat_id ?>" alt="">

            </label>
        </div>
        <div class="col-12 text-center">
            <small class="text-black-50">For Quality Output, Upload 1:1 Image.</small>

        </div>
        <div class="col-4 offset-4 mt-2 d-grid">
            <button class="btn btn-sm btn-outline-secondary">Update</button>
        </div>
<?php
    }
} else {
    header("Location:home.php");
}

?>