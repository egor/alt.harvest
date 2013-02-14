<link rel="stylesheet" type="text/css" href="/css/site/paginator3000.css" />
<script type="text/javascript" src="/js/site/paginator3000.js"></script>

<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    $reviewsData->menu_name,
);
?>
<h1><?php echo $reviewsData->h1; ?></h1>
<?php
echo $reviewsData->text;
echo '<div class="reviews_list">';
$z = 0;
$count = count($model);
foreach ($model as $value) {
    $z++;

    echo '<div class="reviews-item">';
    echo '<a href="#" name="'.$value->reviews_id.'"></a><div class="reviews-item-date">' . date('d.m.Y', $value->date) . ' | &nbsp;</div><h2>' . $value->menu_name . '</h2>';
    echo '<br clear="all"/>
        <div class="reviews-item-short-text">' . (!empty($value->img) ? '<div class="reviews_img"><a href="/images/reviews/big/' . $value->img_big . '"><img class="reviews-list-img" src="/images/reviews/' . $value->img . '" alt="' . $value->img_alt . '" title="' . $value->img_title . '" /></a></div>' : '') . 
            (!empty($value->link_to_video) ? '<div class="reviews_video">'.$value->link_to_video.'</div>' : '') .
            $value->text . '</div><br clear="all" />';
    echo '
        <div class="reviews-user-data"><table cellspacing="0"><tr><td class="reviews_t"><i>Отзывы:</i></td><td>'.$value->user_name.'</td></tr>
            <tr><td></td><td>'.$value->user_address.'</td></tr></table></div>
        </div>';
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
//var_dump($paginator); die;
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
                    "<?php echo '/' . $reviewsData->url . '/'; ?>"//"http://www.yourwebsite.com/pages/" // url страниц
                );
</script>
<?php
} else {
    echo '<br/>';
}
?>