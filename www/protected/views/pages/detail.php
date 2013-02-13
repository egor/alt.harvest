<link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
<?php
/* @var $this PagesController */
$this->breadcrumbs = Breadcrumbs::getBreadcrumbsToPageById($model->pages_id);
$this->breadcrumbs[] .= $model->menu_name;

if ($model->print_top_form == 1) {
    echo '<div class="stock-item">
            <div class="stock-img" ' . (!empty($model->img_top_form) ? 'style="background:url(/images/pages/form/top/' . $model->img_top_form . ');"' : '') . '>
                <form action="/zayavka-otpravlena" id="formh" method="post">
                    <div class="stock-form">
                        <div class="stock-input-str-name"><span>Ваше имя:</span><input id="nameh" name="name" class="stock-input-name"></div>
                        <div class="stock-input-str-phone"><span>Ваш телефон:</span><input id="phoneh" name="phone" class="stock-input-phone"></div>
                        <div class="stock-submit-str"><input type="submit" value="" class="main-top-form-sub2"></div>
                        <div id="countdown' . $model->pages_id . '"></div>   
                        <div class="countdown-str"><span class="day">дней</span><span class="hour">часов</span><span class="min">минут</span><span class="sec">секунд</span></div>
                    </div>
                </form>
            </div>        
        </div>
        <br clear="all" />';
}
?>
<h1 <?php echo ($model->print_date == 1 ? 'class="h1-date"' : '') ?>><?php echo $model->h1; ?></h1>
<span class="main-date"><?php echo ($model->print_date == 1 ? date('d.m.Y', $model->date) : ''); ?></span>
<?php
echo $model->text;
if ($model->print_footer_form == 1) {
    ?>
    <div class="page-footer-form" style="<?php echo (!empty($model->color_footer_form) ? 'background-color:#' . $model->color_footer_form . ';' : '') ?>">
        <div class="page-footer-form-text">
    <?php echo $model->text_footer_form; ?>    
        </div>
        <form action="/zayavka-otpravlena" method="post" id="formf">
            <input class="page-footer-form-name" id="namef" name="name" value="Введите Ваше имя">
            <input class="page-footer-form-phone" id="phonef" name="phone" value="Введите Ваш телефон">
            <input type="submit" class="page-footer-form-submit" value="">
        </form>
    </div>
    <div class="line_footer_form">
    <?php
    echo $model->line_footer_form;
    ?>
    </div>
        <?php
    }
    if (!empty($model->img_top_form)) {
        ?>
    <script src="/library/countdown/jquery.countdown.js"></script>
    <script>
        $(function(){    	
    <?php
    $datetime1 = date_create(date('Y-m-d'));
    $datetime2 = date_create(date('Y-m-d', $model->end_date_top_form));
    $interval = date_diff($datetime1, $datetime2);
    ?>
                    ts = (new Date()).getTime() + <?php echo $interval->days; ?>*24*60*60*1000;//(new Date()).getTime() + <?php echo (time() - $model->end_date_top_form); ?>*1000;//*24*60*60*1000;
                    $('#countdown<?php echo $model->pages_id; ?>').countdown({
                        timestamp	: ts,
                        callback	: function(days, hours, minutes, seconds){    			
                            var message = "";    			
                            message += "Дней: " + days +", ";
                            message += "часов: " + hours + ", ";
                            message += "минут: " + minutes + " и ";
                            message += "секунд: " + seconds + " <br />";
                        }
                    });
                });    
    </script>
    <?php
}
echo '<div class="pages-list">';
foreach ($items as $item) {
    $url = GetUrlToPage::getUrlToPageById($item->pages_id);

    echo '<a href="' . $url . '">' . ($item->print_date == 1 ? '<div class="news-item-date">'.date('d.m.Y', $item->date). ' | &nbsp;</div>':'') . '<h2>' . $item->menu_name . '</h2></a><br clear="all" />';
    echo '<div class="item-short-text">' . (!empty($item->img) ? '<a href="' . $url . '"><img class="list-img" src="/images/pages/' . $item->img . '" alt="' . $item->img_alt . '" title="' . $item->img_title . '" /></a>' : '') . $item->short_text . '</div>';
    echo '<div class="more-i"><a class="more" href="' . $url . '">' . SelectDataFromEditFields::selectValue('pages_list_text') . '</a></div>';
    echo '<div class="footer-list-line"></div>
            <div class="footer-list-line2"></div>';
}
echo '</div>';
?>







<script>
    $(document).ready(function(){
                        
        if ($("#namef").val() == 'Введите Ваше имя') {
            //$("#namef").val('');
            $("#namef").css('color', '#636467');
        }
        if ($("#phonef").val() == 'Введите Ваш телефон') {
            //$("#phonef").val('');
            $("#phonef").css('color', '#636467');
        }
        if ($("#namef").val() == '') {
            $("#namef").val('Введите Ваше имя');
            $("#namef").css('color', '#636467');
        }
        if ($("#phonef").val() == '') {
            $("#phonef").val('Введите Ваш телефон');
            $("#phonef").css('color', '#636467');
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
                $("#namef").css('color', '#000000');
            }
        })
                        
        $("#phonef").click(function() {
            if ($("#phonef").val() == 'Введите Ваш телефон') {
                $("#phonef").val('');
                $("#phonef").css('color', '#000000');
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
        
        
        
        if ($("#nameh").val() == 'Введите Ваше имя') {
            $("#nameh").val('');
            //$("#phoneh").css('color', 'black');
        }
        if ($("#phoneh").val() == 'Введите Ваш телефон') {
            $("#phoneh").val('');
            //$("#phonef").css('color', 'black');
        }
        $("#formh").submit(function() {
            ret = true;
            n = $("#nameh").val();
            p = $("#phoneh").val();
            if (n == '' || n == 'Введите Ваше имя') {
                $("#nameh").val('Введите Ваше имя');
                $("#nameh").css('color', 'red');
                ret = false;
            }
            if (p == '' || p == 'Введите Ваш телефон') {
                $("#phoneh").val('Введите Ваш телефон');
                $("#phoneh").css('color', 'red');
                ret = false;
            }
            return ret;
        })
                        
        $("#nameh").click(function() {
            if ($("#nameh").val() == 'Введите Ваше имя') {
                $("#nameh").val('');
                $("#nameh").css('color', 'black');
            }
        })
                        
        $("#phoneh").click(function() {
            if ($("#phoneh").val() == 'Введите Ваш телефон') {
                $("#phoneh").val('');
                $("#phoneh").css('color', 'black');
            }
        })
                        
        $("#phoneh").keydown(function(event) {
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