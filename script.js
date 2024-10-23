function changeViwe() {
    // alert("ok");
    var sigInBOX = document.getElementById("signInBox");
    var sigUpBOX = document.getElementById("signUpBox");

    sigUpBOX.classList.toggle("d-none");
    sigInBOX.classList.toggle("d-none");
}


// sign up process 

function signUp() {
    // alert("ok");

    var fname = document.getElementById("fn").value;
    var lname = document.getElementById("ln").value;
    var email = document.getElementById("em").value;
    var password = document.getElementById("pw").value;
    var mobile = document.getElementById("mobi").value;
    var gender = document.getElementById("gen").value;

    // alert(fname);
    // alert(lname);
    // alert(email);
    // alert(password);
    // alert(mobile);
    // alert(gender);

    var form = new FormData();
    form.append("fn", fname);
    form.append("ln", lname);
    form.append("em", email);
    form.append("pw", password);
    form.append("mobi", mobile);
    form.append("gen", gender);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);

            if (text == "please Enter Your First Name !!!") {
                document.getElementById("wor1").innerHTML = text;
            } else if (text == "First Name must have less than 50 chatacters") {
                document.getElementById("wor1").innerHTML = text;
            } else {
                document.getElementById("wor1").innerHTML = "";
            }

            if (text == "please Enter Your Last Name !!!") {
                document.getElementById("wor2").innerHTML = text;
            } else if (text == "Last Name must have less than 50 chatacters") {
                document.getElementById("wor2").innerHTML = text;
            } else {
                document.getElementById("wor2").innerHTML = "";
            }

            if (text == "please Enter Your Email !!!") {
                document.getElementById("wor3").innerHTML = text;
            } else if (text == "Invalide Email !!!") {
                document.getElementById("wor3").innerHTML = text;
            } else {
                document.getElementById("wor3").innerHTML = "";
            }

            if (text == "please Enter Your Password !!!") {
                document.getElementById("wor4").innerHTML = text;
            } else if (text == "password must be between 5-20 charcters") {
                document.getElementById("wor4").innerHTML = text;
            } else {
                document.getElementById("wor4").innerHTML = "";
            }

            if (text == "please Enter Your Mobile Number !!!") {
                document.getElementById("wor5").innerHTML = text;
            } else if (text == "Mobile Number must be 10 charcters") {
                document.getElementById("wor5").innerHTML = text;
            } else if (text == "Invalde Mobile Number !!!") {
                document.getElementById("wor5").innerHTML = text;
            } else {
                document.getElementById("wor5").innerHTML = "";
            }

            if (text == "User with the same Email or Mobile already exists") {
                document.getElementById("wor6").innerHTML = text;
            } else {
                document.getElementById("wor6").innerHTML = "";
            }

            if (text == "success") {
                // alert(text);

                $("#relodsignInpage").load(" #relodsignInpage");

                document.getElementById("fn").value = "";
                document.getElementById("ln").value = "";
                document.getElementById("em").value = "";
                document.getElementById("pw").value = "";
                document.getElementById("mobi").value = "";



            }


        }
    }

    req.open("POST", "signUpProcess.php", true);
    req.send(form);


}



// Sign In

function signIn() {
    // alert("ok");

    var email = document.getElementById("em2").value;
    var password = document.getElementById("pw2").value;
    var rememberme = document.getElementById("reme").checked;

    // alert(email);
    // alert(password);
    // alert(rememberme);

    var form = new FormData();
    form.append("em", email);
    form.append("pw", password);
    form.append("reme", rememberme);

    // alert("knjk0");


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);

            if (text == "please Enter your Email !!!") {
                document.getElementById("wor7").innerHTML = text;
            } else if (text == "Email must have less than 100 charatcers") {
                document.getElementById("wor7").innerHTML = text;
            } else if (text == "Invalide Email") {
                document.getElementById("wor7").innerHTML = text;
            } else {
                document.getElementById("wor7").innerHTML = "";
            }

            if (text == "please Insert your password !!") {
                document.getElementById("wor8").innerHTML = text;
            } else if (text == "password must be between 5-20 charcters") {
                document.getElementById("wor8").innerHTML = text;
            } else {
                document.getElementById("wor8").innerHTML = "";
            }

            if (text == "We have Detected Suspicious Behavior And Blocked You !! Please contact Us") {
                document.getElementById("wor10").innerHTML = text;
            } else {
                document.getElementById("wor10").innerHTML = "";
            }

            if (text == "Ivalide Email or Password") {
                document.getElementById("wor9").innerHTML = text;
            } else {
                document.getElementById("wor9").innerHTML = "";
            }

            if (text == "success") {

                // alert(text);
                window.location = "home.php";
            }
        }
    }

    req.open("POST", "signInProcess.php", true);
    req.send(form);


}


// forgot password process

function forgotpassword() {

    // alert("ok");

    var email = document.getElementById("em2").value;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);

            if (text == "Success") {
                alert("Verification code has sent to your email. Pleaase check your inbox");

                var modal = document.getElementById("forgotpasswordModel");
                dismod = new bootstrap.Modal(modal);
                dismod.show();

            } else {
                alert(text);


            }
        }
    }

    req.open("GET", "forgotpasswordProcess.php?em=" + email, true);
    req.send();


}

function newPasswordShow() {
    // alert("okkk");
    var input = document.getElementById("npwinp");
    var icon = document.getElementById("eye1");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }
}

function renamepasswordShow() {
    // alert("koo");

    var input = document.getElementById("repwinp");
    var icon = document.getElementById("eye2");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }
}

function forgotpasswordProcess() {
    // alert("ok");
    var email = document.getElementById("em2").value;
    var newpwinput = document.getElementById("npwinp").value;
    var repwinput = document.getElementById("repwinp").value;
    var verificatinCode = document.getElementById("vcode").value;


    var form = new FormData()
    form.append("em", email);
    form.append("npwinput", newpwinput);
    form.append("repwinput", repwinput);
    form.append("vcode", verificatinCode);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "success") {
                dismod.hide();
                alert("Password reset success");
            } else {
                alert(text);
            }
        }

    }




    req.open("POST", "resetPasswordProcess.php", true);
    req.send(form);


}


function signout() {
    // alert("ok");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "success") {
                window.location.reload();
            } else {
                alert(text);

            }
        }
    }

    req.open("GET", "signoutProcess.php", true);
    req.send();

}

function serchtogel() {
    // alert("okk");
    var tog1 = document.getElementById("togel1");
    var tog2 = document.getElementById("togel2");

    tog1.classList.toggle("d-none");
    tog2.classList.toggle("d-none");

}

function userlogout() {
    // alert("ok");
    var adminlogoutprocess = document.getElementById("exampleModalToggle");
    ac = new bootstrap.Modal(adminlogoutprocess);
    ac.show();
}



/////////////// user Profile///////////////


/////design ////

function profilChnge() {
    // alert("ok");
    var profi = document.getElementById("Profile");
    var editprofil = document.getElementById("editprofil");


    profi.classList.toggle("d-none");
    editprofil.classList.toggle("d-none");


}

function profilChnge2() {
    // alert("ok");
    var profi = document.getElementById("Profile");

    var changepassword = document.getElementById("chngepassword");

    profi.classList.toggle("d-none");
    changepassword.classList.toggle("d-none");

}

function profilChnge3() {
    // alert("ok");

    var editprofil = document.getElementById("editprofil");
    var changepassword = document.getElementById("chngepassword");

    editprofil.classList.toggle("d-none");
    changepassword.classList.toggle("d-none");

}





function profilPasswordShow() {

    // alert("ok")
    var input = document.getElementById("repwinp1");
    var icon = document.getElementById("eye3");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }
}

function profilPasswordShow1() {

    var input = document.getElementById("npwinp1");
    var icon = document.getElementById("eye4");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }

}

function profilPasswordShow2() {

    var input = document.getElementById("pwinp");
    var icon = document.getElementById("eye5");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }

}


function ChangePasswordPro() {

    var changepasswordD = document.getElementById("changepassworddiv");
    var changepasswordP = document.getElementById("chngepasswordP");
    var email = document.getElementById("em").value;
    var password = document.getElementById("pwinp").value;



    // alert(email);
    // alert(password);

    var form = new FormData();
    form.append("e", email);
    form.append("p", password);



    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);


            if (text == "Success") {
                alert("ok Change you password");

                document.getElementById("em").ariaReadOnly

                changepasswordD.classList.toggle("d-none");
                changepasswordP.classList.toggle("d-none");


            } else {
                alert(text);
            }
        }
    }

    req.open("POST", "changePasswordProcess.php", true);
    req.send(form);


}


function CngnewPasswordShow() {

    var input = document.getElementById("Cngnpwinp");
    var icon = document.getElementById("eye6");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }

}

function CngrenamepasswordShow() {

    var input = document.getElementById("Cngrepwinp");
    var icon = document.getElementById("eye7");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye-slash-fill";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-fill";
    }

}


function CngpasswordProcess() {

    var email = document.getElementById("em").value;
    var password = document.getElementById("pwinp").value;
    var newpwinput = document.getElementById("Cngnpwinp").value;
    var repwinput = document.getElementById("Cngrepwinp").value;
    // var verificatinCode = document.getElementById("Cngvcode").value;

    var changepasswordD = document.getElementById("changepassworddiv");
    var changepasswordP = document.getElementById("chngepasswordP");


    var form = new FormData()
    form.append("em", email);
    form.append("pw", password);
    form.append("npwinput", newpwinput);
    form.append("repwinput", repwinput);
    // form.append("vcode", verificatinCode);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "success") {

                changepasswordD.classList.toggle("d-none");
                changepasswordP.classList.toggle("d-none");


                alert("Password reset success");

                document.getElementById("em").value = "";
                document.getElementById("pwinp").value = "";
            } else {
                alert(text);
            }
        }

    }




    req.open("POST", "chagePasswordResetProcess.php", true);
    req.send(form);

}


