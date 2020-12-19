const reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;



$(document).ready(function () {


    $("#susername").on("blur", function (event) {
        let username = $(this).val();


        $.post(
            "helpers/useravail.php",
            { username },
            function (data) {
                if (data) {
                    // console.log("not available");
                    $("#usernameMsg").text("Username not available");
                    $("#usernameMsg").removeClass("text-success");
                    $("#usernameMsg").addClass("text-danger");
                    $("#signUpButton").attr("disabled", true);
                } else {
                    $("#usernameMsg").text("Username is available");
                    $("#usernameMsg").addClass("text-success");
                    $("#usernameMsg").removeClass("text-danger");
                    $("#signUpButton").removeClass("disabled");
                    $("#signUpButton").attr("disabled", false);
                }
            }
        );

    });


    $('#signupmodal').on('hidden.bs.modal', function () {
        // console.log("hidden");
        $("#usernameMsg").text("");
        $("#usernameMsg").removeClass("text-success");
        $("#usernameMsg").removeClass("text-danger");
        $("#signUpButton").removeClass("disabled");
        $("#signUpButton").attr("disabled", false);
        $('#signupform').trigger("reset");
    });


    $("#semail").on("keyup", function () {
        let email = $(this).val().toLowerCase();
        if (reg.test(email)) {
            $("#emailMessage").text("Valid email");
            $("#emailMessage").addClass("text-success");
            $("#emailMessage").removeClass("text-danger");
        } else {
            $("#emailMessage").text("Invalid Valid email");
            $("#emailMessage").addClass("text-danger");
            $("#emailMessage").removeClass("text-success");
        }
    });



    $("#loginButton").on("click", function(e) {

        // console.log("dasd");
        let username = $("#lusername").val();
        let password = $("#lpassword").val();



        // console.log("ds");
        $.ajax({
            type: "POST",
            data: { username, password },
            url: "helpers/validlogincheck.php",
            success: function (data) {
                // console.log(typeof data);
                // console.log(data);
                data = JSON.parse(data);
                if(data === "OK"){
                    $("#loginStatus").text("");
                    // console.log("OK");
                    // console.log("success", data);
                    $("#loginStatus").removeClass("alert-danger");
                    e.preventDefault();
                    // window.location.href = "index.php";
                    window.location.href = "student/profile.php";
                }else{
                    console.log("NOT OK");
                    // e.preventDefault();
                    // $("#error").text("error");
                    // console.log("failled",data);
                    $("#login-status").text("Invalid username or password");
                    $("#login-status").addClass("alert-danger");
                    // $("#loginButton").text("wrong");
                }
            }
        });

    });

});




