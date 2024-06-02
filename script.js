function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

var bm;
function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Enter your email") {
                document.getElementById("e2l").innerHTML = t;
                email.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Verification code sending failed") {
                document.getElementById("e2l").innerHTML = "";
                email.classList = "form-control form-control-sm"

                document.getElementById("ol").innerHTML = t + ". Try again Later";


            } else if (t == "Success") {
                document.getElementById("e2l").innerHTML = "";
                email.classList = "form-control form-control-sm"
                document.getElementById("ol").innerHTML = "";

                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }



        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {

    var email = document.getElementById("email2");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Missing Email address") {

                alert(t);

            } else if (t == "Enter a New Password") {
                document.getElementById("mnpl").innerHTML = t;
                np.classList = "form-control form-control-sm is-invalid"

            } else if (t == "Invalid Password") {
                document.getElementById("mnpl").innerHTML = t;
                np.classList = "form-control form-control-sm is-invalid"

            } else if (t == "Re-type Password") {
                document.getElementById("mnpl").innerHTML = "";
                np.classList = "form-control form-control-sm"

                document.getElementById("mrpl").innerHTML = t;
                rnp.classList = "form-control form-control-sm is-invalid"

            } else if (t == "Password does not matched") {
                document.getElementById("mnpl").innerHTML = "";
                document.getElementById("mrpl").innerHTML = t;
                np.classList = "form-control form-control-sm is-invalid"


                rnp.classList = "form-control form-control-sm is-invalid"

            } else if (t == "Enter your Verification Code") {
                document.getElementById("mnpl").innerHTML = "";
                np.classList = "form-control form-control-sm"
                document.getElementById("mrpl").innerHTML = "";
                rnp.classList = "form-control form-control-sm"

                document.getElementById("mvcl").innerHTML = t;
                vcode.classList = "form-control form-control-sm is-invalid"

            } else if (t == "Invalid Verification Code") {
                document.getElementById("mnpl").innerHTML = "";
                np.classList = "form-control form-control-sm"
                document.getElementById("mrpl").innerHTML = "";
                rnp.classList = "form-control form-control-sm"

                document.getElementById("mvcl").innerHTML = t;
                vcode.classList = "form-control form-control-sm is-invalid"

            } else if (t == "success") {

                bm.hide();
                document.getElementById("ol").innerHTML = "Password Reset Success. Log in Now.";
                document.getElementById("ol").classList = "text-success";


            } else {
                alert(t);
            }



        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}




function changeProductImage(id) {
    var image = document.getElementById("imageuploader" + id);

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x + id).src = url;
            }

        } else {
            alert("Please select 3 or less than 3 images.");
        }

    }
}

function changeProductImageAddProduct() {
    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        } else {
            alert("Please select 3 or less than 3 images.");
        }

    }
}

var cam;
function previewProduct() {
    var m = document.getElementById("addProduct");
    cam = new bootstrap.Modal(m);
    cam.show();

}

var ap;
function adminProduct(id) {


    var m = document.getElementById("adminProduct" + id);
    ap = new bootstrap.Modal(m);



    ap.show();


}

var apm;
function addProductModal() {

    var m = document.getElementById("addProductModal");
    apm = new bootstrap.Modal(m);
    apm.show();

}
var upm;
function updateProductModal(id, n) {

    var m = document.getElementById("updateProductModal" + id);
    upm = new bootstrap.Modal(m);


    upm.show();

}
var pdm;
function productDetails(id) {
    var m = document.getElementById("productDetails" + id);
    pdm = new bootstrap.Modal(m);
    pdm.show();

}
var sdm;
function shippingDetails(id) {
    var m = document.getElementById("shippingDetails" + id);
    sdm = new bootstrap.Modal(m);
    sdm.show();

}
var udm;
function userDetails(mail) {
    var m = document.getElementById("userDetails" + mail);
    udm = new bootstrap.Modal(m);
    udm.show();

}
var opm;
function orderedProducts(mail) {
    var m = document.getElementById("orderedProducts" + mail);
    opm = new bootstrap.Modal(m);
    opm.show();

}
var sem;
function sendEmail(mail) {
    var m = document.getElementById("sendEmail" + mail);
    sem = new bootstrap.Modal(m);
    sem.show();

}
var asm;
function addSubcategory() {
    var m = document.getElementById("addSubcategory");
    asm = new bootstrap.Modal(m);
    asm.show();

}
var usim;
function updateSubImages() {
    var m = document.getElementById("updateSubImages");
    usim = new bootstrap.Modal(m);
    usim.show();

}
var acm;
function addColour() {
    var m = document.getElementById("addColour");
    acm = new bootstrap.Modal(m);
    acm.show();

}
var sl10m;
function stocklt10() {
    var m = document.getElementById("stocklt10");
    sl10m = new bootstrap.Modal(m);
    sl10m.show();

}
var oosm;
function outofStock() {
    var m = document.getElementById("outofStock");
    oosm = new bootstrap.Modal(m);
    oosm.show();

}

