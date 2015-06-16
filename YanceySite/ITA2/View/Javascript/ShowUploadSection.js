$(document).ready(function () {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="file" name="file[]" id="file" required />\n\
<div class="textareaContainer"><textarea rows="8"  name="description[]"></textarea></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
    var c = 0;
    var a = 0;
    $("#upload").click(function () {
        if (c === 0) {
            $("#selectImage").slideDown("slow");
            c = 1;
        }
        else {
            $("#selectImage").slideUp("slow");
            c = 0;
        }
    });

    $("#showHistory").click(function () {
        if (a === 0) {
            $("#HostoryList").slideDown("slow");
            a = 1;
        }
        else {
            $("#HostoryList").slideUp("slow");
            a = 0;
        }
    });




});