//////Profile img//////


// imege viwe //

function ChangeImg() {
    // alert("ok");
    var imageviwe = document.getElementById("imgeView");
    var imagefile = document.getElementById("ProfiImg");


    imagefile.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        imageviwe.src = url;

    }

}


// update profile//

function load_distic() {
    // alert("ok");
    var province = document.getElementById("provinc").value;
    // alert(province);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;

            // alert(text);

            document.getElementById("distric").innerHTML = text;

        }
    }

    req.open("GET", "loadDistric.php?p=" + province, true);
    req.send();



}


function load_city() {
    // alert("oj");

    var distric = document.getElementById("distric").value;
    // alert(distric);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;

            // alert(text);

            document.getElementById("city").innerHTML = text;

        }
    }

    req.open("GET", "loadcity.php?d=" + distric, true);
    req.send();
}

function updateprofile() {
    // alert("okmk");
    var image = document.getElementById("ProfiImg");
    var fn = document.getElementById("fname").value;
    var ln = document.getElementById("lname").value;
    var mobi = document.getElementById("mobi").value;
    var lin1 = document.getElementById("lin1").value;
    var lin2 = document.getElementById("lin2").value;
    var prov = document.getElementById("provinc").value;
    var distri = document.getElementById("distric").value;
    var city = document.getElementById("city").value;
    var pcode = document.getElementById("pcod").value;
    var heigh = document.getElementById("heig").value;

    // alert(image.value);
    // alert(fn.value);
    // alert(ln.value);
    // alert(mobi.value);
    // alert(rdate.value);
    // alert(lin1.value);
    // alert(lin2.value);
    // alert(prov.value);
    // alert(distri.value);
    // alert(city.value);
    // alert(pcode.value);
    // alert(gen.value);
    // alert(heigh.value);

    var form = new FormData();
    form.append("f", fn);
    form.append("l", ln);
    form.append("m", mobi);
    form.append("ln1", lin1);
    form.append("ln2", lin2);
    form.append("p", prov);
    form.append("d", distri);
    form.append("c", city);
    form.append("pc", pcode);
    form.append("he", heigh);

    if (image.files.length == 0) {
        // alert("ok");
        var conformation = confirm("are you sure You don't want to update Profile Image?");
        if (conformation) {
            alert("you have not selected any image.")
        }
    } else {
        // alert("err");
        form.append("image", image.files[0]);
    }

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            alert(text);
            window.location = "userProfile.php";
        }
    }

    req.open("POST", "updateProfileProcess.php", true);
    req.send(form);
}

////////////////////// admin//////////////



function adminvericationcode() {

    var ade = document.getElementById("adminemaildiv");
    var adv = document.getElementById("adminveridiv");
    var input = document.getElementById("adinpu").value;

    // alert(input);

    var form = new FormData();
    form.append("in", input);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "Success") {
                // input.value = "";
                ade.classList.toggle("d-none");
                adv.classList.toggle("d-none");

            } else {
                alert(text);
                // adv.innerHTML = text;

            }
        }
    }

    req.open("POST", "adminverifationcode.php", true);
    req.send(form);



}

function adminlogin() {

    // alert("ok");
 
    var vericode = document.getElementById("adminverifi").value;
    var email = document.getElementById("admin").value;

    


    var form = new FormData();
    form.append("vcode", vericode);
    form.append("email", email);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "success") {
                // input.value = "";
                              window.location = "adminPanle.php"


            } else {
                alert(text);
            }
        }
    }

    req.open("POST", "adminLoginProcess.php", true);
    req.send(form);


    // ade.classList.toggle("d-none");
    // adv.classList.toggle("d-none");


}

function adminLogout() {
    // alert("ok");
    var logoutprocess = document.getElementById("adminsignout2");
    aq = new bootstrap.Modal(logoutprocess);
    aq.show();

}

function signoutAdmin() {
    // alert("ok");
    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);
            if (text == "success") {
                window.location = "adminsignIn.php";
            } else {
                alert(text);

            }
        }
    }

    req.open("GET", "adminSignoutProcess.php", true);
    req.send();
}


//////////////// add Product///////////



function addDressSize() {

    var ads = document.getElementById("addDressShowId");
    var dressizeId = document.getElementById("Dresssizediv");


    ads.classList.toggle("d-none");
    dressizeId.classList.toggle("d-block");



}

function addDressmaterial() {
    var ads = document.getElementById("addDressMaterialId");

    ads.classList.toggle("d-none");
}


function addmaterial(id) {
    // alert(id);
    var ads = document.getElementById("addDressMaterialId");


    document.getElementById("materiayname").value = id;

    ads.classList.toggle("d-none");

}


function addNewmaterial() {
    // alert(addNewmaterialiId);
    // alert("ok");



    var aNM = document.getElementById("addNewmaterialiId").value;



    var obj = {
        "addmater": aNM
    };

    // alert(obj);

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);

            var obj2 = JSON.parse(text);

            // alert(obj2.mn);

            document.getElementById("addNewmaterialiId").value = "";
            // window.location = "addProduct.php";
            $("#addmatrialdiv").load(" #addmatrialdiv");







            // if (text == "ok") {
            //     alert("Material add Sucess");
            //     document.getElementById("addNewmaterialiId").value = "";

            // }
        }
    }



    req.open("GET", "addNewMaterial.php?json=" + json, true);
    req.send();



}


function addImge() {
    // alert("ok");
    var imgeup = document.getElementById("porfileimge");

    imgeup.onchange = function() {

        var file_count = imgeup.files.length;

        // alert(file_count);

        if (file_count <= 3) {
            // alert("ok");
            for (var x = 0; x < file_count; x++) {


                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        } else {
            // alert("eroo");
            alert("Please select 3 or less than 3 images!")
        }

    }
}





function addDress() {




    var dc = document.getElementById("Dcode").value;
    var dcost = document.getElementById("Dcost").value;
    var qty = document.getElementById("qty").value;
    var dliveryc = document.getElementById("deliverycost").value;
    var dliveryc2 = document.getElementById("deliverycost2").value;
    var mn = document.getElementById("materiayname").value;
    var mosize = document.getElementById("modelsize").value;
    var imge = document.getElementById("porfileimge");


    obj = {

        "Dcode": dc,
        "Dcost": dcost,
        "qty": qty,
        "Dlivery": dliveryc,
        "Dlivery2": dliveryc2,
        "materiyalNAme": mn,
        "Modelize": mosize,


    };

    var convertJson = JSON.stringify(obj);


    var form = new FormData();
    form.append("json", convertJson);

    var file_count = imge.files.length;

    // alert(file_count);

    for (var x = 0; x < file_count; x++) {
        form.append("image" + x, imge.files[x]);
    }



    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText
            if (text == "Add Compleate") {
                var DSModel = document.getElementById("DressSizeSelect");
                dsm = new bootstrap.Modal(DSModel);
                dsm.show();
                // alert("ok");
            } else if (text == "Add CompleateAdd CompleateAdd Compleate") {
                var DSModel = document.getElementById("DressSizeSelect");
                dsm = new bootstrap.Modal(DSModel);
                dsm.show();

            } else if (text == "Add CompleateAdd Compleate") {
                var DSModel = document.getElementById("DressSizeSelect");
                dsm = new bootstrap.Modal(DSModel);
                dsm.show();

            } else {
                // alert(text);
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = text;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                // alert("ok");


            }
        }
    }


    req.open("POST", "AddDressprocess.php", true);
    req.send(form)




}





function selctDressSize(id) {
    // alert(id);
    // alert("ok");

    dressCode = document.getElementById("Dcode").value;
    dressizeId = document.getElementById("Dresssizediv");
    var ads = document.getElementById("addDressShowId");
    var allsize = document.getElementById("allsize").value;

    // alert(dressCode);
    var obj = {
        "id": id,
        "as": allsize,
        "dressId": dressCode,

    };




    var json = JSON.stringify(obj);

    // alert(json);


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;

            // alert(text);

            var repons = JSON.parse(text);
            // alert(repons.drssSize);

            if (repons.drssSize) {
                // alert(repons.drssSize);
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = repons.drssSize;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                // alert("ok");

            } else if (repons.drssAllSize) {
                // alert("All Size add Complete");
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = "All Size add Complete";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
            } else if (repons.SizeAlredy) {
                // alert("The size alredy added this Dress !!");
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = "The size alredy added this Dress !!";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
            } else if (repons.alredyadd) {
                // alert("alredy add Dress Size !! ");
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = "alredy add Dress Size !! ";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
            } else if (repons.alredyadd2) {
                // alert("alredy add Dress Size !! ");
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = "alredy add Dress Size !! ";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
            } else {
                // alert(text);
                (function() {

                    // data

                    var clear;
                    var msgDuration = 1000; // 2 seconds
                    var $msgDanger = text;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                // alert("ok");

            }
        }
    }

    req.open("GET", "AddDressprocess.php?json=" + json, true);
    req.send();
}


