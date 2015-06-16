$("document").ready(function () {
    $("#loginForm").submit(function () {
        var data = {
            "LoginEmail": $("#LoginEmail").val(), // get data from the index.php
            "LoginPassword": $("#LoginPassword").val()     // get data from the index.php
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../Function/Login.php", //Relative or absolute path to response.php file
            data: data,
            success: function (response) {
                if (response === "You are now logged in") {
                    $("#loginForm").hide().fadeOut(1500).delay(6000);
                    location.reload();
                }
                else {
                    $("#LoginError").html("<span style='color:#cc0000'>Error:</span>" + response);
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


