<?php
/* @var $this PagesController */
$this->breadcrumbs = Breadcrumbs::getBreadcrumbsToPageById($model->pages_id);
$this->breadcrumbs[] .= $model->menu_name;
?>
<h1 <?php echo ($model->print_date == 1 ? 'class="h1-date"' : 'class="contact"') ?>><?php echo $model->h1; ?></h1>
<?php $this->widget('HeaderContactsMenuPortlet'); ?>
<?php echo ($model->print_date == 1 ? '<span class="main-date">'.date('d.m.Y', $model->date).'</span>' : ''); ?>
<?php
echo '<div class="contact-list">';
foreach ($items as $item) {
    $url = GetUrlToPage::getUrlToPageById($item->pages_id);
    //echo '<a href="' . $url . '">' . ($item->print_date == 1 ? '<div class="news-item-date">'.date('d.m.Y', $item->date). ' | &nbsp;</div>':'') . '<h2>' . $item->menu_name . '</h2></a><br clear="all" />';
    echo '<div class="item-short-text">' . (!empty($item->img) ? '<a href="' . $url . '"><img class="list-img" src="/images/pages/' . $item->img . '" alt="' . $item->img_alt . '" title="' . $item->img_title . '" /></a>' : '') . $item->short_text . '</div>';
    echo '<div class="more-i"><a class="more" href="' . $url . '">' . SelectDataFromEditFields::selectValue('contacts_list_text') . '</a></div>';    
}
echo '</div>';

echo '<div class="contact-page">';
$text = str_replace('{map_1}', SelectDataFromEditFields::selectValue('map_1'), $model->text);
$text = str_replace('{map_2}', SelectDataFromEditFields::selectValue('map_2'), $text);
$text = str_replace('{map_3}', SelectDataFromEditFields::selectValue('map_3'), $text);
$text = str_replace('{map_4}', SelectDataFromEditFields::selectValue('map_4'), $text);
$text = str_replace('{map_5}', SelectDataFromEditFields::selectValue('map_5'), $text);
$text = str_replace('{map_6}', SelectDataFromEditFields::selectValue('map_6'), $text);
echo $text.'</div>';
if ($model->like==1) {
    echo '<span class="soc-text">'.SelectDataFromEditFields::selectValue('soc_text').'</span>';
?>
    <table class="tsoc">
        <tr>
            <td><span class="bvk">
                <!-- Put this div tag to the place, where the Like block will be -->
                <div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button", height: 18, width: 100});
                </script>
                </span>
            </td>
            <td><span class="bfb">
                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
                </span></td>
            <td><span class="bok">                
                <a target="_blank" class="mrc__plugin_uber_like_button" href="http://connect.mail.ru/share" data-mrc-config="{'cm' : '1', 'ck' : '1', 'sz' : '20', 'st' : '2', 'tp' : 'ok'}">Нравится</a>
<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script>
                </span></td>
            
            <td><span class="btw">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </span>
            </td>
            <td>
                <span class="bgoo">
                <!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'ru'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
                </span> 
                
            </td>
        </tr>
    </table>
<?php    
}
?>