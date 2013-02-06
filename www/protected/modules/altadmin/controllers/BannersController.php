<?php
/**
 * BannersController
 * 
 * Управление баннерами. Создание, удаление, редактирование
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package backEnd
 */
class BannersController extends Controller
{
	public function actionIndex() {

        $model = Banners::model()->findAll(array('order' => 'position DESC'));

        $this->render('index', array('model' => $model));
    }

    public function actionAdd() {
        
        $maxOrderNumber = Yii::app()->db->createCommand()
  ->select('max(position) as max')
  ->from('banners')
  ->queryScalar();

$model = new Banners;
        
        $model->position=$maxOrderNumber+1;
        $model->save();
        if (isset($model->banners_id)) {
            Yii::app()->request->redirect('/altadmin/banners/edit/' . $model->banners_id);
        }
    }

    public function actionEdit($id = 0) {        
        $this->pageTitle = 'Редактирование работы | CMS ALTADMIN';
        $model = Banners::model()->findByPk($id);
        $model->scenario='edit';
        $img = $model->img;
        
        if (isset($_POST['Banners'])) {
            $model->attributes = $_POST['Banners'];
            if ($model->validate()) {
                
                $file = CUploadedFile::getInstance($model, 'img');                
                if (!empty($file->name)) {
                    if (!empty($img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/banners/'.$img)){
                        unlink(Yii::getPathOfAlias('webroot') . '/images/banners/'.$img);
                    }
                    $model->img = $id . '_' . $file->name;
                    $file->saveAs(Yii::getPathOfAlias('webroot') . '/images/banners/' . $model->img);
                } else {
                    $model->img = $img;
                }

                
                
                
                if (!isset($_POST['yt0'])) {
                    $model->save();
                    Yii::app()->user->setFlash('success', "Работа отредактирована");
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/banners/');
                } else {
                    Yii::app()->request->redirect('/altadmin/banners/edit/' . $model->banners_id);
                }
                return;
            }
        }
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id = 0) {
        if (!empty($id)) {
            Banners::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Работа удален");
            Yii::app()->request->redirect('/altadmin/banners/');
        } else {
            Yii::app()->user->setFlash('err', "Упс...");
        }
    }

    public function actionChangeOrder() {        
        // ('UPDATE notes SET note_order=:note_order WHERE id=:id');
	//преобразовываем строку в JSON формате в массив объектов
	$data = json_decode($_POST['neworder']);
	if (null == $data) {
		
	}
	//обновляем записи
	foreach ($data as $note) {
            $model = Banners::model()->updateByPk(substr($note->id, 5), array('position'=>($note->order+1)));
	}
	//отправляем отчет браузеру
	echo json_encode(array('status'=>'OK'));


    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}