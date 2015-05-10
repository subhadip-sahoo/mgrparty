jQuery(document).ready(function () {
    jQuery('.mobile-main-nav').meanmenu();
    $("#uploadFile").click(function(){
        $("#uploadBtn").click();
    });
    $("#uploadBtn").change(function () {
        $("#uploadFile").val($(this).val());
    });
    $(document).delegate('.mobile-submenu ul li', 'click', function(){
        $(this).addClass('selected').siblings().removeClass();
    });
});

