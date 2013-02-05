

             
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

$this->breadcrumbs=array(
    'Дерево'=>array('/altadmin/pages/'),
    'Редактирование',
);
?>
<?php if(Yii::app()->user->hasFlash('success')):
        echo '<h4 class="alert_success">'.Yii::app()->user->getFlash('success').'</h4>'; 
endif; ?>
<article class="module width_full">
			<header><h3>Редактирование страницы</h3></header>
				<div class="module_content">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-data-_form-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=>array(
         'enctype'=>'multipart/form-data',
     ),
        //'enctype'=>'multipart/form-data'
            ));
    ?>
    <?php
    
    echo $form->errorSummary($pages);
    
    ?>
<fieldset>
               <?php echo $form->labelEx($pages, 'visibility'); ?>
                            <?php echo $form->checkBox($pages, 'visibility'); ?>
                            <?php echo $form->error($pages, 'visibility'); ?>
                            </fieldset>
<fieldset>
               <?php echo $form->labelEx($pages, 'in_menu'); ?>
                            <?php echo $form->checkBox($pages, 'in_menu'); ?>
                            <?php echo $form->error($pages, 'in_menu'); ?>
                            </fieldset>
<fieldset>
               <?php echo $form->labelEx($pages, 'in_last'); ?>
                            <?php echo $form->checkBox($pages, 'in_last'); ?>
                            <?php echo $form->error($pages, 'in_last'); ?>
                            </fieldset>                                    
                                <fieldset>
							<?php echo $form->labelEx($pages, 'url'); ?>
							<?php echo $form->textField($pages, 'url'); ?>
                                    <?php echo $form->error($pages, 'url'); ?>
						</fieldset>
                            
                        <fieldset>
                            <?php echo $form->labelEx($pages, 'date'); ?>
                            <?php echo $form->textField($pages, 'date', array('id' => 'datepicker')); ?>
                            <?php echo $form->error($pages, 'date'); ?>
                            </fieldset>
                        <fieldset>
                        
                            <?php echo $form->labelEx($pages, 'menu_name'); ?>
                            <?php echo $form->textField($pages, 'menu_name'); ?>
                            <?php echo $form->error($pages, 'menu_name'); ?>
                            <div class="clear"></div>
                        </fieldset><fieldset>
                            <?php echo $form->labelEx($pages, 'h1'); ?>
                            <?php echo $form->textField($pages, 'h1'); ?>
                            <?php echo $form->error($pages, 'h1'); ?>
                           </fieldset><fieldset>
                            <?php echo $form->labelEx($pages, 'meta_keywords'); ?>
                            <?php echo $form->textField($pages, 'meta_keywords'); ?>
                            <?php echo $form->error($pages, 'meta_keywords'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($pages, 'meta_title'); ?>
                            <?php echo $form->textField($pages, 'meta_title'); ?>
                            <?php echo $form->error($pages, 'meta_title'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($pages, 'meta_description'); ?>
                            <?php echo $form->textArea($pages, 'meta_description'); ?>
                            <?php echo $form->error($pages, 'meta_description'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($pages, 'short_text'); ?>
                                <br /><br />
                            <?php echo $form->textArea($pages, 'short_text', array('id'=>'editor-desc')); ?>
                            <?php echo $form->error($pages, 'short_text'); ?>
                            </fieldset>
                                
                                
                                <fieldset>
                            <?php echo $form->labelEx($pages, 'img'); ?><br/><br/>
                            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($pages, 'img'); ?></p>
                            <?php echo $form->error($pages, 'img'); 
                            if (!empty($pages->img)) {
                                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/pages/'.$pages->img.'" height="100px;"></p>';
                            }
                            echo $form->labelEx($pages, 'img_alt'); ?>
                            <?php echo $form->textField($pages, 'img_alt'); ?>
                            <?php echo $form->error($pages, 'img_alt'); ?>
                            <p><br/></p><p><br/></p>
                                    <?php echo $form->labelEx($pages, 'img_title'); ?>
                            
                            <?php echo $form->textField($pages, 'img_title'); ?>
                            <?php echo $form->error($pages, 'img_title'); ?>
                            </fieldset>
                                
                                <fieldset>
                                
                            <?php echo $form->labelEx($pages, 'text'); ?>
                                <br /><br />
                            <?php echo $form->textArea($pages, 'text', array('id'=>'editor-text')); ?>
                                <br /><br />
                            <?php echo $form->error($pages, 'text'); ?>
                           </fieldset>
    
                       
                       
                        	
                                                            
                            
                            

                            
                        
</div>
			<footer>
				<div class="submit_link">
        <?php echo CHtml::submitButton('Отменить'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
        <?php echo CHtml::submitButton('Сохранить и выйти', array('class'=>"alt_btn")); ?>
				</div>
			</footer>
		</article><!-- end of post new article -->
		
    

    <?php $this->endWidget(); ?>