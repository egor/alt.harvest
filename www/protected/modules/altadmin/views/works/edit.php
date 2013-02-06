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
    'Наши работы' => array('/altadmin/works/'),
    'Редактирование',
);
?>
<?php
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<article class="module width_full">
    <header><h3>Редактирование работы</h3></header>
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
            <?php echo $form->labelEx($model, 'text'); ?>
            <br /><br />
            <?php echo $form->textArea($model, 'text', array('id' => 'editor-text')); ?>
            <br /><br />
            <?php echo $form->error($model, 'text'); ?>
        </fieldset>


        <fieldset>

            <?php echo $form->labelEx($model, 'address'); ?>
            <?php echo $form->textField($model, 'address'); ?>
            <?php echo $form->error($model, 'address'); ?>
            <div class="clear"></div>
        </fieldset>


        <fieldset>
            <?php echo $form->labelEx($model, 'img'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img'); ?></p>
            <?php
            echo $form->error($model, 'img');
            if (!empty($model->img)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/works/' . $model->img . '" height="100px;"></p>';
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
            <label for="Works_delpicS">Удалить картинку</label>
            <input type="hidden" name="Works[delpicS]" value="0" id="ytWorks_delpicS">
            <input type="checkbox" value="1" id="Works_delpicS" name="Works[delpicS]">
        </fieldset>


        <fieldset>
            <?php echo $form->labelEx($model, 'img_big'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img_big'); ?></p>
            <?php
            echo $form->error($model, 'img_big');
            if (!empty($model->img)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/works/big/' . $model->img_big . '" height="100px;"></p>';
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
            <label for="Works_delpicB">Удалить картинку</label>
            <input type="hidden" name="Works[delpicB]" value="0" id="ytWorks_delpicB">
            <input type="checkbox" value="1" id="Works_delpicB" name="Works[delpicB]">
            
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