function signUp() {
    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");

    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "Enter your First Name") {
                document.getElementById("fl").innerHTML = text;
                f.classList = "form-control form-control-sm is-invalid"
            } else if (text == "First Name must have less than 50 characters") {
                document.getElementById("fl").innerHTML = text;
                f.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Enter your Last Name") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";

                document.getElementById("ll").innerHTML = text;
                l.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Last Name must have less than 50 characters") {

                f.classList = "form-control form-control-sm"
                document.getElementById("fl").innerHTML = "";

                document.getElementById("ll").innerHTML = text;
                l.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Enter your Email") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";

                document.getElementById("el").innerHTML = text;
                e.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Email must have less than 100 characters") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";

                document.getElementById("el").innerHTML = text;
                e.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Invalid Email") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";

                document.getElementById("el").innerHTML = text;
                e.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Enter your Password") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";
                e.classList = "form-control form-control-sm"
                document.getElementById("el").innerHTML = "";

                document.getElementById("pl").innerHTML = text;
                p.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Password must be between 5 - 20 charcters") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";
                e.classList = "form-control form-control-sm"
                document.getElementById("el").innerHTML = "";

                document.getElementById("pl").innerHTML = text;
                p.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Enter your Mobile") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";
                e.classList = "form-control form-control-sm"
                document.getElementById("el").innerHTML = "";
                p.classList = "form-control form-control-sm"
                document.getElementById("pl").innerHTML = "";

                document.getElementById("ml").innerHTML = text;
                m.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Mobile must have 10 characters") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";
                e.classList = "form-control form-control-sm"
                document.getElementById("el").innerHTML = "";
                p.classList = "form-control form-control-sm"
                document.getElementById("pl").innerHTML = "";

                document.getElementById("ml").innerHTML = text;
                m.classList = "form-control form-control-sm is-invalid"
            } else if (text == "Invalid Mobile") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";
                e.classList = "form-control form-control-sm"
                document.getElementById("el").innerHTML = "";
                p.classList = "form-control form-control-sm"
                document.getElementById("pl").innerHTML = "";

                document.getElementById("ml").innerHTML = text;
                m.classList = "form-control form-control-sm is-invalid"
            } else if (text == "User with the same Email or Mobile already exists.") {
                f.classList = "form-control form-control-sm";
                document.getElementById("fl").innerHTML = "";
                l.classList = "form-control form-control-sm"
                document.getElementById("ll").innerHTML = "";

                document.getElementById("el").innerHTML = "";
                p.classList = "form-control form-control-sm"
                document.getElementById("pl").innerHTML = "";;

                document.getElementById("ml").innerHTML = text;
                m.classList = "form-control form-control-sm is-invalid"
                e.classList = "form-control form-control-sm is-invalid"
            } else if (text == "success") {
                var signUpBox = document.getElementById("signUpBox");
                var signInBox = document.getElementById("signInBox");

                signUpBox.classList.toggle("d-none");
                signInBox.classList.toggle("d-none");



            }

        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Enter your Email") {
                document.getElementById("e2l").innerHTML = t;
                email.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Email must have less than 100 characters") {
                document.getElementById("e2l").innerHTML = t;
                email.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Invalid Email") {
                document.getElementById("e2l").innerHTML = t;
                email.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Enter your Password") {
                document.getElementById("e2l").innerHTML = "";
                email.classList = "form-control form-control-sm"

                document.getElementById("p2l").innerHTML = t;
                password.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Password must have between 5-20 charaters") {
                document.getElementById("e2l").innerHTML = "";
                email.classList = "form-control form-control-sm"

                document.getElementById("p2l").innerHTML = t;
                password.classList = "form-control form-control-sm is-invalid"
            } else if (t == "Invalid Email or Password") {
                document.getElementById("e2l").innerHTML = "";
                email.classList = "form-control form-control-sm"
                document.getElementById("p2l").innerHTML = "";
                email.classList = "form-control form-control-sm"

                document.getElementById("ol").innerHTML = t;
            } else if (t == "success") {
                window.location = "home.php";

            } else {
                alert(t);
            }



        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}

