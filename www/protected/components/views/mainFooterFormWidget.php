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
    <form action="/zayavka-otpravlena" method="post">
    <div class="main-footer-modal">
        <a href="#" onclick="hideFooterForm(); return false;" class="main-footer-form-close"><img src="/images/site/main-footer-form-close.jpg" /></a>
        <div class="main-footer-form-name"><span>Ваше имя:</span><input name="name" class="main-footer-form-in"></div>
        <div class="main-footer-form-phone"><span>Ваш телефон:</span><input name="phone" class="main-footer-form-in"></div>
        <input type="submit" name="main-footer-sub" value="Отправить заявку" class="main-footer-form-sub">
    </div>
    </form>
</div>