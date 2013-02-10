<link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
<?php
/* @var $this PagesController */
$this->breadcrumbs = Breadcrumbs::getBreadcrumbsToPageById($model->pages_id);
$this->breadcrumbs[] .= $model->menu_name;

if ($model->print_top_form == 1) {
    echo '<div class="stock-item">
            <div class="stock-img" ' . (!empty($model->img_top_form) ? 'style="background:url(/images/pages/form/top/' . $model->img_top_form . ');"' : '') . '>
                <form action="/zayavka-otpravlena" method="post">
                    <div class="stock-form">
                        <div class="stock-input-str-name"><span>Ваше имя:</span><input name="name" class="stock-input-name"></div>
                        <div class="stock-input-str-phone"><span>Ваш телефон:</span><input name="phone" class="stock-input-phone"></div>
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
<h1><?php echo $model->h1; ?></h1>
<?php

echo $model->text;
if ($model->print_footer_form == 1) {
    
?>
<div class="page-footer-form" style="<?php echo (!empty($model->color_footer_form) ? 'background-color:#'.$model->color_footer_form.';':'') ?>">
    <div class="page-footer-form-text">
    <?php echo $model->text_footer_form; ?>    
    </div>
    <form action="/zayavka-otpravlena" method="post">
        <input class="page-footer-form-name" name="name" value="Ваше имя">
        <input class="page-footer-form-phone" name="phone" value="Ваш телефон">
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
            $datetime2 = date_create(date('Y-m-d', $value->end_date));
            $interval = date_diff($datetime1, $datetime2);
            ?>
            ts = (new Date()).getTime() + <?php echo $interval->days; ?>*24*60*60*1000;//(new Date()).getTime() + <?php echo (time() - $value->end_date); ?>*1000;//*24*60*60*1000;
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
    echo '<h2><a href="'.$url.'">'.$item->menu_name.'</a></h2><br clear="all" />';
    echo '<div class="item-short-text">'.(!empty($item->img)?'<a href="'.$url.'"><img class="list-img" src="/images/pages/'.$item->img.'" alt="'.$item->img_alt.'" title="'.$item->img_title.'" /></a>':'').$item->short_text.'</div>';
    echo '<div class="more-i"><a class="more" href="'.$url.'">'.SelectDataFromEditFields::selectValue('pages_list_text').'</a></div>';
    echo '<div class="footer-list-line"></div>
            <div class="footer-list-line2"></div>';
}
echo '</div>';
?>