function offcanvasqtycalc(qty, id) {

    var tsuccess = document.getElementById("tsuccess" + id);
    var tdanger = document.getElementById("tdanger" + id);

    var input = document.getElementById("offcanvasqty" + id)
    var value = document.getElementById("offcanvasqty" + id).value;
    var qtyint = Number.parseInt(qty);
    var valueint = Number.parseInt(value);

    if (valueint == qtyint) {

        tdanger.classList = "col-12 mt-2 d-none"
        tsuccess.classList = "col-12 mt-2"

    } else if (valueint > qtyint) {
        tsuccess.classList = "col-12 mt-2 d-none"
        tdanger.classList = "col-12 mt-2"
        input.value = qty;
        tdanger.classList = "col-12 mt-2 d-none"
        tsuccess.classList = "col-12 mt-2"


    } else if (valueint < qtyint) {
        tsuccess.classList = "col-12 mt-2 d-none"
        tdanger.classList = "col-12 mt-2 d-none"

    }



}

function cartqtycalc(qty, id, price) {

    var subtotal = document.getElementById("subtotal" + id);
    var tsuccess = document.getElementById("tsuccess" + id);
    var tdanger = document.getElementById("tdanger" + id);

    var input = document.getElementById("offcanvasqty" + id)
    var value = document.getElementById("offcanvasqty" + id).value;
    if (value <= 0) {
        input.value = 1;
        value = 1;
    }
    if (value > 0) {



        var qtyint = Number.parseInt(qty);
        var valueint = Number.parseInt(value);
        var priceint = Number.parseInt(price);


        var re = new XMLHttpRequest();

        re.onreadystatechange = function () {
            if (re.readyState == 4) {
                var t = re.responseText;
                var data = t.split(",");
                var sub_total = data[0];
                var shipping = data[1];

                var order_total = Number.parseInt(sub_total) + Number.parseInt(shipping);



                document.getElementById("subTotal").innerHTML = sub_total;
                document.getElementById("shipping").innerHTML = shipping;
                document.getElementById("OrderTotal").innerHTML = order_total;

            }
        }

        re.open("GET", "subTotalCalc.php", true);
        re.send();





        var subtotalvalue = priceint * valueint;
        subtotal.innerHTML = subtotalvalue;

        if (valueint == qtyint) {

            tdanger.classList = "col-12 mt-2 d-none"
            tsuccess.classList = "col-12 mt-2"

            var f = new FormData();
            f.append("id", id);
            f.append("v", qtyint);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;

                }
            }

            r.open("POST", "updateCartProcess.php", true);
            r.send(f);


        } else if (valueint > qtyint) {
            tsuccess.classList = "col-12 mt-2 d-none"
            tdanger.classList = "col-12 mt-2"
            input.value = qty;
            tdanger.classList = "col-12 mt-2 d-none"
            tsuccess.classList = "col-12 mt-2"
            subtotal.innerHTML = priceint * qtyint;

            var f = new FormData();
            f.append("id", id);
            f.append("v", qtyint);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;

                }
            }

            r.open("POST", "updateCartProcess.php", true);
            r.send(f);



        } else if (valueint < qtyint) {
            tsuccess.classList = "col-12 mt-2 d-none"
            tdanger.classList = "col-12 mt-2 d-none"

            var f = new FormData();
            f.append("id", id);
            f.append("v", valueint);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;


                }
            }

            r.open("POST", "updateCartProcess.php", true);
            r.send(f);

        }
    }









}


function loadMainImg(id, y) {
    var sample_img = document.getElementById("img" + id + y);

    var main_img = document.getElementById("mainImg" + id);

    main_img.src = sample_img.src;




}
function singlproductImages(y) {
    var sample_img = document.getElementById("img" + y);

    var main_img = document.getElementById("mainImg");

    main_img.src = sample_img.src;


}

function addToWishlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added") {
                document.getElementById("wl" + id).innerHTML = "<i class='bi bi-heart-fill fs-5'></i> &nbsp; Added to Wishlist"

            } else if (t == "removed") {
                document.getElementById("wl" + id).innerHTML = "<i class='bi bi-heart fs-5'></i> &nbsp; Add to Wishlist"
            } else {
                alert(t);

            }
        }
    }

    r.open("GET", "addToWishlistProcess.php?id=" + id, true);
    r.send();
}

function signOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "home.php";
                window.location.reload();
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();
}

var cartM;
function addToCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added") {
                document.getElementById("ac" + id).innerHTML = "<i class='bi bi-check-lg'></i> Added to Cart"

                window.location.reload();

            } else if (t == "removed") {
                document.getElementById("ac" + id).innerHTML = "Add to Cart"
                window.location.reload();

            } else {
                alert(t);

            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}

function addToCartSinglProduct(id) {

    var qty = document.getElementById("offcanvasqty" + id).value;
    var size = document.getElementById("size" + id).value;



    var f = new FormData();
    f.append("id", id);
    f.append("size", size);
    f.append("qty", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added") {
                // document.getElementById("sp" + id).innerHTML = "<i class='bi bi-cart4 fs-5'></i> &nbsp; &nbsp; Added to Cart"

                // window.location.reload();
                window.location.reload();

            } else if (t == "removed") {
                // document.getElementById("sp" + id).innerHTML ="<i class='bi bi-cart4 fs-5'></i> &nbsp; &nbsp; Add to Cart"
                window.location.reload();


            } else {
                alert(t);

            }
        }
    }

    r.open("POST", "addToCartSinglProductProcess.php", true);
    r.send(f);
}

function deleteFromCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product has been removed") {

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeCartProcess.php?id=" + id, true);
    r.send();
}

function clearCart() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "removed") {

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "clearCartProcess.php", true);
    r.send();
}

function RemoveWishlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added") {
                document.getElementById("h" + id).classList = "bi bi-heart-fill text-danger fs-2"

            } else if (t == "removed") {
                document.getElementById("h" + id).classList = "bi bi-heart text-danger fs-2"
            } else {
                alert(t);

            }
        }
    }

    r.open("GET", "addToWishlistProcess.php?id=" + id, true);
    r.send();
}

function changeImage() {
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("imageuploader");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");
    var image = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);

    if (image.files.length == 0) {
        f.append("image", 0);


    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("f1").innerHTML = t;
                document.getElementById("f2").innerHTML = "";

            } else {
                document.getElementById("f1").innerHTML = "";
                document.getElementById("f2").innerHTML = t;
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}

function saveSize(id) {

    var size = document.getElementById("size" + id).value;



    var f = new FormData();
    f.append("size", size);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;



            if (t == "done") {

                window.location.reload();
            } else if (t == "something went wrong") {
                alert(t);

            }
        }
    }
    r.open("POST", "updateSizeInCartProcess.php", true);
    r.send(f);
}

function saveSizeHeader(id) {
    var size = document.getElementById("sizeheader" + id).value;



    var f = new FormData();
    f.append("size", size);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "done") {

                window.location.reload();
            } else if (t == "something went wrong") {
                alert(t);

            }
        }
    }
    r.open("POST", "updateSizeInCartProcess.php", true);
    r.send(f);
}

function deleteFromPurchaseHistory(id) {



    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("div" + id).classList = "col-12 d-none";

            } else {
                alert(t)
            }
        }
    }

    r.open("GET", "deleteFromPurchaseHistory.php?id=" + id, true);
    r.send();
}

function deleteAllFromInvoice() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteAllFromPurchaseHistory.php", true);
    r.send();
}

function buyNowSingleProduct(id) {
    var size = document.getElementById("size" + id).value;
    var qty = document.getElementById("offcanvasqty" + id).value;

    var f = new FormData();
    f.append("s", size);
    f.append("q", qty);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "buyNowSingleProductProcess.php", true);
    r.send(f);
}

function checkOutNextuk() {



    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var pw = document.getElementById("npi");
    var cpw = document.getElementById("rnp");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");



    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("pw", pw.value);
    f.append("cpw", cpw.value);
    f.append("m", mobile.value);
    f.append("g", gender.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);




    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                buyNow();
            } else {
                document.getElementById("responseText").innerHTML = t;
            }
        }
    }

    r.open("POST", "checkOutNextProcess.php", true);
    r.send(f);


}