function addsizeDone() {
    // alert("Product Add Complete !!!");

    (function() {

        // data

        var clear;
        var msgDuration = 1000; // 2 seconds
        var $msgDanger = "Dreass Add Sucessfully";



        // cache DOM
        var $msg = $(".msg");

        // render message
        function render(message) {
            hide();

            switch (message) {
                case "danger":
                    $msg.addClass("msg-success active").text($msgDanger);
            }
        }

        function timer() {
            clearTimeout(clear);
            clear = setTimeout(function() {
                hide();
            }, msgDuration);
        }

        function hide() {
            $msg.removeClass("msg-success active");

        }

        render("danger");

        $msg.on("transitionend", timer);


    })();
    // window.location = "addProduct.php"
    dsm.hide();

    $("#AddDressDiv").load(" #AddDressDiv");



}







/////////////////// UPdate Product//////////////////////////

function chngestatusProUp(id) {


    obj = {
        "id": id,
    }


    objTojson = JSON.stringify(obj);

    // alert(objTojson);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;

            var repons = JSON.parse(text);

            if (repons.productId == id) {

                if (repons.deactive) {
                    // alert("Product Decative !!!");
                    $("#updateDressViewarea").load(" #updateDressViewarea");



                    // document.getElementById("text").innerHTML = 'JFHBUJ';
                    // document.getElementById("text").style.color = '#FA948D';


                } else if (repons.active) {
                    // alert("Product Active !!!");
                    $("#updateDressViewarea").load(" #updateDressViewarea");

                    // document.getElementById("text").innerHTML = 'fdhfgjfg';
                    // document.getElementById("text").style.color = 'black';


                }

            }



        }
    }



    req.open("GET", "chngestatusProUp.php?json=" + objTojson, true);
    req.send();




}

function removeDress(id) {
    // alert(id);

    var DressRemove = document.getElementById("Dressremove");
    // var DressCode = document.getElementById("dreesdc");


    Dremo = new bootstrap.Modal(DressRemove);
    Dremo.show();
    document.getElementById("dreesdc").innerHTML = id;
    document.getElementById("dreesdc").value = id;


}

function deleteDress() {
    // alert(id);

    var id = document.getElementById("dreesdc").value;
    // alert(id);

    obj = {

        "id": id,
    }

    objTojson = JSON.stringify(obj);
    // alert(objTojson);


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            if (text == "ok") {
                // alert("Product Removed Success !!");
                Dremo.hide();

                $("#updateDressViewarea").load(" #updateDressViewarea");



                // window.location = "updateProduct.php"
            }





        }
    }



    req.open("GET", "deleteDress.php?json=" + objTojson, true);
    req.send();





}


function ProductUpdateSearch(x) {

    // alert("ok");

    var dsi = document.getElementById("DressSerchInput").value;


    Obj = {

            "DressSerchIput": dsi,
            "page": x,

        }
        // alert(dsi)


    serchObjToJson = JSON.stringify(Obj);
    // alert(serchObjToJson);

    var form = new FormData();
    form.append("json", serchObjToJson);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;
            // alert(text);


            document.getElementById("updateDressViewarea").innerHTML = text;



        }
    }

    req.open("POST", "updateProductSerach.php", true);
    req.send(form);


}

// function updateProductfile(id) {
//     // alert(id);

//     obj = {
//         "id": id,
//     }

//     objTojson = JSON.stringify(obj);
//     // alert(objTojson);


//     var req = new XMLHttpRequest();

//     req.onreadystatechange = function() {
//         if (req.readyState == 4 && req.status == 200) {
//             var text = req.responseText;
//             // alert(text);

//             document.getElementById("updateProductMainView").innerHTML = text;


//         }
//     }

//     req.open("GET", "UpdateProductFile.php?json=" + objTojson, true)
//     req.send();



// }

function UpdateProduct(id) {
    // alert("hnbjb");

    var qty = document.getElementById("qty").value;
    var diliverycost1 = document.getElementById("deliverycost3").value;
    var diliverycost2 = document.getElementById("deliverycost4").value;
    var image = document.getElementById("porfileimge");

    // alert(image);
    // alert(diliverycost1);
    // alert(diliverycost2);

    var file_count = image.files.length;


    obj = {
        "qty": qty,
        "dc1": diliverycost1,
        "dc2": diliverycost2,
        "id": id


    }

    objTojson = JSON.stringify(obj);
    // alert(objTojson);


    var form = new FormData();
    form.append("json", objTojson)



    for (var x = 0; x < file_count; x++) {
        form.append("image" + x, image.files[x]);
    }

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;

            if (text == "Don't have anything you want to uplode ?Dress Uplode Success") {
                // alert("Dress Uplode Success!!");
                // window.location = "updateProduct.php";
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = "Dress Uplode Success";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                $("#updateDressDiv").load(" #updateDressDiv");

            } else if (text == "Don't have anything you want to uplode ?Dress Uplode SuccessDress Uplode Success") {
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = "Dress Uplode Success";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                $("#updateDressDiv").load(" #updateDressDiv");
            } else if (text == "Don't have anything you want to uplode ?Dress Uplode SuccessDress Uplode SuccessDress Uplode Success") {
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = "Dress Uplode Success";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                $("#updateDressDiv").load(" #updateDressDiv");
            } else if (text == "Dress Uplode Success") {
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = "Dress Uplode Success";



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                $("#updateDressDiv").load(" #updateDressDiv");
            } else {
                // alert(text);
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = text;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                // alert("ok");


            }
        }




        // document.getElementById("updateDressViewarea").innerHTML = text;



    }


    req.open("POST", "updateProductProcess.php", true);
    req.send(form);


}

function updateDressSize(id) {
    // alert(id);

    var dressid = document.getElementById("DerssCode").value;
    // var condiction = 0;

    // alert(document.getElementById("sw").checked);

    if (document.getElementById("sw").checked) {
        condiction = 1;
    } else if (!document.getElementById("sw").checked) {
        // alert("fuuu");
        condiction = 2;

    }

    // alert(condiction);

    obj = {
        "con": condiction,
        "Did": dressid,
        "sizeid": id,
    }

    var objTojson = JSON.stringify(obj);



    var form = new FormData();
    form.append("json", objTojson)

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;
            alert(text);

            $("#qydiv").load(" #qydiv");


            // document.getElementById("updateDressViewarea").innerHTML = text;



        }
    }

    req.open("POST", "updateDressSize.php", true);
    req.send(form);



}

function updateProductQtySize(id) {
    // alert(id);
    var therrxl = document.getElementById("3xl").value;

    var twoxl = document.getElementById("2xl").value;

    var xl = document.getElementById("xl").value;

    var l = document.getElementById("l").value;

    var M = document.getElementById("m").value;
    var s = document.getElementById("s").value;


    // alert(therrxl);


    obj = {
        "id": id,
        "therxl": therrxl,
        "twoxl": twoxl,
        "xl": xl,
        "l": l,
        "M": M,
        "s": s,
    }

    var objTojson = JSON.stringify(obj);



    var form = new FormData();
    form.append("json", objTojson)

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;
            // alert(text);
            if (text == "Update Qty sucess") {
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = text;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-success active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-success active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                $("#qydiv").load(" #qydiv");

            } else {
                (function() {

                    // data

                    var clear;
                    var msgDuration = 2000; // 2 seconds
                    var $msgDanger = text;



                    // cache DOM
                    var $msg = $(".msg");

                    // render message
                    function render(message) {
                        hide();

                        switch (message) {
                            case "danger":
                                $msg.addClass("msg-danger active").text($msgDanger);
                        }
                    }

                    function timer() {
                        clearTimeout(clear);
                        clear = setTimeout(function() {
                            hide();
                        }, msgDuration);
                    }

                    function hide() {
                        $msg.removeClass("msg-danger active");

                    }

                    render("danger");

                    $msg.on("transitionend", timer);


                })();
                // alert("ok");

            }





            // document.getElementById("updateDressViewarea").innerHTML = text;



        }
    }

    req.open("POST", "updateDressQtySize.php", true);
    req.send(form);


}





////////////adminprofile ////////////////////////////

function changeadminProfi() {
    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            var text = req.responseText;
            // alert(text);

            document.getElementById("adminProfileViewArea").innerHTML = text;


        }
    }

    req.open("GET", "ChngeadminProfile.php", true);
    req.send();
}




function Updateadminprofile() {

    var fname = document.getElementById("fn").value;
    var lname = document.getElementById("ln").value;
    var mobile = document.getElementById("mobile").value;
    var city = document.getElementById("city").value;
    var disric = document.getElementById("distric").value;
    var adress = document.getElementById("adress").value;
    var province = document.getElementById("provinc").value;
    var gender = document.getElementById("gender").value;
    var img = document.getElementById("ProfiImg");




    obj = {
        "fn": fname,
        "ln": lname,
        "mobi": mobile,
        "city": city,
        "dis": disric,
        "adre": adress,
        "pro": province,
        "gender": gender,
        // "imge": $img,
    }

    objTojson = JSON.stringify(obj);






    var from = new FormData();
    from.append("json", objTojson);
    from.append("image", img.files[0]);


    var req = new XMLHttpRequest();

    // rejex 

    req.open("POST", "ChngeadminProfileProcess.php", false);
    req.send(from);
    var text = req.responseText;
    alert(text);





}


///////// Manage user //////////


function blockuser(id) {
    // alert(id);
    // var relod=document.getElementById("manageuserReferch");

    obj = {
        "id": id,
    }

    objTojson = JSON.stringify(obj);

    from = new FormData();
    from.append("json", objTojson);


    var req = new XMLHttpRequest();
    req.open("POST", "blockuser.php", false);
    req.send(from);
    var text = req.responseText;
    // alert(text);
    $("#ManageuserViewarea").load(" #ManageuserViewarea");


    // window.location.reload();
    // $('#manageuserReferch').load(' #manageuserReferch');
    // if(text=="Block"){
    //     alert("")
    // }

}




