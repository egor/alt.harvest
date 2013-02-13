<script type="text/javascript" src="/library/altadmin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/altadmin/includeEditor.js"></script>
<script type="text/javascript" src="/library/jquery-ui-1.10.0.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);        
    });        
</script>
<?php
/* @var $this NewsController */
$this->breadcrumbs = array(
    'Отзывы клиентов' => array('/altadmin/reviews/'),
    'Редактирование',
);
if (Yii::app()->user->hasFlash('success')) {
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
}
?>
<article class="module width_full">
    <header><h3>Редактирование отзыва</h3></header>
    <div class="module_content">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'news-data-_form-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
            ),
                ));
        echo $form->errorSummary($model);
        ?>
        <fieldset>
            <?php echo $form->labelEx($model, 'visibility'); ?>
            <?php echo $form->checkBox($model, 'visibility'); ?>
            <?php echo $form->error($model, 'visibility'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'date'); ?>
            <?php echo $form->textField($model, 'date', array('id' => 'datepicker')); ?>
            <?php echo $form->error($model, 'date'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'menu_name'); ?>
            <?php echo $form->textField($model, 'menu_name'); ?>
            <?php echo $form->error($model, 'menu_name'); ?>
            <div class="clear"></div>
        </fieldset>
        <fieldset>   
            <?php echo $form->labelEx($model, 'short_text'); ?>
            <br /><br />
            <?php echo $form->textArea($model, 'short_text', array('id' => 'editor-desc')); ?>
            <br /><br />
            <?php echo $form->error($model, 'short_text'); ?>
        </fieldset>
        <fieldset>   
            <?php echo $form->labelEx($model, 'text'); ?>
            <br /><br />
            <?php echo $form->textArea($model, 'text', array('id' => 'editor-text')); ?>
            <br /><br />
            <?php echo $form->error($model, 'text'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'link_to_video'); ?>
            <?php echo $form->textField($model, 'link_to_video'); ?>
            <?php echo $form->error($model, 'link_to_video'); ?>
            <div class="clear"></div>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'img'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img'); ?></p>
            <?php
            echo $form->error($model, 'img');
            if (!empty($model->img)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/reviews/' . $model->img . '" height="100px;"></p>';
            }
            echo $form->labelEx($model, 'img_alt');
            ?>
            <?php echo $form->textField($model, 'img_alt'); ?>
            <?php echo $form->error($model, 'img_alt'); ?>
            <p><br/></p><p><br/></p>
            <?php echo $form->labelEx($model, 'img_title'); ?>
            <?php echo $form->textField($model, 'img_title'); ?>
            <?php echo $form->error($model, 'img_title'); ?>
            <p><br/></p><p><br/><br/></p>
            <label for="Reviews_delpic">Удалить картинку</label>
            <input type="hidden" name="Reviews[delpic]" value="0" id="ytReviews_delpic">
            <input type="checkbox" value="1" id="Reviews_delpic" name="Reviews[delpic]">
        </fieldset>
        
        
        <fieldset>
            <?php echo $form->labelEx($model, 'img_big'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img_big'); ?></p>
            <?php
            echo $form->error($model, 'img_big');
            if (!empty($model->img_big)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/reviews/big/' . $model->img_big . '" height="100px;"></p>';
            }
            echo $form->labelEx($model, 'img_big_alt');
            ?>
            <?php echo $form->textField($model, 'img_big_alt'); ?>
            <?php echo $form->error($model, 'img_big_alt'); ?>
            <p><br/></p><p><br/></p>
            <?php echo $form->labelEx($model, 'img_big_title'); ?>
            <?php echo $form->textField($model, 'img_big_title'); ?>
            <?php echo $form->error($model, 'img_big_title'); ?>
            <p><br/></p><p><br/><br/></p>
            <label for="Reviews_delpic_big">Удалить картинку</label>
            <input type="hidden" name="Reviews[delpic_big]" value="0" id="ytReviews_delpic_big">
            <input type="checkbox" value="1" id="Reviews_delpic_big" name="Reviews[delpic_big]">
        </fieldset>
        
        <fieldset>
            <?php echo $form->labelEx($model, 'user_name'); ?>
            <?php echo $form->textField($model, 'user_name'); ?>
            <?php echo $form->error($model, 'user_name'); ?>
            <div class="clear"></div>
        </fieldset>         
        <fieldset>
            <?php echo $form->labelEx($model, 'user_address'); ?>
            <?php echo $form->textField($model, 'user_address'); ?>
            <?php echo $form->error($model, 'user_address'); ?>
            <div class="clear"></div>
        </fieldset>
    </div>
    <footer>
        <div class="submit_link">
            <?php echo CHtml::submitButton('Отменить'); ?>
            <?php echo CHtml::submitButton('Сохранить'); ?>
            <?php echo CHtml::submitButton('Сохранить и выйти', array('class' => "alt_btn")); ?>
        </div>
    </footer>
</article>
<?php $this->endWidget(); ?>