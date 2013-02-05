<script>
    function showFooterForm() {
        $(".main-footer-modal").show();
        return false;
    }
    function hideFooterForm() {
        $(".main-footer-modal").hide();
        return false;
    }
</script>
<div class="main-footer-form">
    <a href="#" onclick="showFooterForm(); return false;" class="main-footer-form-a"><span>Отправить заявку</span></a>
    <form action="/zayavka-otpravlena" method="post" id="zayavka2">
    <div class="main-footer-modal">
        <a href="#" onclick="hideFooterForm(); return false;" class="main-footer-form-close"><img src="/images/site/main-footer-form-close.jpg" /></a>
        <div class="main-footer-form-name"><span>Ваше имя:</span><input name="name" id="name2" class="main-footer-form-in"></div>
        <div class="main-footer-form-phone"><span>Ваш телефон:</span><input name="phone" id="phone2" class="main-footer-form-in"></div>
        <input type="submit" name="main-footer-sub" value="Отправить заявку" class="main-footer-form-sub">
    </div>
    </form>
</div>
<script>
    $("#name2").focus(function() {
    if( $("#name2").val() == "Введите Ваше имя" ) {
        $("#name2").val("");
    }
    });
    $("#name2").blur(function() {
    if( $("#name2").val() == "" ) {
        $("#name2").val("Введите Ваше имя");
    }
});
$("#phone2").focus(function() {
    if( $("#phone2").val() == "Введите Ваш телефон" ) {
        $('#phone2').mask('(999) 999-99-99');
        $("#phone2").val("");
        
    }
    });
    $("#phone2").blur(function() {
        
    //$('#phone2').mask('Введите Ваш телефон');
    //$("#phone2").val("Введите Ваш телефон");
    if( $("#phone2").val() == "" ) {
        $("#phone2").val("Введите Ваш телефон");
    }
});


$("#zayavka2").submit(function(){
        var name = $.trim($("#name2").val());
        var phone = $("#phone2").val();
        r = true;
        //alert(name +' ' + phone);
       
        if (phone=='' || phone == "Введите Ваш телефон") {
            $("#phone2").val("Введите Ваш телефон")
            r = false;
        }
        if (name=='' || name == "Введите Ваше имя") {
            $("#name2").val("Введите Ваше имя")
            r = false;
        }
        return r;
});
</script>