<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="icon" type="image/vnd.microsoft.icon" href="/ico/favicon.ico">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site/style.css" />
        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site/ie8.css" />
        <![endif]-->
        <script src="/js/jquery-1.7.1.min.js"></script>


	
    
    <script type="text/javascript" src="/js/site/lightbox/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/site/lightbox/jquery.lightbox-0.5.css" media="screen" />

    <script type="text/javascript">
	$(function(){
		$("a[href$='jpg']").lightBox();
	});
        function backCall(){
            $('.form-back-call').show();
        }
        function backCallClose(){
            $('.form-back-call').hide();
        }
    </script>
    
<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?78"></script>
<script type="text/javascript">
  VK.init({apiId: 3426643, onlyWidgets: true});
</script>

 <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />       
    </head>

    <body>
        

        <div class="header">
            <div class="header-content">
                <div class="main-logo">
                    <a href="/"><img 
                            alt="<?php echo SelectDataFromEditFields::selectValue('top_logo_alt'); ?>"
                            title="<?php echo SelectDataFromEditFields::selectValue('top_logo_title'); ?>" 
                            src="/images/site/main-logo.png"></a>
                </div>
                <div class="main-map"><img 
                        src="/images/site/header-map.png"
                        alt="<?php echo SelectDataFromEditFields::selectValue('top_map_alt'); ?>"
                        title="<?php echo SelectDataFromEditFields::selectValue('top_map_title'); ?>" 
                        ></div>
                <div class="header-phone">
                    <div class="header-phone-call-me">
                        <?php echo SelectDataFromEditFields::selectValue('top_phone'); ?>
                        
                    </div>
                    <div  class="header-phone-num">
                        <img src="/images/site/header-phone.png">
                    </div>
                    <div class="header-work-time">
                    <?php echo SelectDataFromEditFields::selectValue('top_work_time'); ?>
                    </div>
                </div>
                <div class="r-part"><img src="/images/site/r-part.png"></div>
            </div>        
            <div class="header-hr">&nbsp;</div>          
            
        </div>
        <div class="header-menu-content">
                <div class="header-menu-content-left"></div>

                <?php $this->widget('HeaderMenuPortlet'); ?>
                
                <div class="header-menu-content-right"></div>
            </div>
        <div class="header-menu-hr"></div>
        
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink'=>CHtml::link(SelectDataFromEditFields::selectValue('start_breadcrumbs'),'/'),
			'links'=>$this->breadcrumbs,
                        'separator'=>' <span class="breadcrumb-separator"></span> ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                <div class="content">
                <div class="left-menu">
                    <?php $this->widget('LeftMenuPortlet'); ?>
                    <div class="left-header-blog">
                        <?php echo SelectDataFromEditFields::selectValue('left_blog'); ?>
                    </div>
                    <?php $this->widget('LeftMenuBlogPortlet'); ?>
                    <div class="read-blog"><!--<h2><?php echo SelectDataFromEditFields::selectValue('left_blog'); ?></h2>-->
                    <?php 
