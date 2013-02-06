<link rel="stylesheet" type="text/css" href="/css/altadmin/sort/style.css" media="all" />	
<script type="text/javascript" src="/js/altadmin/sort/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="/js/altadmin/sort/init.js"></script>
<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Список работ',
);
if (Yii::app()->user->hasFlash('success')){
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
}
if (Yii::app()->user->hasFlash('err')){
    echo '<h4 class="alert_error">' . Yii::app()->user->getFlash('err') . '</h4>';
}
?>
<p><a href="/altadmin/works/add/">Добавить работу</a></p>



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
                        <th class="header">Вывод</th> 
                        <th class="header">Действия</th> 
                    </tr> 
                </thead> 
                <tbody>

                    <?php
                  foreach ($model as $value) {
                        echo '<tr>
                                <td>' . $value->works_id . '</td> 
    				<td>' . $value->menu_name . '</td> 
    				<td>' . date('d.m.Y', $value->date) . '</td> 
                                <td>' . ($value->visibility == 1? '<span class="v-y">да</span>':'<span class="v-n">нет</span>') . '</td> 
    				<td>
                                
                                    <a href="/altadmin/works/edit/' . $value->works_id . '"><input type="image" title="Edit" src="/images/altadmin/icn_edit.png"></a>
                                    '.CHtml::link('<input type="image" title="Удалить" src="/images/altadmin/icn_trash.png">', array('/altadmin/works/delete/' . $value->works_id . ''), array('confirm'=>'Точно удалить?')).'
                                </td>				
                            </tr>';
                    }
                    ?>

                </tbody> 
            </table>
        </div>

</article>