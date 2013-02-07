<link rel="stylesheet" type="text/css" href="/css/site/paginator3000.css" />
<script type="text/javascript" src="/js/site/paginator3000.js"></script>
<?php
/* @var $this WorksController */
$this->breadcrumbs = array(
    $worksData->menu_name,
);
?>
<h1><?php echo $worksData->h1; ?></h1>
<?php
echo $worksData->text;
echo '<div class="works-list">';
$z = 0;
$count = count($model);
foreach ($model as $value) {
    $z++;
    echo '<div class="works-item">';
    echo '<div class="works-item-date">' . 
            date('d.m.Y', $value->date) . 
            ' | &nbsp;</div><h2>' .
            $value->menu_name . 
            '</h2><br clear="all"/>';
    echo '<div class="works-item-short-text">' . 
            (!empty($value->img) ? '<a href="/images/works/big/' . $value->img_big . '"><img class="works-list-img" src="/images/works/' . $value->img . '" alt="' . $value->img_alt . '" title="' . $value->img_title . '" /></a>' : '') .
            $value->text .
            '</div><br clear="all">';
    echo '<div class="works-user-data">'.$value->address.'</div></div>';
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
    "<?php echo '/' . $worksData->url . '/'; ?>"// url страниц
);
</script>