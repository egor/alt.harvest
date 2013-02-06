

             
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
    'Новости'=>array('/altadmin/news/'),
    'Редактирование',
);
?>
<?php if(Yii::app()->user->hasFlash('success')):
        echo '<h4 class="alert_success">'.Yii::app()->user->getFlash('success').'</h4>'; 
endif; ?>
<article class="module width_full">
			<header><h3>Редактирование новости</h3></header>
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
    
    echo $form->errorSummary($news);
    
    ?>
<fieldset>
               <?php echo $form->labelEx($news, 'visibility'); ?>
                            <?php echo $form->checkBox($news, 'visibility'); ?>
                            <?php echo $form->error($news, 'visibility'); ?>
                            </fieldset>
                            
                                <fieldset>
							<?php echo $form->labelEx($news, 'url'); ?>
							<?php echo $form->textField($news, 'url'); ?>
                                    <?php echo $form->error($news, 'url'); ?>
						</fieldset>
                            
                        
                        <fieldset>
                            <?php echo $form->labelEx($news, 'date'); ?>
                            <?php echo $form->textField($news, 'date', array('id' => 'datepicker')); ?>
                            <?php echo $form->error($news, 'date'); ?>
                            </fieldset><fieldset>
                        
                            <?php echo $form->labelEx($news, 'menu_name'); ?>
                            <?php echo $form->textField($news, 'menu_name'); ?>
                            <?php echo $form->error($news, 'menu_name'); ?>
                            <div class="clear"></div>
                        </fieldset><fieldset>
                            <?php echo $form->labelEx($news, 'h1'); ?>
                            <?php echo $form->textField($news, 'h1'); ?>
                            <?php echo $form->error($news, 'h1'); ?>
                           </fieldset><fieldset>
                            <?php echo $form->labelEx($news, 'meta_keywords'); ?>
                            <?php echo $form->textField($news, 'meta_keywords'); ?>
                            <?php echo $form->error($news, 'meta_keywords'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($news, 'meta_title'); ?>
                            <?php echo $form->textField($news, 'meta_title'); ?>
                            <?php echo $form->error($news, 'meta_title'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($news, 'meta_description'); ?>
                            <?php echo $form->textArea($news, 'meta_description'); ?>
                            <?php echo $form->error($news, 'meta_description'); ?>
                            </fieldset><fieldset>
                            <?php echo $form->labelEx($news, 'short_text'); ?>
                                <br /><br />
                            <?php echo $form->textArea($news, 'short_text', array('id'=>'editor-desc')); ?>
                            <?php echo $form->error($news, 'short_text'); ?>
                            </fieldset>
                                
                                
                                <fieldset>
                            <?php echo $form->labelEx($news, 'img'); ?><br/><br/>
                            <p>&nbsp;&nbsp;&nbsp;<?php echo $form->fileField($news, 'img'); ?></p>
                            <?php echo $form->error($news, 'img'); 
                            if (!empty($news->img)) {
                                echo '<p>&nbsp;&nbsp;&nbsp;<img src="/images/news/'.$news->img.'" height="100px;"></p>';
                            }
                            echo $form->labelEx($news, 'img_alt'); ?>
                            <?php echo $form->textField($news, 'img_alt'); ?>
                            <?php echo $form->error($news, 'img_alt'); ?>
                            <p><br/></p><p><br/></p>
                                    <?php echo $form->labelEx($news, 'img_title'); ?>
                            
                            <?php echo $form->textField($news, 'img_title'); ?>
                            <?php echo $form->error($news, 'img_title'); ?>
                            <p><br/></p><p><br/><br/></p>
                            <label for="News_delpic">Удалить картинку</label>
                            <input type="hidden" name="News[delpic]" value="0" id="ytNews_delpic">
                            <input type="checkbox" value="1" id="News_delpic" name="News[delpic]">
                            </fieldset>
                                
                                <fieldset>
                                
                            <?php echo $form->labelEx($news, 'text'); ?>
                                <br /><br />
                            <?php echo $form->textArea($news, 'text', array('id'=>'editor-text')); ?>
                                <br /><br />
                            <?php echo $form->error($news, 'text'); ?>
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