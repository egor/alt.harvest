<link rel="stylesheet" type="text/css" href="/css/altadmin/sort/style.css" media="all" />	
<script type="text/javascript" src="/js/altadmin/sort/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="/js/altadmin/sort/init.js"></script>
<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Список отзывов',
);
?>

<?php
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<p><a href="/altadmin/banners/add/">Добавить баннер</a></p>

<article class="module width_full">
    <header><h3 class="tabs_involved">Баннерная система</h3>

    </header>

    <div class="tab_container">
        <div class="tab_content" id="tab1" style="display: block;">



<?php
echo '<ul id="sortable">';
foreach ($model as $value) {
    echo '<li id="note_' . $value->banners_id . '" class="editable">
                    <span class="note">' . $value->banners_id . ' ' . $value->name . '</span>
                    <a href="/altadmin/banners/edit/' . $value->banners_id . '"><input type="image" title="Edit" src="/images/altadmin/icn_edit.png"></a>
                    ' . CHtml::link('<input type="image" title="Удалить" src="/images/altadmin/icn_trash.png">', array('/altadmin/banners/delete/' . $value->banners_id . ''), array('confirm' => 'Точно удалить?')) . '
        </li>';
}
echo '</ul>';
?>



        </div>
        <footer>
            <div class="submit_link">
                <form id="changeOrder" method="post" action="/altadmin/banners/changeOrder">
                    <input type="submit" value="Сохранить сортировку" class="alt_btn" />
                </form>
            </div>
        </footer>
</article>
<h4 class="alert_info"><p>Для изменения порядка вывода, наведите на отзыв зажмите левую кнопку мыши и перетяните отзыв в нужное место. После того как вы выстроили отзывы в нужном порядке нажмите кнопку "Сохранить сортировку"</p></h4>
