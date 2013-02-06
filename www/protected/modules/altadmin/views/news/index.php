<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Новости',
);
if (Yii::app()->user->hasFlash('success')){
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
}
if (Yii::app()->user->hasFlash('err')){
    echo '<h4 class="alert_error">' . Yii::app()->user->getFlash('err') . '</h4>';
}
?>
<p><a href="/altadmin/news/add/">Добавить новость</a></p>


<article class="module width_full">
    <header><h3 class="tabs_involved">Список новостей</h3>

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
                    foreach ($news as $value) {
                        echo '<tr>
                                <td>' . $value->news_id . '</td> 
    				<td>' . $value->menu_name . '</td> 
    				<td>' . date('d.m.Y', $value->date) . '</td> 
    				<td>
                                
                                    <a href="/altadmin/news/edit/' . $value->news_id . '"><input type="image" title="Edit" src="/images/altadmin/icn_edit.png"></a>
                                    '.CHtml::link('<input type="image" title="Удалить" src="/images/altadmin/icn_trash.png">', array('/altadmin/news/delete/' . $value->news_id . ''), array('confirm'=>'Точно удалить?')).'
                                </td>				
                            </tr>';
                    }
                    ?>

                </tbody> 
            </table>
        </div>

</article>


