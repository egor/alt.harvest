<?php 
$setting = Settings::model()->findByPk(8);
$setting = $setting->value; 
if (empty($setting) || $setting <= 0) {
    $setting = 10000;
} else {
    $setting = $setting * 1000;
}
?>
<link href="/css/site/jflow.style.css" type="text/css" rel="stylesheet"/>
<script src="/js/site/jflow.plus.js" type="text/javascript"></script>
<script language="javascript">
	$(document).ready(function(){
	    $("#myController").jFlow({
			controller: ".jFlowControl", // must be class, use . sign
			slideWrapper : "#jFlowSlider", // must be id, use # sign
			slides: "#mySlides",  // the div where all your sliding divs are nested in
			selectedWrapper: "jFlowSelected",  // just pure text, no sign
			width: "800px",  // this is the width for the content-slider
			height: "350px",  // this is the height for the content-slider
			duration: 400,  // time in miliseconds to transition one slide
			prev: ".jFlowPrev", // must be class, use . sign
			next: ".jFlowNext", // must be class, use . sign
			auto: true,
                        timers: <?php echo $setting; ?>
    });
});
</script>
<link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
<div id="slider">
<div id="mySlides">
<?php
    foreach ($model as $value) {
    echo '<div id="slide'.$value->stock_id.'">
        <div class="stock-item">
        <div class="stock-img" ' . (!empty($value->img) ? 'style="background:url(/images/stock/' . $value->img . ');"' : '').'>
<form action="/zayavka-otpravlena" method="post">
<div class="stock-form">
<div class="stock-input-str-name"><span>Ваше имя:</span><input name="name" class="stock-input-name"></div>
<div class="stock-input-str-phone"><span>Ваш телефон:</span><input name="phone" class="stock-input-phone"></div>
<div class="stock-submit-str"><input type="submit" value="" class="main-top-form-sub2"></div>
<div id="countdown'.$value->stock_id.'"></div>   
<div class="countdown-str"><span class="day">дней</span><span class="hour">часов</span><span class="min">минут</span><span class="sec">секунд</span></div>
</div>
</form>
</div>
</div>
</div>';
    
    
}
?>
</div>

<div id="myController">
    <?php
    foreach ($model as $value) {
        echo '<span class="jFlowControl"></span>';
    }
    ?>
   
</div>

<span class="jFlowPrev"><div></div></span>
<span class="jFlowNext"><div></div></span>
</div>

<script src="/library/countdown/jquery.countdown.js"></script>
                <script>
                    $(function(){
	
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