<link rel="stylesheet" type="text/css" href="/css/site/paginator3000.css" />
<script type="text/javascript" src="/js/site/paginator3000.js"></script>

<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	$newsData->menu_name,    
);
?>
<h1><?php echo $newsData->h1; ?></h1>
<?php
echo $newsData->text;
echo '<div class="news_list">';
    $z=0;
    $count = count($model);
foreach ($model as $value) {
    $z++;
    $url = '/'.$newsData->url.'/'.$value->url;
    echo '<div class="news-item">';
    echo '<a href="'.$url.'" class="list-header"><div class="news-item-date">'.date ('d.m.Y', $value->date).' | &nbsp;</div><h2>'.$value->menu_name.'</h2></a>';
    echo '<br clear="all"/><div class="mews-item-short-text">'.(!empty($value->img)?'<img class="news-list-img" src="/images/news/'.$value->img.'" alt="'.$value->img_alt.'" title="'.$value->img_title.'" />':'').$value->short_text.'</div>';
    echo '<br clear="all"/><a class="more" href="'.$url.'">'.SelectDataFromEditFields::selectValue('news_list_text').'</a><br /></div>';
    if ($z<$count) {
        echo '<div class="footer-list-line"></div>
            <div class="footer-list-line2"></div>';
    }
}
echo '</div>';
?>
<div class="paginator" id="paginator_page">
<?php
//var_dump($paginator); die;
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id'=>''
    
));
?>
</div>
<script type="text/javascript">
	paginator_example = new Paginator(
		"paginator_page", // id контейнера, куда ляжет пагинатор
		<?php echo $countPage; ?>, // общее число страниц
		5, // число страниц, видимых одновременно
		<?php echo (isset($_GET['page'])? $_GET['page'] : 1); ?>, // номер текущей страницы
		"<?php echo '/'.$newsData->url.'/'; ?>"//"http://www.yourwebsite.com/pages/" // url страниц
	);
</script>