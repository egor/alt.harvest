 <!-- Файлы CSS -->
        <link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
        
                <div class="main-top-form">
                    <form action="/zayavka-otpravlena" method="post">
                    <div class="main-top-form-content">
                        <div class="main-top-form-header">Рассрочка 0%</div>
                        <div class="main-top-form-c1">на пластиковые и деревянные окна</div>
                        <div class="main-top-form-c2"><span>Ваше имя:</span><input name="name" class="main-top-form-in"></div>
                        <div class="main-top-form-c3"><span>Ваш телефон:</span><input name="phone" class="main-top-form-in"></div>
                        <div class=""><input type="submit" class="main-top-form-sub" value=""></div>
                        <div class="main-top-form-c4"><span class="texts">до конца акции<br />осталось</span><div id="countdown"></div>
                                                    <div class="main-top-form-c5"><span class="d">дней</span><span class="h">часов</span><span class="m">минут</span><span class="i">секунд</span></div>
                            
		<!--<p id="note"></p>--></div>
                    </div>
                    </form>
                </div>
                
        <!-- JavaScript -->		
		<script src="/library/countdown/jquery.countdown.js"></script>
                <script>
                    $(function(){
	
	var note = $('#note'),
		ts = new Date(2014, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// Задаем точку отсчета для примера. Пусть будет очередной Новый год или дата через 10 дней.
		// Обратите внимание на *1000 в конце - время должно задаваться в миллисекундах
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";
			
			if(newYear){
				message += "осталось до Нового года!";
			}
			else {
				message += "осталось до момента через 10 дней!";
			}
			
			note.html(message);
		}
	});
	
});

                    </script>
