var elm = document.forms['form'].elements['search'];
elm.focus();
elm.setSelectionRange(elm.value.length,elm.value.length);

$('#search').bind('keyup', function() {
    if ($(this).val().length >= 1) {
        $('#form').submit();
    }
});


