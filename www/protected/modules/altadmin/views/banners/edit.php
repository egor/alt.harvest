


<script type="text/javascript" src="/library/altadmin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/altadmin/includeEditor.js"></script>

<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Баннерная система' => array('/altadmin/banners/'),
    'Редактирование',
);
?>
<?php
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<article class="module width_full">
    <header><h3>Редактирование баннера</h3></header>
    <div class="module_content">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'form',
            'enableAjaxValidation' => false,
            'htmlOptions'=>array(
         'enctype'=>'multipart/form-data',
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
            <?php echo $form->labelEx($model, 'new_window'); ?>
            <?php echo $form->checkBox($model, 'new_window'); ?>
            <?php echo $form->error($model, 'new_window'); ?>
        </fieldset>
        <fieldset>

            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name'); ?>
            <?php echo $form->error($model, 'name'); ?>
            <div class="clear"></div>
        </fieldset>
        <fieldset>

            <?php echo $form->labelEx($model, 'link'); ?>
            <?php echo $form->textField($model, 'link'); ?>
            <?php echo $form->error($model, 'link'); ?>
            <div class="clear"></div>
        </fieldset>

        

        <fieldset>
            <?php echo $form->labelEx($model, 'img'); ?><br/><br/>
            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($model, 'img'); ?></p>
            <?php
            echo $form->error($model, 'img');
            if (!empty($model->img)) {
                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/banners/' . $model->img . '" height="100px;"></p>';
            }
            ?>
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