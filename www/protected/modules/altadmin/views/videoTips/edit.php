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
    'Видео советы' => array('/altadmin/videoTips/'),
    'Редактирование',
);
?>
<?php
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<article class="module width_full">
    <header><h3>Редактирование совета</h3></header>
    <div class="module_content">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'news-data-_form-form',
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
            <?php echo $form->textArea($model, 'short_text', array('id' => 'editor-text')); ?>
            <br /><br />
            <?php echo $form->error($model, 'short_text'); ?>
        </fieldset>

        <fieldset>

            <?php echo $form->labelEx($model, 'link_to_video'); ?>
            <?php echo $form->textField($model, 'link_to_video'); ?>
            <?php echo $form->error($model, 'link_to_video'); ?>
            <div class="clear"></div>
        </fieldset>
        
        <fieldset>

            <?php echo $form->labelEx($model, 'line'); ?>
            <?php echo $form->textField($model, 'line'); ?>
            <?php echo $form->error($model, 'line'); ?>
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
</article><!-- end of post new article -->



<?php $this->endWidget(); ?>