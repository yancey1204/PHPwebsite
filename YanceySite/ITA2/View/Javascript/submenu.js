$(document).ready(function () {
    $("#NewsSubtitle").mouseover(function () {
        $("#NewsSub").show();
    });
    $("#NewsSubtitle").mouseout(function () {
        $("#NewsSub").hide();
    });

    $(".WelsomeSubtitle").mouseover(function () {
        $("#WelcomeSub").show();
    });

    $(".WelsomeSubtitle").mouseout(function () {
        $("#WelcomeSub").hide();
    });

    $("#RegisterBT").click(function (e) {
        e.preventDefault();
        $("#registerForm").fadeIn();
        $("#loginForm").hide();
    });
    $("#LoginBT").click(function (e) {
        e.preventDefault();
        $("#loginForm").fadeIn();
        $("#registerForm").hide();
    });

    $(".closeIMG").mouseover(function () {
        $(".closeHover").stop().show();
    });
    $(".closeIMG").mouseout(function () {
        $(".closeHover").stop().hide();
    });
    $(".closeIMG").click(function () {
        $(".RegisterLoginForm").hide();
    });
    $(".closeHover").click(function () {
        $(".RegisterLoginForm").hide();
    });
});