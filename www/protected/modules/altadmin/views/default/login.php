<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
$this->breadcrumbs=array(
	'Авторизация',
);
?>



<article class="module width_log_quarter">
    <header><h3 class="tabs_involved">Авторизация</h3>

    </header>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
   
					
	<table>
            <tr>
                <td><?php echo $form->labelEx($model, 'username'); ?></td>
                <td><?php echo $form->textField($model,'username'); ?></td></tr>
                <tr><td colspan="2"><?php echo $form->error($model,'username'); ?></td></tr>					
            <tr><td><?php echo $form->labelEx($model, 'password'); ?></td><td><?php echo $form->passwordField($model,'password'); ?></td></tr>
		<tr><td colspan="2"><?php echo $form->error($model,'password'); ?>	</td></tr>					
            <tr><td><?php echo $form->checkBox($model, 'rememberMe'); ?></td><td><?php echo $form->label($model,'rememberMe'); ?></td></tr>
		<tr><td colspan="2"><?php echo $form->error($model,'rememberMe'); ?></td></tr>
	
        </table>
	

	<div class="row buttons">
		
	</div>


</div><!-- form -->

<footer>
				<div class="submit_link">
                                    <?php echo CHtml::submitButton('Вход', array('class'=>"alt_btn")); ?>
                                       
				</div>
			</footer>
</div>

</article>
<?php $this->endWidget(); ?>