function Unblockuser(id) {
    // alert(id);


    obj = {
        "id": id,
    }

    objTojson = JSON.stringify(obj);

    from = new FormData();
    from.append("json", objTojson);

    var req = new XMLHttpRequest();
    req.open("POST", "unblockuser.php", false);
    req.send(from);
    var text = req.responseText;
    // alert(text);
    $("#ManageuserViewarea").load(" #ManageuserViewarea");

    // window.location.reload();


}


function removeUser(id) {

    // alert(id);


    var userdiveId = document.getElementById("UserRemove");



    user = new bootstrap.Modal(userdiveId);
    user.show();
    // alert(id);



    var userdiveId = document.getElementById("userRemovelable").innerHTML = id;
    var userdiveId = document.getElementById("userRemovelable").value = id;


}


function deleteuser() {


    var Useremail = document.getElementById("userRemovelable").value;

    // alert(Useremail);


    obj = {
        "email": Useremail,
    }

    objTojson = JSON.stringify(obj);

    from = new FormData();
    from.append("json", objTojson);

    var req = new XMLHttpRequest();
    req.open("POST", "deleteuser.php", false);
    req.send(from);
    var text = req.responseText;
    // alert(text);
    if (text == "ok") {
        user.hide();

        $("#ManageuserViewarea").load(" #ManageuserViewarea");
    }


    // window.location.reload();
    // $("#ManageuserViewarea").load(" #ManageuserViewarea");


}



function ManageuserSearch(x) {

    // alert("ok");

    var muser = document.getElementById("manageUserSerchInput").value;

    // alert(muser);

    Obj = {

            "userSerchIput": muser,
            "page": x,

        }
        // alert(dsi)


    serchObjToJson = JSON.stringify(Obj);
    // alert(serchObjToJson);

    var form = new FormData();
    form.append("json", serchObjToJson);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;
            // alert(text);


            document.getElementById("ManageuserViewarea").innerHTML = text;



        }
    }

    req.open("POST", "manageUserSerach.php", true);
    req.send(form);


}

function manageuserPrfile(id) {



    obj = {
        "email": id,
    }

    objTojson = JSON.stringify(obj);

    from = new FormData();
    from.append("json", objTojson);

    var req = new XMLHttpRequest();
    req.open("POST", "manageuserPrfile.php", false);
    req.send(from);
    var text = req.responseText;
    // alert(text);
    document.getElementById("ManageUserMainView").innerHTML = text;

}


///////// Manage user //////////

///////////////// Wichlist /////////

function wichlist() {
    alert("khbj");
}

function jbdhu() {
    alert("khj");
}






////////////// Home ////////////

function dresSizemsg() {

    // alert('jgb');



    var req = new XMLHttpRequest();
    req.open("GET", "homedresSizemsg.php", false);
    req.send();
    var text = req.responseText;
    // alert(text);
    document.getElementById("dressSize").innerHTML = text
        //  document.getElementById("dressSize").innerHTML="";


}

/////////// Wich List /////////////////


function addWichlist(id) {
    // alert(id);
    // $splitDate = explode(" ", id);



    obj = {
        "id": id,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.open("GET", "addWichlist.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    var jsonto = JSON.parse(text);
    if (jsonto.text) {
        // alert(jsonto.text);
        document.getElementById("wichlistaddDiv").style.color = "red"

        $("#alldreddupdateDiv").load(" #alldreddupdateDiv");



    } else if (jsonto.text1) {
        // alert(jsonto.text1);
        window.location = "wichlist.php";
    }







}


function serachwichlist() {
    var wichlistkeyword = document.getElementById("wichlistSerchInput").value;

    obj = {

        "keyword": wichlistkeyword,
    }


    var json = JSON.stringify(obj);
    // alert(json);


    var req = new XMLHttpRequest();
    req.open("GET", "Searchwichlist.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    alert(text);

    document.getElementById("wichlistviweArea").innerHTML = text;
    if (document.getElementById("wichlistSerchInput").value = "") {
        window.location.reload();

    }

}

function removeWichlist(id) {
    // alert(id);



    obj = {
        "id": id,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.open("GET", "removewichlist.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    // $("#refreshwichlist").load(" #refreshwichlist");
    // var jsonto = JSON.parse(text);
    // if (jsonto.text) {
    //     alert(jsonto.text);
    // }

    // alert(text);

    window.location.reload();


    // $("#wichlist").load(" #wichlist");


}

function selectSize(id) {
    // alert(id);

    document.getElementById("walk").value = id;


    // alert(idhjiokj);


}




function addcartFromWichlist(id) {
    // alert(id);
    var selectSize = document.getElementById("walk").value;

    // alert(selectSize);
    if (selectSize == "on") {

        alert("Please select some product Size before adding this product to your cart.");
    } else {


        obj = {
            "id": id,
            "sSize": selectSize,
        }

        var json = JSON.stringify(obj);


        var req = new XMLHttpRequest();
        req.open("GET", "addCartfromwichlist.php?json=" + json, false);
        req.send();
        var text = req.responseText;
        // alert(text);
        var jsonto = JSON.parse(text);
        if (jsonto.text) {
            // alert(jsonto.text);

            $("#cartdiv").load(" #cartdiv");
            window.location.reload();;


        }
    }

}


//////////////// Add Cart////////// 


function udsgyh() {

    var qty_count = document.getElementById("my-input").value;
    // var qty_count = qty_count * 1;
    alert(qty_count);

}

function CheckValue(id) {
    // alert(id);
    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quntity must be 1 or more");
        input.value = 1;
    } else if (input.value > id) {
        alert("Maximun quaabtity achieved");
        input.value = id;

    }
}


function qty_inc(id, d_id) {
    var input = document.getElementById("qty_input" + d_id);
    var email = document.getElementById("usr_email" + d_id).value;

    // alert(email);
    if (input.value < id) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();

        obj = {
            "id": d_id,
            "qty": newValue,
            "email": email,
        }

        json = JSON.stringify(obj);
        // alert(objTojson);


        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                var text = req.responseText;
                // alert(text);

                // document.getElementById("updateProductMainView").innerHTML = text;
                // window.location = "cart.php";
                $("#cartviwearea").load(" #cartviwearea");
                $("#cartdeliverydiv").load(" #cartdeliverydiv");




            }
        }

        req.open("GET", "ChngeQty.php?json=" + json, true)
        req.send();


    } else {
        alert("Maximum quantity has achieved");
        input.value = id;
    }
}

function qty_dec(id) {
    var input = document.getElementById("qty_input" + id);
    var email = document.getElementById("usr_email" + id).value;

    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();

        obj = {
            "id": id,
            "qty": newValue,
            "email": email,
        }

        json = JSON.stringify(obj);
        // alert(objTojson);


        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                var text = req.responseText;
                // alert(text);

                // document.getElementById("updateProductMainView").innerHTML = text;
                // window.location = "cart.php";
                $("#cartviwearea").load(" #cartviwearea");
                $("#cartdeliverydiv").load(" #cartdeliverydiv");




            }
        }

        req.open("GET", "ChngeQty.php?json=" + json, true)
        req.send();
    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }
}

function cart() {
    var input = document.getElementById("qty_input").value;

    alert(input);

}

// function addcart(id) {
//     // alert("jgh");

//     // alert(id);

//     obj = {
//         "id": id,
//     }

//     var json = JSON.stringify(obj);


//     var req = new XMLHttpRequest();
//     req.open("GET", "addCart.php?json=" + json, false);
//     req.send();
//     var text = req.responseText;
//     // alert(text);
//     var jsonto = JSON.parse(text);
//     if (jsonto.text) {
//         alert(jsonto.text);
//         $("#cartdiv").load(" #cartdiv");
//     } else if (jsonto.text1) {
//         // alert(jsonto.text1);
//         window.location = "cart.php";
//     }

// }


/////////////////////// cart/////////////////////






// var qty_count;


// function chnageCartQty(id) {
//     // alert(id);



//     var qty_count = document.getElementById("qty").value;
//     // alert(qty_count);


//     var qty_count = qty_count * 1;

//     alert(qty_count);

// obj = {
//     "qty": qty_count,
//     "id": id,


// }

// var json = JSON.stringify(obj);


// var req = new XMLHttpRequest();
// req.open("GET", "ChngeQty.php?json=" + json, false);
// req.send();
// var text = req.responseText;



// alert(text);


// }


function addDiliveryadress() {

    var deleveryadress_data = document.getElementById("deleveryadress");



    delevery = new bootstrap.Modal(deleveryadress_data);
    delevery.show();
}

function selectdistric(id) {
    // alert(id);

    document.getElementById("districinput").value = id;
}

