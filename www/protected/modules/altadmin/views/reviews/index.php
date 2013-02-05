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
<p><a href="/altadmin/reviews/add/">Добавить отзыв</a></p>


<article class="module width_full">
    <header><h3 class="tabs_involved">Список отзывов</h3>

    </header>

    <div class="tab_container">
        <div class="tab_content" id="tab1" style="display: block;">
            <table cellspacing="0" class="tablesorter"> 
                <thead> 
                    <tr> 

                        <th class="header">id</th> 
                        <th class="header">Название</th> 
                        <th class="header">Дата</th> 
                        <th class="header">Actions</th> 
                    </tr> 
                </thead> 
                <tbody>

                    <?php
                  foreach ($model as $value) {
                        echo '<tr>
                                <td>' . $value->reviews_id . '</td> 
    				<td>' . $value->menu_name . '</td> 
    				<td>' . date('d.m.Y', $value->date) . '</td> 
    				<td>
                                
                                    <a href="/altadmin/reviews/edit/' . $value->reviews_id . '"><input type="image" title="Edit" src="/images/altadmin/icn_edit.png"></a>
                                    '.CHtml::link('<input type="image" title="Удалить" src="/images/altadmin/icn_trash.png">', array('/altadmin/reviews/delete/' . $value->reviews_id . ''), array('confirm'=>'Точно удалить?')).'
                                </td>				
                            </tr>';
                    }
                    ?>

                </tbody> 
            </table>
        </div>

</article>
