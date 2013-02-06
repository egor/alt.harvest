<?php
/**
 * EditFieldsController управление редактируемыми полями
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package backEnd
 */
class EditFieldsController extends Controller
{
	public function actionIndex()
	{

            if (isset($_POST['yt1'])) {
                $model = EditFields::model()->findAll();
                foreach ($model as $value) {
                    EditFields::model()->updateByPk($value->id,array('value'=>$_POST[$value->id]));
                }
            }
            $model = EditFields::model()->findAll(array('order'=>'position'));            
            $this->render('index', array ('model' => $model));
	}
}