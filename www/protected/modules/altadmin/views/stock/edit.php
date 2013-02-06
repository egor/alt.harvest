<script type="text/javascript" src="/library/altadmin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/altadmin/includeEditor.js"></script>
<script type="text/javascript" src="/library/jquery-ui-1.10.0.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);        
        $( "#datepicker1" ).datepicker($.datepicker.regional[ "ru" ]);        
        $( "#datepicker2" ).datepicker($.datepicker.regional[ "ru" ]);        
    });
</script>
<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Акции' => array('/altadmin/stock/'),
    'Редактирование',
);
?>
<?php
if (Yii::app()->user->hasFlash('success')){
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
}
if (Yii::app()->user->hasFlash('err')){
    echo '<h4 class="alert_error">' . Yii::app()->user->getFlash('err') . '</h4>';
}
?>
<article class="module width_full">
    <header><h3>Редактирование акции</h3></header>
    <div class="module_content">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
            ),
                ));
        ?>
        <?php
        echo $form->errorSummary($model);
        ?>
        <fieldset>
            <?php echo $form->labelEx($model, 'visibility'); ?>
            <?php echo $form->checkBox($model, 'visibility'); ?>
            <?php echo $form->error($model, 'visibility'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'in_main'); ?>
            <?php echo $form->checkBox($model, 'in_main'); ?>
            <?php echo $form->error($model, 'in_main'); ?>
        </fieldset>        
        <fieldset>
            <?php echo $form->labelEx($model, 'date'); ?>
            <?php echo $form->textField($model, 'date', array('id' => 'datepicker')); ?>
            <?php echo $form->error($model, 'date'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'end_date'); ?>
            <?php echo $form->textField($model, 'end_date', array('id' => 'datepicker1')); ?>
            <?php echo $form->error($model, 'end_date'); ?>
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
            <?php echo $form->textArea($model, 'short_text', array('id' => 'editor-text')); ?>
            <br /><br />
            <?php echo $form->error($model, 'short_text'); ?>
        </fieldset>
        <fieldset>
            <?php echo $form->labelEx($model, 'img'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img'); ?></p>
            <?php
            echo $form->error($model, 'img');
            if (!empty($model->img)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/stock/' . $model->img . '" height="100px;"></p>';
            }
            ?>
            <label for="Stock_delpic">Удалить картинку</label>
            <input type="hidden" name="Stock[delpic]" value="0" id="ytStock_delpic">
            <input type="checkbox" value="1" id="Works_delpic" name="Stock[delpic]">
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