function checkOutNextu() {




    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");



    var f = new FormData();

    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);




    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                buyNow();
            } else {
                document.getElementById("responseText").innerHTML = t;
            }
        }
    }

    r.open("POST", "checkOutNextProcess.php", true);
    r.send(f);


}

function buyNow() {

    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);
            var mail = obj["umail"];
            var amount = obj["amount"];

            


            if (t == "1") {
                window.location.reload();
            } else {
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(obj["id"], mail, amount)

                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1223325",    // Replace your Merchant ID
                    "return_url": "http://localhost/clotheslk/home.php",     // Important
                    "cancel_url": "http://localhost/clotheslk/home.php",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["id"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash": obj["hash"],
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };
            }

        }
    }

    r.open("GET", "buyNowProcess.php", true);
    r.send();

}

function saveInvoice(oid, mail, amount) {


    var f = new FormData();
    f.append("oid", oid);
    f.append("mail", mail);
    f.append("amount", amount);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                window.location = "invoice.php";

            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "saveInvoiceProcess.php", true);
    r.send(f);
}



function adminVerification() {
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Verification code sending failed") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";

            } else if (t == "Verification code sent. Check your email.") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-success";
            } else if (t == "You are not a valid user") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";

            } else if (t == "Email field should not be empty.") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";

            } else {
                alert(t)
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}

function verify() {
    var verification = document.getElementById("vcode");
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("v", verification.value);
    f.append("e", email.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "dashboard.php";
            } else if (t == "Enter email and get Verification code") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";
            } else if (t == "Enter verification code") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";
            } else if (t == "invalid verification code.") {
                document.getElementById("adminresponse").innerHTML = t;
                document.getElementById("adminresponse").classList = "text-danger";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "verificationProcess.php", true);
    r.send(f);
}

function updateProduct(pid) {
    var s7 = document.getElementById("s7" + pid);
    var s8 = document.getElementById("s8" + pid);
    var s9 = document.getElementById("s9" + pid);
    var s10 = document.getElementById("s10" + pid);
    var s11 = document.getElementById("s11" + pid);
    var s12 = document.getElementById("s12" + pid);

    var xs;
    var s;
    var m;
    var l;
    var xl;
    var xxl;

    if (s7.checked) {
        xs = 1;
    } else {
        xs = 0;
    }
    if (s8.checked) {
        s = 1;
    } else {
        s = 0;
    }
    if (s9.checked) {
        m = 1;
    } else {
        m = 0;
    }
    if (s10.checked) {
        l = 1;
    } else {
        l = 0;
    }
    if (s11.checked) {
        xl = 1;
    } else {
        xl = 0;
    }
    if (s12.checked) {
        xxl = 1;
    } else {
        xxl = 0;
    }

    var qty = document.getElementById("q" + pid).value;
    var title = document.getElementById("t" + pid).value;
    var delivery = document.getElementById("dil" + pid).value;
    var description = document.getElementById("des" + pid).value;
    var images = document.getElementById("imageuploader" + pid);


    var f = new FormData();
    f.append("xs", xs);
    f.append("s", s);
    f.append("m", m);
    f.append("l", l);
    f.append("xl", xl);
    f.append("xxl", xxl);
    f.append("q", qty);
    f.append("t", title);
    f.append("dil", delivery);
    f.append("des", description);
    f.append("id", pid);

    var file_count = images.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                upm.hide();

                document.getElementById("datatablesSimple").reload();

            } else {

                document.getElementById("updateProductResponse" + pid).innerHTML = t;
            }
        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);




}

function deactiveProduct(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "blocked") {
                document.getElementById("pb" + id).innerHTML = "Activate";
                document.getElementById("pb" + id).classList = "btn btn-sm btn-success";
            } else if (t == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "Deactivate";
                document.getElementById("pb" + id).classList = "btn btn-sm btn-danger";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deactiveProductProcess.php?id=" + id, true);
    r.send();
}

function changeSubCategory(cid) {
    var v = document.getElementById("changeSubCategory").value;


    var f = new FormData();
    f.append("v", v);
    f.append("cid", cid);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("datatablesSimple").innerHTML = t;

        }
    }
    r.open("POST", "mensTableProcess.php", true);
    r.send(f);


}

