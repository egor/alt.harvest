<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    'Настройки'
);
?>
<?php
if (Yii::app()->user->hasFlash('success')) {
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
}
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
        ));
?>
<article class="module width_full">
    <header><h3 class="tabs_involved">Настройки</h3>
        <ul class="tabs">   		
            <li class="active"><a href="#tab2">Настройки</a></li>
        </ul>
    </header>
    <div class="tab_content" id="tab2" style="display: none;">

        <fieldset>    <label for="PSettings_value">Email для получения обратной связи</label>

            <?php echo $form->textField($paginator, 'value'); ?>
            <?php echo $form->error($paginator, 'value'); ?>
        </fieldset>
    </div>
    <footer>
        <div class="submit_link">
            <?php echo CHtml::submitButton('Отменить'); ?>
            <?php echo CHtml::submitButton('Сохранить'); ?>
            <?php echo CHtml::submitButton('Сохранить и выйти', array('class' => "alt_btn")); ?>
        </div>
    </footer>	
</div>
</article>                
<?php $this->endWidget(); ?>