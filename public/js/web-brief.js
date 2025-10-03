$(".logos").click(function()
{

    $(".logos").prop("checked", false);
    $(this).prop("checked", true);
});


var lastChecked;
var $checks = $('.limit').click(function() {
    var numChecked = $checks.filter(':checked').length;
    console.log(numChecked);
    if (numChecked > 3) {
        alert("Yalnız 3 ədəd logo tipi seçə bilərsiz!");
        lastChecked.checked = false;
    }
    lastChecked = this;
});