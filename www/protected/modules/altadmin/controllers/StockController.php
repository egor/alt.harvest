<?php
/**
 * StockController
 * 
 * Добавлнеие, редактирование и удаление записей "Акции"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package backEnd
 */
class StockController extends Controller
{
	/**
     * Выводит список всех работ
     */
    public function actionIndex() {
        $model = Stock::model()->findAll(array('order' => 'date DESC'));
        $this->render('index', array('model' => $model));
    }

    /**
     * Добавление записи
     * 
     * После добавления редирект на редактирование
     */
    public function actionAdd() {        
        $model = new Stock;
        $model->date = time();
        $model->end_date = time();
        $model->save();
        if (isset($model->stock_id)) {
            Yii::app()->request->redirect('/altadmin/stock/edit/' . $model->stock_id);
        }
    }

    public function actionEdit($id = 0) {
        $this->pageTitle = 'Редактирование акции | CMS ALTADMIN';
        $model = Stock::model()->findByPk($id);
        $model->scenario = 'edit';
        $img = $model->img;
        if (isset($_POST['Stock'])) {
            $model->attributes = $_POST['Stock'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            $model->end_date = DateOperations::dateToUnixTime($model->end_date);
            if ($model->validate()) {

                $file = CUploadedFile::getInstance($model, 'img');
                if (!empty($file->name)) {
                    if (!empty($img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/stock/' . $img)) {
                        unlink(Yii::getPathOfAlias('webroot') . '/images/stock/' . $img);
                    }
                    $model->img = $id . '_' . $file->name;
                    $file->saveAs(Yii::getPathOfAlias('webroot') . '/images/stock/' . $model->img);
                } else {
                    $model->img = $img;
                }


                //удаляем картинку, если установлена галочка
                if (isset($_POST['Stock']['delpic']) && $_POST['Stock']['delpic'] == 1) {
                    $this->deletePic($id);
                    $model->img = '';
                }
                                
                if (!isset($_POST['yt0'])) {
                    $model->save();
                    Yii::app()->user->setFlash('success', "Акция отредактирована");
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/stock/');
                } else {
                    Yii::app()->request->redirect('/altadmin/stock/edit/' . $model->stock_id);
                }
                return;
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $model->end_date = date('d.m.Y', $model->end_date);
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id = 0) {
        if (!empty($id)) {
            $this->deletePic($id);
            Stock::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Акция удален");
            Yii::app()->request->redirect('/altadmin/stock/');
        } else {
            Yii::app()->user->setFlash('err', "Упс... Что-то пошло не так! Попробуйте еще раз.");
        }
    }

    /**
     * Удаляет картинку фон
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     */
    public function deletePic($id) {
        $model = Stock::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/stock/' . $model->img)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/stock/' . $model->img);
        }
        Stock::model()->updateByPk($id, array('img'=>''));
        return true;
    }
    
    /**
     * Настройки модуля "Акции"
     * @return type
     */
    public function actionSettings() {
        $id = Yii::app()->params['modules']['stock'];
        $model = Pages::model()->findByPk($id);
        $modelSettings['numPage'] = Settings::model()->findByPk(7);

        $this->pageTitle = 'Настройка модуля акции | CMS ALTADMIN';
        if (isset($_POST['Pages']) || isset($_POST['Settings'])) {
            $model->attributes = $_POST['Pages'];
            $modelSettings['numPage']->attributes = $_POST['Settings'];
            $modelSettings['numPage']->attributes = (int)$modelSettings['numPage']->attributes;
            $modelSettings['numPage']->save();
            $u = Pages::model()->find('url="' . $model->url . '" AND pages_id!="' . $id . '"');
            if (!empty($u->pages_id)) {
                $model->addError('url', 'url уже занят');
                $this->render('settings', array('settings' => $model));
                return;
            }
            if (empty($model->url)){
                $model->addError('url', 'url не может быть пустым');
                $this->render('settings', array('settings' => $model));
                return;            
            }
            Yii::app()->user->setFlash('success', "Настройки сохранены");
            if (!isset($_POST['yt0'])) {
                $model->saveNode();
            }
            if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                Yii::app()->request->redirect('/altadmin/stock/');
            } elseif (isset($_POST['yt1'])) {
                Yii::app()->request->redirect('/altadmin/stock/settings/');
            }   
        }
        $this->render('settings', array('settings' => $model, 'paginator' => $modelSettings['numPage']));
    }
}