function saveProduct() {
    var s7 = document.getElementById("s7");
    var s8 = document.getElementById("s8");
    var s9 = document.getElementById("s9");
    var s10 = document.getElementById("s10");
    var s11 = document.getElementById("s11");
    var s12 = document.getElementById("s12");

    var xs;
    var s;
    var m;
    var l;
    var xl;
    var xxl;

    if (s7.checked) {
        xs = 1;
    } else {
        xs = 0;
    }
    if (s8.checked) {
        s = 1;
    } else {
        s = 0;
    }
    if (s9.checked) {
        m = 1;
    } else {
        m = 0;
    }
    if (s10.checked) {
        l = 1;
    } else {
        l = 0;
    }
    if (s11.checked) {
        xl = 1;
    } else {
        xl = 0;
    }
    if (s12.checked) {
        xxl = 1;
    } else {
        xxl = 0;
    }

    var category = document.getElementById("category").value;
    var subcategory = document.getElementById("subcategory").value;
    var brand = document.getElementById("brand").value;
    var colour = document.getElementById("colour").value;
    var pid = document.getElementById("pid").value;
    var qty = document.getElementById("qty").value;
    var price = document.getElementById("price").value;
    var title = document.getElementById("title").value;
    var delivery = document.getElementById("delivery").value;
    var description = document.getElementById("des").value;
    var images = document.getElementById("imageuploader");



    var f = new FormData();
    f.append("xs", xs);
    f.append("s", s);
    f.append("m", m);
    f.append("l", l);
    f.append("xl", xl);
    f.append("xxl", xxl);
    f.append("q", qty);
    f.append("t", title);
    f.append("dil", delivery);
    f.append("des", description);
    f.append("pid", pid);
    f.append("p", price);
    f.append("co", colour);
    f.append("b", brand);
    f.append("su", subcategory);
    f.append("ca", category);

    var file_count = images.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product Added") {
                document.getElementById("addProductResponse").innerHTML = t + " <i class='bi bi-check-lg'></i>";
                document.getElementById("addProductResponse").classList = "text-success";

                for (var y = 0; y < 3; y++) {
                    document.getElementById("i" + y).src = "resources/ex1.jpg";
                }

                document.getElementById("title").value = "";
                document.getElementById("pid").value = "";
                document.getElementById("qty").value = "";
                document.getElementById("price").value = "";
                document.getElementById("delivery").value = "";
                document.getElementById("des").value = "";
                document.getElementById("category").value = 0;
                document.getElementById("subcategory").value = 0;
                document.getElementById("brand").value = 0;
                document.getElementById("colour").value = 0;
            } else {
                document.getElementById("addProductResponse").innerHTML = t + "*";

            }

            // alert(t);
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}

function addSubcategorydata(id) {

    var i = document.getElementById(id).value;

    var f = new FormData();
    f.append("i", i);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("r" + id).innerHTML = "Sub Category Added. Please refresh page";
                document.getElementById("r" + id).classList = "text-success";
                document.getElementById(id).value = "";

            } else if (t == "Already Added") {
                document.getElementById("r" + id).innerHTML = t;
                document.getElementById("r" + id).classList = "text-danger";

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addSubcategoryProcess.php", true);
    r.send(f);
}

function removeResponseText(id) {
    document.getElementById("r" + id).innerHTML = "";
}

function loadSubCatImage(id) {
    var subId = document.getElementById("s" + id).value;



    var f = new FormData();
    f.append("id", subId);
    f.append("pid", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("imgdiv" + id).innerHTML = t;

        }
    }
    r.open("POST", "loadSubCatImageProcess.php", true);
    r.send(f);
}

function addcategoryImage(id) {
    var view = document.getElementById("img" + id);//img tag
    var file = document.getElementById("subcatImageUploader" + id);//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function addColourdata() {
    var c = document.getElementById("colourInput").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("colourR").innerHTML = "Colour Added. Please refresh page";
                document.getElementById("colourR").classList = "text-success";
                document.getElementById(colourInput).value = "";

            } else if (t == "Already added") {
                document.getElementById("colourR").innerHTML = t;
                document.getElementById("colourR").classList = "text-danger";

            } else {
                alert(t);
            }

        }
    }
    r.open("GET", "addColourProcess.php?c=" + c, true);
    r.send();


}