function addDistric() {
    var distric = document.getElementById("districinput").value;
    // alert(distric);



    obj = {
        "ds": distric,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.open("GET", "selectDistricSearch.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    // alert(text);

    document.getElementById("addDictict").innerHTML = text;
}

function addAdress() {
    // alert("jgh");
    var dsric = document.getElementById("districinput").value;
    var pcode = document.getElementById("pcode").value;

    // alert(dsric);
    // alert(pcode);




    obj = {
        "dsric": dsric,
        "pcode": pcode,

    }

    objTojson = JSON.stringify(obj);

    from = new FormData();
    from.append("json", objTojson);

    var req = new XMLHttpRequest();
    req.open("POST", "AddDistricCart.php", false);
    req.send(from);
    var text = req.responseText;
    // alert(text);

    if (text == "Ok") {
        delevery.hide();
        $("#cartdeliverydiv").load(" #cartdeliverydiv");

    }


}

function removeCart(id) {

    // alert(id);

    // var cart = document.getElementById(id).value;

    // alert(cart);

    obj = {

        "id": id,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.open("GET", "removeCart.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    // alert(text);

    if (text == "ok") {
        // $("#cartdeleterelodediv").load(" #cartdeleterelodediv");
        window.location = "cart.php";

    }


}

function carttogel() {
    // alert("jgj");
    var carttogal1 = document.getElementById("carttogal1");
    var carttogal2 = document.getElementById("carttogal2");

    carttogal1.classList.toggle("d-none");
    carttogal2.classList.toggle("d-none");
}

function searchCart() {

    var input = document.getElementById("CartSerchInput").value;

    // alert(input);

    obj = {

        "keyword": input,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.open("GET", "searchCartItem.php?json=" + json, false);
    req.send();
    var text = req.responseText;
    // alert(text);
    var input = document.getElementById("cartviwearea").innerHTML = text;



}

///////////////// all dress ////////////////



function allProductTogel() {
    // alert("jdsghy");
    var allproductdiv1 = document.getElementById("allproductdiv1");
    var allproductdiv2 = document.getElementById("allproductdiv2");

    allproductdiv1.classList.toggle("d-none");
    allproductdiv2.classList.toggle("d-none");
    var input = document.getElementById("allProductSearchInput").value;
    document.getElementById("allProductSearchInput2").value = input;

}

function searchDressFormAllPeoduct() {

    var input = document.getElementById("allProductSearchInput").value;

    if (input == "NVS ") {
        $("#alldreddupdateDiv2").load(" #alldreddupdateDiv2");
        // alert("jghj");

    } else {
        obj = {

            "keyword": input,
        }

        var json = JSON.stringify(obj);


        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 & req.status == 200) {
                var text = req.responseText;
                // alert(text);

                document.getElementById("alldreddupdateDiv2").innerHTML = text;

            }
        }
        req.open("GET", "searchDressAll.php?json=" + json, true);
        req.send();

    }

}

function searchDressFormAllPeoduct2() {


    var input2 = document.getElementById("allProductSearchInput2").value;
    // alert(input2);
    // allProductDiv
    if (input2 == "NVS ") {
        $("#alldreddupdateDiv2").load(" #alldreddupdateDiv2");
        // alert("jghj");

    } else {

        obj = {

            "keyword": input2,
        }

        var json = JSON.stringify(obj);


        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 & req.status == 200) {
                var text = req.responseText;
                // alert(text);

                document.getElementById("alldreddupdateDiv2").innerHTML = text;

            }
        }


        req.open("GET", "searchDressAll.php?json=" + json, true);
        req.send();



    }

}

function Sizeqtyallproduct(id) {

    // alert(id);


    // alert(id);


    obj = {

        "id": id,
    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text)
            document.getElementById("alldreddupdateDiv2").innerHTML = text;

        }
    }
    req.open("GET", "searchDressAllMain.php?json=" + json, true);
    req.send();




    document.getElementById("claritem2").style.opacity = "1";

    document.getElementById("claritem2").style.transitionDuration = "0.7s";


}






function DressShort() {
    // alert("khi");

    var dressshort = document.getElementById("dressShort").value;

    // alert(dressshort);

    if (dressshort == "s0") {
        $("#alldreddupdateDiv2").load(" #alldreddupdateDiv2");

    } else {
        obj = {

            "id": dressshort,
        }

        var json = JSON.stringify(obj);


        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 & req.status == 200) {
                var text = req.responseText;
                // alert(text);
                document.getElementById("alldreddupdateDiv2").innerHTML = text;

            }
        }
        req.open("GET", "searchDressAllMainSort.php?json=" + json, true);
        req.send();



    }


}



function filterPrice() {
    var maxprice = document.getElementById("maxprice").value;
    var minprice = document.getElementById("minprice").value;






    obj = {

        "maxpric": maxprice,
        "minpric": minprice,

    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;

            // alert(text);

            document.getElementById("alldreddupdateDiv2").innerHTML = text;


            document.getElementById("claritem2").style.opacity = "1";

            document.getElementById("claritem2").style.transitionDuration = "0.7s";

        }
    }
    req.open("GET", "searchDressAllPrice.php?json=" + json, true);
    req.send();
    // alert(text)

}


function creardivitemallProduct() {
    // alert("hjik");

    $("#alldree").load(" #alldree");
    $("#alldreddupdateDiv2").load(" #alldreddupdateDiv2");
    $("#pricerangediv").load(" #pricerangediv");



}



///////////////// all dress! ////////////////


//////////////// singale Productct ////////////


function zoomDress1() {
    // alert("jhg");

    var zoomeDress_data = document.getElementById("zoomDress");



    zoom = new bootstrap.Modal(zoomeDress_data);
    zoom.show();
}

function silectsizesingleproduct(id) {
    // alert(id);
    var inputqty = document.getElementById("qty_input").value;

    document.getElementById("walk2").value = id;
    document.getElementById("buyqty").value = inputqty;
    document.getElementById("size").value = id;
    document.getElementById("binsingl1").style.display = "none";
    document.getElementById("binsingl2").style.display = "block";
    $("#qtydiv").load(" #qtydiv");





}



function ThreeXlqty(id) {

    // alert(id);

    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";


    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;



}

function TwoXlqty(id) {

    // alert(id);

    // var item = document.getElementById("item1");
    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";




    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;



}



function Xlqty(id) {

    // alert(id);

    // var item = document.getElementById("item1");
    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";





    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;





}



function lqty(id) {

    // alert(id);

    // var item = document.getElementById("item1");
    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";





    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;





}

function Mqty(id) {

    // alert(id);

    // var item = document.getElementById("item1");
    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";





    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;





}

function Sqty(id) {

    // alert(id);

    // var item = document.getElementById("item1");
    document.getElementById("claritem").style.opacity = "1";
    document.getElementById("item1").style.opacity = "1";
    document.getElementById("claritem").style.transitionDuration = "0.7s";
    document.getElementById("item1").style.transitionDuration = "0.7s";





    // // sigUpBOX.classList.toggle("d-none");
    // item.classList.toggle("d-none");

    document.getElementById("Item").innerHTML = id;
    document.getElementById("Item").value = id;





}

function creardivitem() {

    $("#sizediv2").load(" #sizediv2");
}





function CheckValue2() {
    // alert(id);
    var input = document.getElementById("qty_input");
    var id2 = document.getElementById("Item");
    var newid = parseInt(id2.value);



    if (input.value <= 0) {
        alert("Quntity must be 1 or more");
        input.value = 1;
    } else if (input.value > newid) {
        alert("Maximun quaabtity achieved");
        input.value = newid;

    }
}


function qty_inc2() {
    // alert(id);
    var id2 = document.getElementById("Item");
    // alert(id.value);
    var newid = parseInt(id2.value);
    var input = document.getElementById("qty_input");
    if (input.value < newid) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
        document.getElementById("buyqty").value = input.value

        // alert(input.value)
    } else {
        // alert(input.value);
        // alert(id2.value);




        alert("Maximum quantity has achieved");

        // input.value = newid;

        // }
    }
}

function qty_dec2() {
    var input = document.getElementById("qty_input");
    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
        document.getElementById("buyqty").value = input.value;

    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }
}



function AddCartfromsingalproduct(id) {
    // alert('djbj')
    var singaleproductselct = document.getElementById("walk2").value;
    var dressqty = document.getElementById("qty_input").value;



    if (singaleproductselct == "on") {

        alert("Please select some product Size before adding this product to your cart.");


    } else {


        obj = {
            "id": id,
            "sleSize": singaleproductselct,
            "qty": dressqty,
        }

        var json = JSON.stringify(obj);


        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 & req.status == 200) {
                var text = req.responseText;
                // alert(text);
                $("#cartdiv").load(" #cartdiv");
                $("#sizediv2").load(" #sizediv2");

            }
        }
        req.open("GET", "addCartfromsigleProduct.php?json=" + json, true);
        req.send();



    }
}





// bill dcoumentnt


function billdivtogel() {


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            document.getElementById("crditeDiv").innerHTML = text

        }
    }
    req.open("GET", "Criditecartbuy.php", true);
    req.send();



}

function billdivtogel2() {
    $("#crditeDiv").load(" #crditeDiv");


}

function buyproductNotqty() {
    alert("Please select some product Size before Buy this Dress .");


}

function selectdistricformbuy() {
    document.getElementById("districlode").style.display = 'block';
    document.getElementById("districlodeicon").style.display = 'block';
    var distric = document.getElementById("distric_u").value;
    // alert(distric);


    obj = {
        "dis": distric,

    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            document.getElementById("districlode").innerHTML = text;


        }
    }
    req.open("GET", "lodDistricBuy.php?json=" + json, true);
    req.send();


}

function distirclodedismis() {
    document.getElementById("districlode").style.display = 'none';
    document.getElementById("districlodeicon").style.display = 'none';


}

