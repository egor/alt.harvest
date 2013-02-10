<link rel="stylesheet" type="text/css" href="/css/site/paginator3000.css" />
<script type="text/javascript" src="/js/site/paginator3000.js"></script>
<link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
<?php
/* @var $this StockController */

$this->breadcrumbs = array(
    $stockData->menu_name,
);
?>
<h1><?php echo $stockData->h1; ?></h1>
<?php
echo $stockData->text;
echo '<div class="stock_list">';
$z = 0;
$count = count($model);
foreach ($model as $value) {
    $z++;

    echo '<div class="stock-item">';
    echo '<div class="stock-item-date"></div><h2>' . $value->menu_name . '</h2>';
    echo '<br clear="all"/>
        <div class="stock-img" ' . (!empty($value->img) ? 'style="background:url(/images/stock/' . $value->img . '");"' : '').'>
<form action="/zayavka-otpravlena" method="post">
<div class="stock-form">
<div class="stock-input-str-name"><span>Ваше имя:</span><input name="name" class="stock-input-name"></div>
<div class="stock-input-str-phone"><span>Ваш телефон:</span><input name="phone" class="stock-input-phone"></div>
<div class="stock-submit-str"><input type="submit" value="" class="main-top-form-sub2"></div>
<div id="countdown'.$value->stock_id.'"></div>   
<div class="countdown-str"><span class="day">дней</span><span class="hour">часов</span><span class="min">минут</span><span class="sec">секунд</span></div>
</div>
</div>
</form>
        <div class="stock-item-short-text">' . 
            $value->short_text . '</div><br clear="all" /></div>';
    
    if ($z < $count) {
        echo '<div class="footer-list-line"></div>
            <div class="footer-list-line2"></div>';
    }
}
echo '</div>';
if ($countPage>1) {
?>
<div class="paginator" id="paginator_page">
    <?php
    
        $this->widget('CLinkPager', array(
            'pages' => $paginator,
            'id' => ''
        ));
    
    ?>
</div>
<?php
}
?>
<script type="text/javascript">
    paginator_example = new Paginator(
    "paginator_page", // id контейнера, куда ляжет пагинатор
<?php echo $countPage; ?>, // общее число страниц
<?php echo $settingValue; ?>, // число страниц, видимых одновременно
<?php echo (isset($_GET['page']) ? $_GET['page'] : 1); ?>, // номер текущей страницы
                    "<?php echo '/' . $stockData->url . '/'; ?>"//"http://www.yourwebsite.com/pages/" // url страниц
                );
</script>


<div id="countdown"></div>

<!-- JavaScript -->		
		<script src="/library/countdown/jquery.countdown.js"></script>
                <script>
                    $(function(){
	/*
	var note = $('#note'),
		ts = new Date(2014, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// Задаем точку отсчета для примера. Пусть будет очередной Новый год или дата через 10 дней.
		// Обратите внимание на *1000 в конце - время должно задаваться в миллисекундах
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}*/
		//ts = new Date(2013, 1, 11, 0,0,0),
                //alert(ts);
                <?php
                foreach ($model as $value) {
                    $datetime1 = date_create(date('Y-m-d'));
                    $datetime2 = date_create(date('Y-m-d',$value->end_date));
                    $interval = date_diff($datetime1, $datetime2);
                    //echo $interval->days; die;
                    ?>
                ts = (new Date()).getTime() + <?php echo $interval->days; ?>*24*60*60*1000;//(new Date()).getTime() + <?php echo (time()-$value->end_date); ?>*1000;//*24*60*60*1000;
                //alert ('<?php echo (date('d',$value->end_date))?> -');
	$('#countdown<?php echo $value->stock_id; ?>').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";
			
			
			
			//note.html(message);
		}
	});
        <?php
                }
        ?>
	
});    
    $("#zayavka").submit(function(){
        var name = $.trim($("#name").val());
        var phone = $("#phone").val();
        r = true;
        //alert(name +' ' + phone);
       
        if (phone=='' || phone == "Введите Ваш телефон") {
            $("#phone").val("Введите Ваш телефон")
            r = false;
        }
        if (name=='' || name == "Введите Ваше имя") {
            $("#name").val("Введите Ваше имя")
            r = false;
        }
        return r;
});

$("#name").focus(function() {
    if( $("#name").val() == "Введите Ваше имя" ) {
        $("#name").val("");
    }
    });
    $("#name").blur(function() {
    if( $("#name").val() == "" ) {
        $("#name").val("Введите Ваше имя");
    }
});
$("#phone").focus(function() {
    if( $("#phone").val() == "Введите Ваш телефон" ) {
        $("#phone").val("");
    }
    });
    $("#phone").blur(function() {
    if( $("#phone").val() == "" ) {
        $("#phone").val("Введите Ваш телефон");
    }
});

    </script>