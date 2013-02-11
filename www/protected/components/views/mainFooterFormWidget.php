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
    <form action="/zayavka-otpravlena" method="post" id="formf">
    <div class="main-footer-modal">
        <a href="#" onclick="hideFooterForm(); return false;" class="main-footer-form-close"><img src="/images/site/main-footer-form-close.jpg" /></a>
        <div class="main-footer-form-name"><span>Ваше имя:</span><input name="name" id="namef" class="main-footer-form-in"></div>
        <div class="main-footer-form-phone"><span>Ваш телефон:</span><input name="phone" id="phonef" class="main-footer-form-in"></div>
        <input type="submit" name="main-footer-sub" value="Отправить заявку" class="main-footer-form-sub">
    </div>
    </form>
</div>

    <script>
    $(document).ready(function(){
                        
                        if ($("#namef").val() == 'Введите Ваше имя') {
                            $("#namef").val('');
                        }
                        if ($("#phonef").val() == 'Введите Ваш телефон') {
                            $("#phonef").val('');
                        }
                        $("#formf").submit(function() {
                            ret = true;
                            n = $("#namef").val();
                            p = $("#phonef").val();
                            if (n == '' || n == 'Введите Ваше имя') {
                                $("#namef").val('Введите Ваше имя');
                                $("#namef").css('color', 'red');
                                ret = false;
                            }
                            if (p == '' || p == 'Введите Ваш телефон') {
                                $("#phonef").val('Введите Ваш телефон');
                                $("#phonef").css('color', 'red');
                                ret = false;
                            }
                            return ret;
                        })
                        
                        $("#namef").click(function() {
                            if ($("#namef").val() == 'Введите Ваше имя') {
                                $("#namef").val('');
                                $("#namef").css('color', 'black');
                            }
                        })
                        
                        $("#phonef").click(function() {
                            if ($("#phonef").val() == 'Введите Ваш телефон') {
                                $("#phonef").val('');
                                $("#phonef").css('color', 'black');
                            }
                        })
                        
                        $("#phonef").keydown(function(event) {
                            // Разрешаем: backspace, delete, tab и escape
                            if (event.keyCode == 13 || event.keyCode == 32 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
                            // Разрешаем: Ctrl+A
                            (event.keyCode == 65 && event.ctrlKey === true) ||
                            // Разрешаем: home, end, влево, вправо
                            (event.keyCode >= 35 && event.keyCode <= 39)) {
                            // Ничего не делаем
                            return;
                        }
                            else {
                                // Обеждаемся, что это цифра, и останавливаем событие keypress
                                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                                    event.preventDefault();
                                }  
                            }
                        });
                        
                    })
                    </script>