function removeResponseTextFromColour() {
    document.getElementById("colourR").innerHTML = "";
}

function changeInvoiceStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                document.getElementById("btn" + id).innerHTML = "Packing";
                document.getElementById("btn" + id).classList = "btn btn-sm btn-warning ";
                document.getElementById("cbtn" + id).classList = "btn btn-sm btn-danger disabled";
            } else if (t == 2) {
                document.getElementById("btn" + id).innerHTML = "Dispatched";
                document.getElementById("btn" + id).classList = "btn btn-sm btn-info ";
                document.getElementById("cbtn" + id).classList = "btn btn-sm btn-danger disabled";

            } else if (t == 3) {
                document.getElementById("btn" + id).innerHTML = "Shipping";
                document.getElementById("btn" + id).classList = "btn btn-sm btn-success ";
                document.getElementById("cbtn" + id).classList = "btn btn-sm btn-danger disabled";

            } else if (t == 4) {
                document.getElementById("btn" + id).innerHTML = "Delivered";
                document.getElementById("btn" + id).classList = "btn btn-sm btn-danger  disabled";
                document.getElementById("cbtn" + id).classList = "btn btn-sm btn-danger disabled";

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeInvoiceStatusProcess.php?id=" + id, true);
    r.send();

}

function cancelOrder(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 5) {
                document.getElementById("btn" + id).classList = "btn btn-sm btn-primary  disabled";
                document.getElementById("cbtn" + id).classList = "btn btn-sm btn-danger disabled";
                document.getElementById("cbtn" + id).innerHTML = "Canseled";
            }


        }
    }

    r.open("GET", "canselOrder.php?id=" + id, true);
    r.send();


}

function printInvoice(id) {
    var restorepage = document.body.innerHTML;
    var product = document.getElementById("printProduct" + id).innerHTML;
    var page = document.getElementById("printData" + id).innerHTML;

    document.body.innerHTML = page + product;
    window.print();
    document.body.innerHTML = restorepage;
    window.location.reload();
}

function sendEmailMsg(mail) {
    var mailTxt = document.getElementById("mailValue" + mail).value;


    var f = new FormData();
    f.append("t", mailTxt);
    f.append("m", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Message sending failed") {
                document.getElementById("responseSendEmail" + mail).innerHTML = t;
                document.getElementById("responseSendEmail" + mail).classList = "text-danger";
            } else if (t == "Message Sent") {
                document.getElementById("responseSendEmail" + mail).innerHTML = t;
                document.getElementById("responseSendEmail" + mail).classList = "text-success";
                document.getElementById("mailValue" + mail).value = "";

            }

        }

    }
    r.open("POST", "sendEmailToUserProcess.php", true);
    r.send(f);
}

function removeResponseTextFromSendEmail(mail) {
    document.getElementById("responseSendEmail" + mail).innerHTML = "";
}

function filterProducts(brand, subCategory, colour) {

    var brandValue = "0";
    var subCategroyValue = "0";
    var colourValue = "0";
    var price = "0";

    for (var x = 0; x < brand; x++) {
        if (document.getElementById("brand" + x).checked) {
            brandValue = document.getElementById("brand" + x).value
        }
    }

    for (var y = 0; y < subCategory; y++) {
        if (document.getElementById("subCategory" + y).checked) {
            subCategroyValue = document.getElementById("subCategory" + y).value
        }
    }

    for (var z = 0; z < colour; z++) {
        if (document.getElementById("colour" + z).checked) {
            colourValue = document.getElementById("colour" + z).value
        }
    }

    if (document.getElementById("under2").checked) {
        price = "1";
    }
    if (document.getElementById("between2").checked) {
        price = "2";
    }
    if (document.getElementById("over2").checked) {
        price = "3";
    }

    var f = new FormData();
    f.append("brand", brandValue);
    f.append("subCategroy", subCategroyValue);
    f.append("colour", colourValue);
    f.append("price", price);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("productResults").innerHTML = t;

        }

    }
    r.open("POST", "filterProductProcess.php", true);
    r.send(f);




}

function SearchProducts() {

    var serachText = document.getElementById("searchText").value




    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchResults").innerHTML = t;


        }

    }
    r.open("GET", "searchProductProcess.php?text=" + serachText, true);
    r.send();
}