//echo SelectDataFromEditFields::selectValue('left_blog_all');
//echo SelectDataFromEditFields::selectValue('left_blog_link'); ?>
                    </div>
                    <div class="left-last-info">
                        <div class="left-last-info-header">
                            <?php echo SelectDataFromEditFields::selectValue('left_last_info'); ?>
                        </div>
                        <?php $this->widget('LeftMenuLastStatPortlet'); ?>
                    </div>
                    
                </div>
                <div class="site-content"><?php echo $content; ?></div>
                <div class="right-col">
                    <div class="right-pad"></div>
                    <?php $this->widget('RightBannersWidget'); ?>
                    <?php //echo SelectDataFromEditFields::selectValue('right_banners'); ?>
                    <div class="consultant">
                        <div class="consultant-header"><?php echo SelectDataFromEditFields::selectValue('right_consul_header'); ?></div>
                        <div class="consultant-foto"><?php echo SelectDataFromEditFields::selectValue('right_foto_consul'); ?></div>
                        <div class="consultant-name"><?php echo SelectDataFromEditFields::selectValue('right_consul_name'); ?></div>                        
                    </div>
                    <div class="right-call">
                        <div class="form-back-call">
                            <div class="form-back-call-header"><?php echo SelectDataFromEditFields::selectValue('form_back_call_header'); ?><a href="#" onclick="backCallClose(); return false;">x</a></div>
                            <form action="/zayavka-otpravlena" method="post" id="formbc">
                                <div class="form-back-call-name"><span>Ваше имя:</span><input class="name-fci" name="name" id="namebc" /></div>
                                <div class="form-back-call-phone"><span>Ваш телефон:</span><input class="phone-fci" name="phone" id="phonebc" /></div>
                                <div class="form-back-call-sub"><input class="form-back-call-subs" type="submit" value="&nbsp;"></div>
                                <div class="form-back-call-text"><?php echo SelectDataFromEditFields::selectValue('form_back_call_text'); ?></div>
                            </form>
                            
                        </div>
                            
                        <div class="right-call-header"><?php echo SelectDataFromEditFields::selectValue('right_phone_header'); ?></div>
                        <div class="right-call-phone"><table><tr><td><img class="right-call-phone-ico" src="/images/site/lrft-c-mts.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('right_phone_phone_1'); ?></span></td></table></div>
                        <div class="right-call-phone"><table><tr><td><img class="right-call-phone-ico" src="/images/site/lrft-c-kiyivs.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('right_phone_phone_2'); ?></span></td></tr></table></div>
                        <div class="right-call-phone"><table><tr><td><img class="right-call-phone-ico" src="/images/site/lrft-c-city.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('right_phone_phone_3'); ?></span></td></tr></table></div>
                        <div class="right-call-but"><a href="#" onclick="backCall(); return false;" class="right-call-but-a">&nbsp;</a></div>
                        
                    </div>
                    <div class="right-video">
                        <div class="right-video-header">    
                            <?php echo SelectDataFromEditFields::selectValue('right_video_header'); ?>
                        </div>
                        <?php echo SelectDataFromEditFields::selectValue('right_video_link'); ?>
                    </div>
                    
                    <div class="right-last-re">
                        <div class="right-last-re-header">    
                            <?php echo SelectDataFromEditFields::selectValue('right_otz_header'); ?>
                        </div>
                        <?php $this->widget('RightLastReviewsWidget'); ?>
                        
                    </div>
                    <?php
                    //echo SelectDataFromEditFields::selectValue('right_otz_link_text'); 
                    //echo SelectDataFromEditFields::selectValue('right_otz_link'); 
                    
                    
                    ?>
                </div>
                </div>
                
                <!-- footer -->
                <div class="footer-sep"></div>
                <div class="footer">
                    <div class="footer-left">
                        <div class="footer-left-logo"><a href="/"><img alt="<?php echo SelectDataFromEditFields::selectValue('foter_logo_alt');?>" title="<?php echo SelectDataFromEditFields::selectValue('footer_logo_title'); ?>" src="/images/site/footer-logo.png" /></a></div>
                        <div class="footer-left-phone">
                            <table>
                                <tr><td><img class="footer-call-phone-ico" src="/images/site/footer-phone-kiyiv.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('footer_phone_1'); ?></span></td></tr>
                                <tr><td><img class="footer-call-phone-ico" src="/images/site/footer-phone-mts.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('footer_phone_2'); ?></span></td></tr>
                                <tr><td><img class="footer-call-phone-ico" src="/images/site/footer-phone-city.png"></td><td><span><?php echo SelectDataFromEditFields::selectValue('footer_phone_3'); ?></span></td></tr>
                            </table>
                        </div>
                        <div class="footer-left-work-time">
                            <?php echo SelectDataFromEditFields::selectValue('footer_work_time'); ?>
                        </div>
                    </div>
                    <div class="footer-right">
                        <div class="footer-right-menu">
                            <?php $this->widget('headerMenuPortlet', array('footer'=>1)); ?>
                        </div>
                        <div class="footer-right-slogan">
                            <div class="footer-right-slogan-header"><?php echo SelectDataFromEditFields::selectValue('footer_slogan_title'); ?></div>
                            <div class="footer-right-slogan-text"><?php echo SelectDataFromEditFields::selectValue('footer_slogan_text'); ?></div>
                        </div>
                        <?php
                            $sitemapModel = Pages::model()->findByPk(Yii::app()->params['modules']['sitemap']);                                    
                        ?>
                        <table class="cos-t">
                            <tr><td><span class="soc"><?php echo SelectDataFromEditFields::selectValue('footer_soc_title'); ?></span></td>
                                <td rowspan="4">
                                    <div class="footer-map-img"><a href="/<?php echo $sitemapModel->url; ?>"><img class="footer-map" 
                                        src="/images/site/footer-map2.png"
                                        alt="<?php echo SelectDataFromEditFields::selectValue('footer_map_alt'); ?>"
                                        title="<?php echo SelectDataFromEditFields::selectValue('footer_map_title'); ?>"
                                        
                                        /></a></div>

                                    <div class="footer-map-text"><a href="/<?php echo $sitemapModel->url; ?>"><?php echo SelectDataFromEditFields::selectValue('footer_map_text'); ?></a></div>
                                </td></tr>
                            <tr><td>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_google_link'); ?>"><img class="footer-google" src="/images/site/footer-google.png" /></a>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_facebook_link'); ?>"><img class="footer-facebook" src="/images/site/footer-facebook.png" /></a>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_youtube_link'); ?>"><img class="footer-youtube" src="/images/site/footer-youtube.png" /></a>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_vk_link'); ?>"><img class="footer-vk" src="/images/site/footer-vk.png" /></a>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_ok_link'); ?>"><img class="footer-ok" src="/images/site/footer-ok.png" /></a>
                                    <a href="<?php echo SelectDataFromEditFields::selectValue('footer_ok_link'); ?>"><img class="footer-twitter" src="/images/site/footer-twitter.png" /></a>
                                </td></tr>
                            <tr><td></td></tr>
                            <tr><td><span class="footer-copy"><?php echo SelectDataFromEditFields::selectValue('footer_copyright'); ?></span></td></tr>
                            
                        </table>
                    </div>
                    
                </div>
                <!-- end footer -->
                
    <script language="JavaScript">
        window.onload= function(){
        left = $('.left-menu').height();
        center = $('.site-content').height();
        right=$('.right-col').height();
        if (left>center && left>right) {
            $('.site-content').height(left);
        } else if (right>center && right>left) {
            $('.site-content').height(right);
        }
        //alert (left +' ' + center + ' ' + right);
        }
        
        
    </script>
                
                
                
                
                
                


<script>
    $(document).ready(function(){                                                
        if ($("#namebc").val() == 'Введите Ваше имя') {
            $("#namebc").val('');
        }
        if ($("#phonebc").val() == 'Введите Ваш телефон') {
            $("#phonebc").val('');
        }
        $("#formbc").submit(function() {
            ret = true;
            n = $("#namebc").val();
            p = $("#phonebc").val();
            if (n == '' || n == 'Введите Ваше имя') {
                $("#namebc").val('Введите Ваше имя');
                $("#namebc").css('color', 'red');
                ret = false;
            }
            if (p == '' || p == 'Введите Ваш телефон') {
                $("#phonebc").val('Введите Ваш телефон');
                $("#phonebc").css('color', 'red');
                ret = false;
            }
            return ret;
        })
                        
        $("#namebc").click(function() {
            if ($("#namebc").val() == 'Введите Ваше имя') {
                $("#namebc").val('');
                $("#namebc").css('color', 'black');
            }
        })
                        
        $("#phonebc").click(function() {
            if ($("#phonebc").val() == 'Введите Ваш телефон') {
                $("#phonebc").val('');
                $("#phonebc").css('color', 'black');
            }
        })
                        
        $("#phonebc").keydown(function(event) {
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
                
 </body>
</html>
