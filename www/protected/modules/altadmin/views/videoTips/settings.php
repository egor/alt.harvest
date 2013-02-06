<script type="text/javascript" src="/library/altadmin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/altadmin/includeEditor.js"></script>
<script type="text/javascript" src="/library/jquery-ui-1.10.0.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);        
    });
</script>
<?php
$this->breadcrumbs = array(
    'Видео советы' => array('/altadmin/videoTips/'),
    'Настройки',
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
            <li class="active"><a href="#tab1">Мета теги</a></li>
            <li><a href="#tab2">Постраничный навигатор</a></li>
        </ul>
    </header>
    <div class="tab_container">
        <div class="tab_content" id="tab1" style="display: block;">
            <fieldset>
                <?php echo $form->labelEx($settings, 'url'); ?>
                <?php echo $form->textField($settings, 'url'); ?>
                <?php echo $form->error($settings, 'url'); ?>
            </fieldset>
            <fieldset>
                <?php echo $form->labelEx($settings, 'menu_name'); ?>
                <?php echo $form->textField($settings, 'menu_name'); ?>
                <?php echo $form->error($settings, 'menu_name'); ?>
            </fieldset>
            <fieldset>
                <?php echo $form->labelEx($settings, 'h1'); ?>
                <?php echo $form->textField($settings, 'h1'); ?>
                <?php echo $form->error($settings, 'h1'); ?>
            </fieldset>
            <fieldset>
                <?php echo $form->labelEx($settings, 'meta_title'); ?>
                <?php echo $form->textField($settings, 'meta_title'); ?>
                <?php echo $form->error($settings, 'meta_title'); ?> 
            </fieldset>
            <fieldset>    
                <?php echo $form->labelEx($settings, 'meta_keywords'); ?>
                <?php echo $form->textField($settings, 'meta_keywords'); ?>
                <?php echo $form->error($settings, 'meta_keywords'); ?>
            </fieldset>
            <fieldset>    
                <?php echo $form->labelEx($settings, 'meta_description'); ?>
                <?php echo $form->textField($settings, 'meta_description'); ?>
                <?php echo $form->error($settings, 'meta_description'); ?>
            </fieldset>
        </div><!-- end of #tab1 -->
        <div class="tab_content" id="tab2" style="display: none;">
            <fieldset>    
                <label for="PSettings_value">Количество советов на страницу</label>
                <?php echo $form->textField($paginator, 'value'); ?>
                <?php echo $form->error($paginator, 'value'); ?>
            </fieldset>
        </div><!-- end of #tab2 -->
        <footer>
            <div class="submit_link">
                <?php echo CHtml::submitButton('Отменить'); ?>
                <?php echo CHtml::submitButton('Сохранить'); ?>
                <?php echo CHtml::submitButton('Сохранить и выйти', array('class' => "alt_btn")); ?>
            </div>
        </footer>	
    </div><!-- end of .tab_container -->
</article>                
<?php $this->endWidget(); ?>