<link rel="stylesheet" type="text/css" href="/css/site/paginator3000.css" />
<script type="text/javascript" src="/js/site/paginator3000.js"></script>
<?php
/* @var $this VideoTipsController */
$this->breadcrumbs = array(
    $videoTipsData->menu_name,
);
?>
<h1><?php echo $videoTipsData->h1; ?></h1>
<?php
echo $videoTipsData->text;
echo '<div class="video-list">';
$z = 0;
$count = count($model);
foreach ($model as $value) {
    $z++;
    echo '<div class="video-item">';
    echo '<div class="video-item-date">' . 
            date('d.m.Y', $value->date) . 
            ' | &nbsp;</div><h2>' .
            $value->menu_name . 
            '</h2><br clear="all"/>';
    echo '<div class="video-item-short-text">' . 
            (!empty($value->link_to_video) ? '<div class="video-link">'.$value->link_to_video.'</div>' : '') .
            $value->short_text .
            '</div><br clear="all">';
    echo '<div class="video-user-data">'.$value->line.'</div></div>';
    if ($z < $count) {
        echo '<div class="footer-list-line"></div>
            <div class="footer-list-line2"></div>';
    }
}
?>
</div>
<div class="paginator" id="paginator_page">
<?php
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id' => ''
));
?>
</div>
<script type="text/javascript">
paginator_example = new Paginator(
    "paginator_page", // id контейнера, куда ляжет пагинатор
    <?php echo $countPage; ?>, // общее число страниц
    <?php echo $settingValue; ?>, // число страниц, видимых одновременно
    <?php echo (isset($_GET['page']) ? $_GET['page'] : 1); ?>, // номер текущей страницы
    "<?php echo '/' . $videoTipsData->url . '/'; ?>"// url страниц
);
</script>