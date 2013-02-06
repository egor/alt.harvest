<!doctype html>
<html lang="ru">

<head>
	<meta charset="utf-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="stylesheet" href="/css/altadmin/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="/css/altadmin/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        

        
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="/js/altadmin/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="/js/altadmin/jqui1812/js/jquery-ui-1.8.12.custom.min.js"></script>
        
       
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        
	<script src="/js/altadmin/hideshow.js" type="text/javascript"></script>
	<script src="/js/altadmin/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/altadmin/jquery.equalHeight.js"></script>
        

        
        <script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>


<link rel="stylesheet" href="/library/jquery-ui-1.10.0.custom/css/smoothness/jquery-ui-1.10.0.custom.css" />
</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="/">ALT admin</a></h1>
			<h2 class="section_title">harvest.zp.ua</h2><div class="btn_view_site"><a href="/">сайт</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php if (!Yii::app()->user->isGuest) { echo Yii::app()->user->title; } else { echo 'Гость'; } ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
                            
                            
                            
                            <!--<a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a>-->
                        
                        
                                                <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'homeLink'=>'<a href="/altadmin/">Altadmin</a>',
                            //'tagName' =>array('span', array('class'=>'middle') ),
                            'separator'=>' <div class="breadcrumb_divider"></div> ',
                            'activeLinkTemplate'=>'<a href="{url}">{label}</a>',
                            'inactiveLinkTemplate'=>'<a class="current">{label}</a>',
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                        
                        </article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<!--<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>-->
                <?php
                if (!Yii::app()->user->isGuest && Yii::app()->user->role=='admin') {
                ?>
		<h3>Новости</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/news">Список новостей</a></li>
                        <li class="icn_new_article"><a href="/altadmin/news/add">Добавить новость</a></li>
                        <li class="icn_settings"><a href="/altadmin/news/settings">Настройки</a></li>
			<li class="icn_edit_article"><a href="#">Edit Articles</a></li>
			<li class="icn_categories"><a href="#">Categories</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
                <h3>Отзывы клиентов</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/reviews">Список отзывов</a></li>
                        <li class="icn_new_article"><a href="/altadmin/reviews/add">Добавить отзыв</a></li>
                        <li class="icn_settings"><a href="/altadmin/reviews/settings">Настройки</a></li>
		</ul>
                <h3>Наши работы</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/works/">Список работ</a></li>
                        <li class="icn_new_article"><a href="/altadmin/works/add">Добавить работу</a></li>
                        <li class="icn_settings"><a href="/altadmin/works/settings">Настройки</a></li>
		</ul>
                <h3>Видео советы</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/videoTips/">Список советов</a></li>
                        <li class="icn_new_article"><a href="/altadmin/videoTips/add">Добавить совет</a></li>
                        <li class="icn_settings"><a href="/altadmin/videoTips/settings">Настройки</a></li>
		</ul>
                <h3>Акции</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/stock/">Список акций</a></li>
                        <li class="icn_new_article"><a href="/altadmin/stock/add">Добавить акцию</a></li>
                        <li class="icn_settings"><a href="/altadmin/stock/settings">Настройки</a></li>
		</ul>
                
                <h3>Контент</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/pages">Дерево</a></li>
                        <li class="icn_settings"><a href="/altadmin/pages/settings">Настройки</a></li>
                        <li class="icn_settings"><a href="/altadmin/editFields">Редактируемые поля</a></li>
		</ul>
                
                <h3>Баннерная система</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="/altadmin/banners/">Список баннеров</a></li>
                        <li class="icn_new_article"><a href="/altadmin/banners/add">Добавить баннер</a></li>
		</ul>
		<!--<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>-->
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="/altadmin/default/logout/">Выход</a></li>
		</ul>
		<?php
                }
                ?>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Alt Admin</strong></p>
			<p>Разработано в <a href="http://alt.dp.ua" target="_blank">ALT</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
<?php echo $content; ?>
                
		<div class="spacer"></div>
	</section>


</body>

</html>