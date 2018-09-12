$(document).ready(function() {
    $('#myform').submit(function() {
        var abort = false;
        $("div.error").remove();
        $(':input[required]').each(function() {
            if ($(this).val() === '') {
                $(this).after('<div class="error">This is a required field</div>');
                abort = true;
            }
        });

        if (abort) { return false; } else { return true; }
    });
});

$('input[placeholder]').blur(function() {
    $("div.error").remove();
    var myPattern = $(this).attr('pattern');
    var myPlaceholder = $(this).attr('placeholder');
    var isValid = $(this).val().search(myPattern) >= 0;

    if (!isValid) {
        $(this).focus();
        $(this).after('<div class="error">Entry does not match expected pattern: ' + myPlaceholder + '</div>');
    }
});