function selectdistricbuy(id) {
    // alert("ok");
    document.getElementById("distric_u").innerHTML = id;
    document.getElementById("distric_u").value = id;

    var drprice = document.getElementById("dressPrice").innerHTML;
    // var shipinprice = document.getElementById("shipingprice").innerHTML;



    // document.getElementById("allPricedress").innerHTML = allPrice;

    obj = {
        "distric": id,

    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            document.getElementById("shipingprice").innerHTML = text;

            var dprice = parseInt(drprice)
            var shipnp = parseInt(document.getElementById("shipingprice").innerHTML)

            var allPrice = dprice + shipnp

            // alert(allPrice);



            document.getElementById("allPricedress").innerHTML = allPrice.toString();
            document.getElementById("shipingprice_input").value = shipnp;
            document.getElementById("allPricedress_input").value = allPrice;




        }
    }
    req.open("GET", "lodDistricAddShippingCost.php?json=" + json, true);
    req.send();


}

function shipngTodifrentAdresskey() {
    // document.getElementById("districlode2").style.display = 'block';
    // document.getElementById("districlodeicon").style.display = 'block';
    var distric = document.getElementById("distric2").value;


    obj = {
        "dis": distric,

    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            document.getElementById("districlode2").innerHTML = text;


        }
    }
    req.open("GET", "lodDistricBuy2.php?json=" + json, true);
    req.send();
}

function selectdistricbuy2(id) {
    document.getElementById("distric2").innerHTML = id;
    document.getElementById("distric2").value = id;
    var drprice = document.getElementById("dressPrice").innerHTML;


    obj = {
        "distric": id,

    }

    var json = JSON.stringify(obj);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 & req.status == 200) {
            var text = req.responseText;
            // alert(text);
            document.getElementById("shipingprice").innerHTML = text;

            var dprice = parseInt(drprice)
            var shipnp = parseInt(document.getElementById("shipingprice").innerHTML)

            var allPrice = dprice + shipnp

            // alert(allPrice);



            document.getElementById("allPricedress").innerHTML = allPrice.toString();
            document.getElementById("shipingprice_input").value = shipnp;
            document.getElementById("allPricedress_input").value = allPrice;



        }
    }
    req.open("GET", "lodDistricAddShippingCost.php?json=" + json, true);
    req.send();








}

function shipngTodifrentAdress() {
    document.getElementById("diferentadress").style.display = 'block';
    document.getElementById("diferentadresscandelbut").style.display = 'block';
    document.getElementById("diferentadresViewlbut").style.display = 'none';
}

function shipngTodifrentAdresscancel() {
    document.getElementById("diferentadress").style.display = 'none';
    document.getElementById("diferentadresscandelbut").style.display = 'none';
    document.getElementById("diferentadresViewlbut").style.display = 'block';
}




function place_order_cashOn_delivery() {

    if (document.getElementById('user_verify') != null) {


        if (document.getElementById('cart_user') != null) {
            var conform_another_address = document.getElementById('conform_another_address').checked;
            if (conform_another_address == false) {
                // alert("err");
                var name_u_c = document.getElementById('f_name').value;
                var mobile_u_c = document.getElementById('mobile_user').value;
                var street_address_u_c = document.getElementById('address_u').value;
                var city_u_c = document.getElementById('city_u').value;
                var PostCode_u_c = document.getElementById('post_u').value;
                var district_u_c = document.getElementById('distric_u').value;





                var cart_user_email_u_c = document.getElementById('cart_user').value;

                var subtotal_u_c = document.getElementById('subtotal_cart').value;
                var total_cost_u_c = document.getElementById("total_cart").value;
                var deliverycost_u_c = document.getElementById('delivery_cart').value;







                Obj = {

                        "distric": district_u_c,
                        "PostCode": PostCode_u_c,
                        "street_address": street_address_u_c,
                        "subtotal_cost": subtotal_u_c,
                        "deliverycost": deliverycost_u_c,
                        "total_cost": total_cost_u_c,
                        "status": "register_cart",
                        "mobile": mobile_u_c,
                        "name": name_u_c,
                        "email": cart_user_email_u_c,

                    }
                    // alert(dsi)





            } else if (conform_another_address == true) {

                var name_u_c = document.getElementById('f_name').value;
                var mobile_u_c = document.getElementById('mobile_user').value;
                var street_address_u_c = document.getElementById('adress_d').value;

                var city_u = document.getElementById('city_u').value;

                var PostCode_u_c = document.getElementById('post_cart').value;
                // alert("ok");

                var district_u_c = document.getElementById('city_cart').value;



                var cart_user_email_u_c = document.getElementById('cart_user').value;

                var subtotal_u_c = document.getElementById('subtotal_cart').value;
                var total_cost_u_c = document.getElementById("total_cart").value;
                var deliverycost_u_c = document.getElementById('delivery_cart').value;







                Obj = {

                        "distric": district_u_c,
                        "PostCode": PostCode_u_c,
                        "street_address": street_address_u_c,
                        "subtotal_cost": subtotal_u_c,
                        "deliverycost": deliverycost_u_c,
                        "total_cost": total_cost_u_c,
                        "status": "register_cart",
                        "mobile": mobile_u_c,
                        "name": name_u_c,
                        "email": cart_user_email_u_c,

                    }
                    // alert(dsi)




            }


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("user_single_product_buy_cart", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);
                    // validate inputs 

                    if (json_to_js.mobile_error_u) {
                        document.getElementById("mobile_error_u").innerHTML = json_to_js.mobile_error_u;
                    } else {
                        document.getElementById("mobile_error_u").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error_u").innerHTML = json_to_js.name_error_u;
                    } else {
                        document.getElementById("name_error_u").innerHTML = '';
                    }

                    if (conform_another_address == true) {

                        // alert("ok");


                        if (json_to_js.Street_error_u) {
                            // alert("ok");
                            document.getElementById("Street_error_d_c").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_d_c").innerHTML = '';
                        }

                    } else {
                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_u").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_u").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_u").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_u").innerHTML = '';
                        }



                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_u").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_u").innerHTML = '';
                        }

                    }



                    // document.getElementById("ManageuserViewarea").innerHTML = text;

                    if (json_to_js.successe) {
                        // alert(json_to_js.success)

                        document.getElementById("download_div").innerHTML = json_to_js.inner;
                        var invoice_model = document.getElementById("invoice_model");
                        aq = new bootstrap.Modal(invoice_model);
                        aq.show();

                    }


                }
            }

            req.open("POST", "checkout_process.php", true);
            req.send(form);
        } else {
            var conform_another_address = document.getElementById('conform_another_address').checked;
            if (conform_another_address == false) {
                // alert("err");
                var name_u = document.getElementById('f_name').value;
                var mobile_u = document.getElementById('mobile_user').value;
                var street_address_u = document.getElementById('address_u').value;
                var city_u = document.getElementById('city_u').value;
                var PostCode_u = document.getElementById('post_u').value;
                var district_u = document.getElementById('distric_u').value;





                var dress_id_u = document.getElementById('dress_id').value;
                var qty_u = document.getElementById('qty').value;
                var dress_size_id_u = document.getElementById('dress_size_id').value;
                var subtotal_u = document.getElementById('dressPrice').innerHTML;
                var total_cost_u = document.getElementById("allPricedress_input").value;
                var deliverycost_u = document.getElementById('shipingprice_input').value;






                var subtotal_cost_u = parseInt(subtotal_u)

                Obj = {

                        "distric": district_u,
                        "PostCode": PostCode_u,
                        "street_address": street_address_u,
                        "qty": qty_u,
                        "dress_id": dress_id_u,
                        "dress_size_id": dress_size_id_u,
                        "subtotal_cost": subtotal_cost_u,
                        "deliverycost": deliverycost_u,
                        "total_cost": total_cost_u,
                        "status": "register",
                        "mobile": mobile_u,
                        "name": name_u,

                    }
                    // alert(dsi)





            } else if (conform_another_address == true) {
                // alert("ok");

                var name_u = document.getElementById('f_name').value;
                var mobile_u = document.getElementById('mobile_user').value;
                var street_address_u = document.getElementById('adress_d').value;
                var city_u = document.getElementById('city_u').value;
                var PostCode_u = document.getElementById('post_u_d').value;
                var district_u = document.getElementById('distric2').value;


                var dress_id_u = document.getElementById('dress_id').value;
                var qty_u = document.getElementById('qty').value;
                var dress_size_id_u = document.getElementById('dress_size_id').value;
                var subtotal_u = document.getElementById('dressPrice').innerHTML;
                var total_cost_u = document.getElementById("allPricedress_input").value;
                var deliverycost_u = document.getElementById('shipingprice_input').value;






                var subtotal_cost_u = parseInt(subtotal_u)

                Obj = {

                        "distric": district_u,
                        "PostCode": PostCode_u,
                        "street_address": street_address_u,
                        "qty": qty_u,
                        "dress_id": dress_id_u,
                        "dress_size_id": dress_size_id_u,
                        "subtotal_cost": subtotal_cost_u,
                        "deliverycost": deliverycost_u,
                        "total_cost": total_cost_u,
                        "status": "register",
                        "mobile": mobile_u,
                        "name": name_u,

                    }
                    // alert(dsi)




            }


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("user_single_product_buy", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);
                    // validate inputs 

                    if (json_to_js.mobile_error_u) {
                        document.getElementById("mobile_error_u").innerHTML = json_to_js.mobile_error_u;
                    } else {
                        document.getElementById("mobile_error_u").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error_u").innerHTML = json_to_js.name_error_u;
                    } else {
                        document.getElementById("name_error_u").innerHTML = '';
                    }

                    if (conform_another_address == true) {

                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_d").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_d").innerHTML = '';
                        }

                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_d").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_d").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_d").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_d").innerHTML = '';
                        }

                    } else {
                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_u").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_u").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_u").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_u").innerHTML = '';
                        }



                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_u").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_u").innerHTML = '';
                        }

                    }



                    // document.getElementById("ManageuserViewarea").innerHTML = text;

                    if (json_to_js.successe) {
                        // alert(json_to_js.success)

                        document.getElementById("download_div").innerHTML = json_to_js.inner;
                        var invoice_model = document.getElementById("invoice_model");
                        aq = new bootstrap.Modal(invoice_model);
                        aq.show();

                    }


                }
            }

            req.open("POST", "checkout_process.php", true);
            req.send(form);
        }







    } else {
        var distric = document.getElementById('distric2').value;
        var PostCode = document.getElementById('PostCode').value;
        var street_address = document.getElementById('street_address').value;
        var dress_id = document.getElementById('dress_id').value;
        var qty = document.getElementById('qty').value;

        var dress_size_id = document.getElementById('dress_size_id').value;
        var subtotal = document.getElementById('dressPrice').innerHTML;
        // var delivery = document.getElementById('shipingprice').innerHTML;
        var deliverycost = document.getElementById('shipingprice_input').value;
        // var total = document.getElementById('allPricedress').innerHTML;
        var total_cost = document.getElementById("allPricedress_input").value
        var mobile = document.getElementById("mobile").value
        var name = document.getElementById("name").value




        if (deliverycost == "") {
            alert("First select District");
        } else {

            var subtotal_cost = parseInt(subtotal)

            Obj = {

                    "distric": distric,
                    "PostCode": PostCode,
                    "street_address": street_address,
                    "qty": qty,
                    "dress_id": dress_id,
                    "dress_size_id": dress_size_id,
                    "subtotal_cost": subtotal_cost,
                    "deliverycost": deliverycost,
                    "total_cost": total_cost,
                    "status": "no_register",
                    "mobile": mobile,
                    "name": name,




                }
                // alert(dsi)


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("not_user_single_product_buy", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);
                    // validate inputs 
                    if (json_to_js.post_error) {
                        document.getElementById("post_error").innerHTML = json_to_js.post_error;
                    } else {
                        document.getElementById("post_error").innerHTML = '';
                    }

                    if (json_to_js.Street_error) {
                        document.getElementById("Street_error").innerHTML = json_to_js.Street_error;
                    } else {
                        document.getElementById("Street_error").innerHTML = '';
                    }

                    if (json_to_js.mobile_error) {
                        document.getElementById("mobile_error").innerHTML = json_to_js.mobile_error;
                    } else {
                        document.getElementById("mobile_error").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error").innerHTML = json_to_js.name_error;
                    } else {
                        document.getElementById("name_error").innerHTML = '';
                    }

                    // document.getElementById("ManageuserViewarea").innerHTML = text;

                    if (json_to_js.success) {
                        // alert(json_to_js.success)

                        document.getElementById("download_div").innerHTML = json_to_js.inner;
                        var invoice_model = document.getElementById("invoice_model");
                        aq = new bootstrap.Modal(invoice_model);
                        aq.show();

                    }


                }
            }

            req.open("POST", "checkout_process.php", true);
            req.send(form);

        }
    }


}

