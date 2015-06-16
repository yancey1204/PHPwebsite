$("document").ready(function () {
    $("#registerForm").submit(function () {
        var data = {
            "Registeremail": $("#Registeremail").val(), // get data from the index.php
            "RegisterPassword": $("#RegisterPassword").val(), // get data from the index.php
            "RegisterCPassword": $("#RegisterConfirmPassword").val()   // get data from the index.php
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../Function/Register.php", //Relative or absolute path to response.php file
            data: data,
            success: function (response) {
                if (response === "New record created successfully") {
                    $("#registerForm").hide().fadeOut(1500).delay(6000);
                    location.reload();
                }
                else {
                    $("#RegisterError").html("<span style='color:#cc0000'>Error:</span>" + response);
                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
        return false;
    });
});


