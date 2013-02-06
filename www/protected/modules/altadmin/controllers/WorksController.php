<?php
/**
 * WorksController
 * 
 * Добавлнеие, редактирование и удаление записей "Наши работы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.1
 * @package backEnd
 */
class WorksController extends Controller {

    /**
     * Выводит список всех работ
     */
    public function actionIndex() {
        $model = Works::model()->findAll(array('order' => 'position DESC'));
        $this->render('index', array('model' => $model));
    }

    /**
     * Добавление записи
     * 
     * После добавления редирект на редактирование
     */
    public function actionAdd() {

        $maxOrderNumber = Yii::app()->db->createCommand()
                ->select('max(position) as max')
                ->from('works')
                ->queryScalar();

        $model = new Works;
        $model->date = time();
        $model->position = $maxOrderNumber + 1;
        $model->save();
        if (isset($model->works_id)) {
            Yii::app()->request->redirect('/altadmin/works/edit/' . $model->works_id);
        }
    }

    public function actionEdit($id = 0) {
        $this->pageTitle = 'Редактирование работы | CMS ALTADMIN';
        $model = Works::model()->findByPk($id);
        $model->scenario = 'edit';
        $img = $model->img;
        $img_big = $model->img_big;
        if (isset($_POST['Works'])) {
            $model->attributes = $_POST['Works'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {

                $file = CUploadedFile::getInstance($model, 'img');
                if (!empty($file->name)) {
                    if (!empty($img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/works/' . $img)) {
                        unlink(Yii::getPathOfAlias('webroot') . '/images/works/' . $img);
                    }
                    $model->img = $id . '_' . $file->name;
                    $file->saveAs(Yii::getPathOfAlias('webroot') . '/images/works/' . $model->img);
                } else {
                    $model->img = $img;
                }


                //удаляем картинку, если установлена галочка
                if (isset($_POST['Works']['delpicS']) && $_POST['Works']['delpicS'] == 1) {
                    $this->deleteSmallPic($id);
                    $model->img = '';
                }
                
                $fileBig = CUploadedFile::getInstance($model, 'img_big');

                if (!empty($fileBig->name)) {
                    if (!empty($img_big) && file_exists(Yii::getPathOfAlias('webroot') . '/images/works/big/' . $img_big)) {
                        unlink(Yii::getPathOfAlias('webroot') . '/images/works/big/' . $img_big);
                    }
                    $model->img_big = $id . '_' . $fileBig->name;
                    $fileBig->saveAs(Yii::getPathOfAlias('webroot') . '/images/works/big/' . $model->img_big);
                } else {
                    $model->img_big = $img_big;
                }
                //удаляем картинку, если установлена галочка
                if (isset($_POST['Works']['delpicB']) && $_POST['Works']['delpicB'] == 1) {
                    $this->deleteBigPic($id);
                    $model->img_big = '';
                }

                if (!isset($_POST['yt0'])) {
                    $model->save();
                    Yii::app()->user->setFlash('success', "Работа отредактирована");
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/works/');
                } else {
                    Yii::app()->request->redirect('/altadmin/works/edit/' . $model->works_id);
                }
                return;
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id = 0) {
        if (!empty($id)) {
            $this->deleteSmallPic($id);
            $this->deleteBigPic($id);
            Works::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Работа удален");
            Yii::app()->request->redirect('/altadmin/works/');
        } else {
            Yii::app()->user->setFlash('err', "Упс...");
        }
    }

    /**
     * Удаляет большую картинку
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     */
    public function deleteBigPic($id) {
        $model = Works::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/works/big/' . $model->img_big)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/works/big/' . $model->img_big);
        }
        Works::model()->updateByPk($id, array('img_big'=>''));
        return true;
    }
    
    /**
     * Удаляет маленькую картинку
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     */
    public function deleteSmallPic($id) {
        $model = Works::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/works/' . $model->img)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/works/' . $model->img);
        }
        Works::model()->updateByPk($id, array('img'=>''));
        return true;
    }
    /*Не используется*/
    public function actionChangeOrder() {
        // ('UPDATE notes SET note_order=:note_order WHERE id=:id');
        //преобразовываем строку в JSON формате в массив объектов
        $data = json_decode($_POST['neworder']);
        if (null == $data) {
            
        }
        //обновляем записи
        foreach ($data as $note) {
            $model = Works::model()->updateByPk(substr($note->id, 5), array('position' => ($note->order + 1)));
        }
        //отправляем отчет браузеру
        echo json_encode(array('status' => 'OK'));
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