function place_order_online() {
    // alert("online");

    if (document.getElementById('user_verify') != null) {

        if (document.getElementById('cart_user') != null) {
            var conform_another_address = document.getElementById('conform_another_address').checked;
            if (conform_another_address == false) {
                // alert("err");
                var name_u_c = document.getElementById('f_name').value;
                var mobile_u_c = document.getElementById('mobile_user').value;
                var street_address_u_c = document.getElementById('address_u').value;
                var city_u_c = document.getElementById('city_u').value;
                var PostCode_u_c = document.getElementById('post_u').value;
                var district_u_c = document.getElementById('distric_u').value;





                var cart_user_email_u_c = document.getElementById('cart_user').value;

                var subtotal_u_c = document.getElementById('subtotal_cart').value;
                var total_cost_u_c = document.getElementById("total_cart").value;
                var deliverycost_u_c = document.getElementById('delivery_cart').value;







                Obj = {

                        "distric": district_u_c,
                        "PostCode": PostCode_u_c,
                        "street_address": street_address_u_c,
                        "subtotal_cost": subtotal_u_c,
                        "deliverycost": deliverycost_u_c,
                        "total_cost": total_cost_u_c,
                        "status": "register_cart_online",
                        "mobile": mobile_u_c,
                        "name": name_u_c,
                        "email": cart_user_email_u_c,

                    }
                    // alert(dsi)





            } else if (conform_another_address == true) {

                var name_u_c = document.getElementById('f_name').value;
                var mobile_u_c = document.getElementById('mobile_user').value;
                var street_address_u_c = document.getElementById('adress_d').value;

                var city_u = document.getElementById('city_u').value;

                var PostCode_u_c = document.getElementById('post_cart').value;
                // alert("ok");

                var district_u_c = document.getElementById('city_cart').value;



                var cart_user_email_u_c = document.getElementById('cart_user').value;

                var subtotal_u_c = document.getElementById('subtotal_cart').value;
                var total_cost_u_c = document.getElementById("total_cart").value;
                var deliverycost_u_c = document.getElementById('delivery_cart').value;







                Obj = {

                        "distric": district_u_c,
                        "PostCode": PostCode_u_c,
                        "street_address": street_address_u_c,
                        "subtotal_cost": subtotal_u_c,
                        "deliverycost": deliverycost_u_c,
                        "total_cost": total_cost_u_c,
                        "status": "register_cart_online",
                        "mobile": mobile_u_c,
                        "name": name_u_c,
                        "email": cart_user_email_u_c,

                    }
                    // alert(dsi)




            }


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("user_single_product_buy_cart", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);
                    // validate inputs 

                    if (json_to_js.mobile_error_u) {
                        document.getElementById("mobile_error_u").innerHTML = json_to_js.mobile_error_u;
                    } else {
                        document.getElementById("mobile_error_u").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error_u").innerHTML = json_to_js.name_error_u;
                    } else {
                        document.getElementById("name_error_u").innerHTML = '';
                    }

                    if (conform_another_address == true) {

                        // alert("ok");


                        if (json_to_js.Street_error_u) {
                            // alert("ok");
                            document.getElementById("Street_error_d_c").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_d_c").innerHTML = '';
                        }

                    } else {
                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_u").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_u").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_u").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_u").innerHTML = '';
                        }



                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_u").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_u").innerHTML = '';
                        }

                    }



                    // document.getElementById("ManageuserViewarea").innerHTML = text;


                    if (json_to_js.successe) {
                        // Payment completed. It can be a successful failure.
                        payhere.onCompleted = function onCompleted(orderId) {
                            console.log("Payment completed. OrderID:" + orderId);
                            // Note: validate the payment and show success or failure page to the customer
                            // saveInvoice(orderId, id, mail, amount, qty);
                            document.getElementById("download_div").innerHTML = json_to_js.inner;
                            var invoice_model = document.getElementById("invoice_model");
                            aq = new bootstrap.Modal(invoice_model);
                            aq.show();
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
                            sandbox: true,
                            merchant_id: "1221234", // Replace your Merchant ID
                            return_url: "http://localhost/nevis/Bill.php", // Important
                            cancel_url: "http://localhost/nevis/Bill.php", // Important
                            notify_url: "http://sample.com/notify",
                            order_id: json_to_js.id,
                            items: json_to_js.item,
                            amount: json_to_js.amount,
                            currency: "LKR",
                            hash: json_to_js.hash,
                            first_name: json_to_js.fname,
                            last_name: json_to_js.lname,
                            email: json_to_js.email,
                            phone: json_to_js.mobile,
                            address: json_to_js.address,
                            city: json_to_js.city,
                            country: "Sri Lanka",
                            delivery_address: json_to_js.address,
                            delivery_city: json_to_js.city,
                            delivery_country: "Sri Lanka",
                            custom_1: "",
                            custom_2: "",
                        };

                        // Show the payhere.js popup, when "PayHere Pay" is clicked
                        // document.getElementById('payhere-payment').onclick = function (e) {
                        payhere.startPayment(payment);

                    }



                }
            }

            req.open("POST", "checkout_process_online.php", true);
            req.send(form);
        } else {

            var conform_another_address = document.getElementById('conform_another_address').checked;
            if (conform_another_address == false) {


                var name_u = document.getElementById('f_name').value;
                var mobile_u = document.getElementById('mobile_user').value;
                var street_address_u = document.getElementById('address_u').value;
                var city_u = document.getElementById('city_u').value;
                var PostCode_u = document.getElementById('post_u').value;
                var district_u = document.getElementById('distric_u').value;


                var dress_id_u = document.getElementById('dress_id').value;
                var qty_u = document.getElementById('qty').value;
                var dress_size_id_u = document.getElementById('dress_size_id').value;
                var subtotal_u = document.getElementById('dressPrice').innerHTML;
                var total_cost_u = document.getElementById("allPricedress_input").value;
                var deliverycost_u = document.getElementById('shipingprice_input').value;


                // alert("err");




                var subtotal_cost_u = parseInt(subtotal_u)

                Obj = {

                        "distric": district_u,
                        "PostCode": PostCode_u,
                        "street_address": street_address_u,
                        "qty": qty_u,
                        "dress_id": dress_id_u,
                        "dress_size_id": dress_size_id_u,
                        "subtotal_cost": subtotal_cost_u,
                        "deliverycost": deliverycost_u,
                        "total_cost": total_cost_u,
                        "status": "register_online",
                        "mobile": mobile_u,
                        "name": name_u,

                    }
                    // alert(dsi)





            } else if (conform_another_address == true) {
                // alert("ok");

                var name_u = document.getElementById('f_name').value;
                var mobile_u = document.getElementById('mobile_user').value;
                var street_address_u = document.getElementById('adress_d').value;
                var city_u = document.getElementById('city_u').value;
                var PostCode_u = document.getElementById('post_u_d').value;
                var district_u = document.getElementById('distric2').value;


                var dress_id_u = document.getElementById('dress_id').value;
                var qty_u = document.getElementById('qty').value;
                var dress_size_id_u = document.getElementById('dress_size_id').value;
                var subtotal_u = document.getElementById('dressPrice').innerHTML;
                var total_cost_u = document.getElementById("allPricedress_input").value;
                var deliverycost_u = document.getElementById('shipingprice_input').value;






                var subtotal_cost_u = parseInt(subtotal_u)

                Obj = {

                        "distric": district_u,
                        "PostCode": PostCode_u,
                        "street_address": street_address_u,
                        "qty": qty_u,
                        "dress_id": dress_id_u,
                        "dress_size_id": dress_size_id_u,
                        "subtotal_cost": subtotal_cost_u,
                        "deliverycost": deliverycost_u,
                        "total_cost": total_cost_u,
                        "status": "register_online",
                        "mobile": mobile_u,
                        "name": name_u,

                    }
                    // alert(dsi)




            }


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("user_single_product_buy", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);
                    // validate inputs 

                    if (json_to_js.mobile_error_u) {
                        document.getElementById("mobile_error_u").innerHTML = json_to_js.mobile_error_u;
                    } else {
                        document.getElementById("mobile_error_u").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error_u").innerHTML = json_to_js.name_error_u;
                    } else {
                        document.getElementById("name_error_u").innerHTML = '';
                    }

                    if (conform_another_address == true) {

                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_d").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_d").innerHTML = '';
                        }

                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_d").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_d").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_d").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_d").innerHTML = '';
                        }

                    } else {
                        if (json_to_js.post_error_u) {
                            document.getElementById("post_error_u").innerHTML = json_to_js.post_error_u;
                        } else {
                            document.getElementById("post_error_u").innerHTML = '';
                        }

                        if (json_to_js.Street_error_u) {
                            document.getElementById("Street_error_u").innerHTML = json_to_js.Street_error_u;
                        } else {
                            document.getElementById("Street_error_u").innerHTML = '';
                        }



                        if (json_to_js.district_error_u) {
                            document.getElementById("district_error_u").innerHTML = json_to_js.district_error_u;
                        } else {
                            document.getElementById("district_error_u").innerHTML = '';
                        }

                    }




                    // document.getElementById("ManageuserViewarea").innerHTML = text;

                    if (json_to_js.successe) {
                        // Payment completed. It can be a successful failure.
                        payhere.onCompleted = function onCompleted(orderId) {
                            console.log("Payment completed. OrderID:" + orderId);
                            // Note: validate the payment and show success or failure page to the customer
                            // saveInvoice(orderId, id, mail, amount, qty);
                            document.getElementById("download_div").innerHTML = json_to_js.inner;
                            var invoice_model = document.getElementById("invoice_model");
                            aq = new bootstrap.Modal(invoice_model);
                            aq.show();
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
                            sandbox: true,
                            merchant_id: "1221234", // Replace your Merchant ID
                            return_url: "http://localhost/nevis/Bill.php", // Important
                            cancel_url: "http://localhost/nevis/Bill.php", // Important
                            notify_url: "http://sample.com/notify",
                            order_id: json_to_js.id,
                            items: json_to_js.item,
                            amount: json_to_js.amount,
                            currency: "LKR",
                            hash: json_to_js.hash,
                            first_name: json_to_js.fname,
                            last_name: json_to_js.lname,
                            email: json_to_js.email,
                            phone: json_to_js.mobile,
                            address: json_to_js.address,
                            city: json_to_js.city,
                            country: "Sri Lanka",
                            delivery_address: json_to_js.address,
                            delivery_city: json_to_js.city,
                            delivery_country: "Sri Lanka",
                            custom_1: "",
                            custom_2: "",
                        };

                        // Show the payhere.js popup, when "PayHere Pay" is clicked
                        // document.getElementById('payhere-payment').onclick = function (e) {
                        payhere.startPayment(payment);

                    }


                }
            }

            req.open("POST", "checkout_process_online.php", true);
            req.send(form);


        }



    } else {
        var distric = document.getElementById('distric2').value;
        var PostCode = document.getElementById('PostCode').value;
        var street_address = document.getElementById('street_address').value;
        var dress_id = document.getElementById('dress_id').value;
        var qty = document.getElementById('qty').value;

        var dress_size_id = document.getElementById('dress_size_id').value;
        var subtotal = document.getElementById('dressPrice').innerHTML;
        // var delivery = document.getElementById('shipingprice').innerHTML;
        var deliverycost = document.getElementById('shipingprice_input').value;
        // var total = document.getElementById('allPricedress').innerHTML;
        var total_cost = document.getElementById("allPricedress_input").value
        var mobile = document.getElementById("mobile").value
        var name = document.getElementById("name").value




        if (deliverycost == "") {
            alert("First select District");
        } else {

            var subtotal_cost = parseInt(subtotal)

            Obj = {

                    "distric": distric,
                    "PostCode": PostCode,
                    "street_address": street_address,
                    "qty": qty,
                    "dress_id": dress_id,
                    "dress_size_id": dress_size_id,
                    "subtotal_cost": subtotal_cost,
                    "deliverycost": deliverycost,
                    "total_cost": total_cost,
                    "status": "no_register_online",
                    "mobile": mobile,
                    "name": name,
                }
                // alert(dsi)


            serchObjToJson = JSON.stringify(Obj);
            // alert(serchObjToJson);
            var form = new FormData();
            form.append("not_user_single_product_buy", serchObjToJson);

            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    var text = req.responseText;
                    // alert(text);
                    // alert(text);
                    console.log(text);

                    var json_to_js = JSON.parse(text);

                    if (json_to_js.post_error) {
                        document.getElementById("post_error").innerHTML = json_to_js.post_error;
                    } else {
                        document.getElementById("post_error").innerHTML = '';
                    }

                    if (json_to_js.Street_error) {
                        document.getElementById("Street_error").innerHTML = json_to_js.Street_error;
                    } else {
                        document.getElementById("Street_error").innerHTML = '';
                    }

                    if (json_to_js.mobile_error) {
                        document.getElementById("mobile_error").innerHTML = json_to_js.mobile_error;
                    } else {
                        document.getElementById("mobile_error").innerHTML = '';
                    }
                    if (json_to_js.name_error) {
                        document.getElementById("name_error").innerHTML = json_to_js.name_error;
                    } else {
                        document.getElementById("name_error").innerHTML = '';
                    }



                    // Payment completed. It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);
                        // Note: validate the payment and show success or failure page to the customer
                        // saveInvoice(orderId, id, mail, amount, qty);
                        document.getElementById("download_div").innerHTML = json_to_js.inner;
                        var invoice_model = document.getElementById("invoice_model");
                        aq = new bootstrap.Modal(invoice_model);
                        aq.show();
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
                        sandbox: true,
                        merchant_id: "1221234", // Replace your Merchant ID
                        return_url: "http://localhost/nevis/Bill.php", // Important
                        cancel_url: "http://localhost/nevis/Bill.php", // Important
                        notify_url: "http://sample.com/notify",
                        order_id: json_to_js.id,
                        items: json_to_js.item,
                        amount: json_to_js.amount,
                        currency: "LKR",
                        hash: json_to_js.hash,
                        first_name: json_to_js.fname,
                        last_name: json_to_js.lname,
                        email: json_to_js.email,
                        phone: json_to_js.mobile,
                        address: json_to_js.address,
                        city: json_to_js.city,
                        country: "Sri Lanka",
                        delivery_address: json_to_js.address,
                        delivery_city: json_to_js.city,
                        delivery_country: "Sri Lanka",
                        custom_1: "",
                        custom_2: "",
                    };

                    // Show the payhere.js popup, when "PayHere Pay" is clicked
                    // document.getElementById('payhere-payment').onclick = function (e) {
                    payhere.startPayment(payment);

                    // validate inputs 

                    // // document.getElementById("ManageuserViewarea").innerHTML = text;

                    // if (json_to_js.success) {
                    //     // alert(json_to_js.success)

                    //     document.getElementById("download_div").innerHTML = json_to_js.inner;
                    //     var invoice_model = document.getElementById("invoice_model");
                    //     aq = new bootstrap.Modal(invoice_model);
                    //     aq.show();

                    // }


                }
            }

            req.open("POST", "checkout_process_online.php", true);
            req.send(form);

        }
    }

}


// order 

function order_view_admin(id) {


    Obj = {

            "order_id": id,
        }
        // alert("ok");


    serchObjToJson = JSON.stringify(Obj);
    // alert(serchObjToJson);
    var form = new FormData();
    form.append("order_view", serchObjToJson);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            var text = req.responseText;
            // alert(text);
            // alert(text);
            // console.log(text);

            var json_to_js = JSON.parse(text);
            if (json_to_js.inner) {
                document.getElementById("download_div2").innerHTML = json_to_js.inner;
                var invoice_model = document.getElementById("order_model");
                aq = new bootstrap.Modal(invoice_model);
                aq.show();
            }


        }

    }
    req.open("POST", "order_view.php", true);
    req.send(form);
}