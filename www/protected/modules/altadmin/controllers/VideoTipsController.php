<?php
/**
 * VideoTipsController
 * 
 * Добавлнеие, редактирование и удаление записей "Видео советы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package backEnd
 */
class VideoTipsController extends Controller {

    /**
     * Выводит список всех советов
     */
    public function actionIndex() {
        $model = VideoTips::model()->findAll(array('order' => 'date DESC'));
        $this->render('index', array('model' => $model));
    }

    /**
     * Добавление записи
     * 
     * После добавления редирект на редактирование
     */
    public function actionAdd() {
        $model = new VideoTips;
        $model->date = time();
        $model->save();
        if (isset($model->video_tips_id)) {
            Yii::app()->request->redirect('/altadmin/videoTips/edit/' . $model->video_tips_id);
        } else {
            Yii::app()->user->setFlash('err', "Упс... Что-то пошло не так! Попробуйте еще раз.");
            Yii::app()->request->redirect('/altadmin/videoTips/');
        }
    }

    public function actionEdit($id = 0) {
        $this->pageTitle = 'Редактирование видео совета | CMS ALTADMIN';
        $model = VideoTips::model()->findByPk($id);
        $model->scenario = 'edit';
        if (isset($_POST['VideoTips'])) {
            $model->attributes = $_POST['VideoTips'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {
                if (!isset($_POST['yt0'])) {
                    $model->save();
                    Yii::app()->user->setFlash('success', "Совет отредактирован");
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/videoTips/');
                } else {
                    Yii::app()->request->redirect('/altadmin/videoTips/edit/' . $model->videoTips_id);
                }
                return;
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('edit', array('model' => $model));
    }

    /**
     * Удаление записи
     * @param type $id - id удаляемой записи
     */
    public function actionDelete($id = 0) {
        if (!empty($id)) {
            VideoTips::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Совет удален");
            Yii::app()->request->redirect('/altadmin/videoTips/');
        } else {
            Yii::app()->user->setFlash('err', "Упс... Что-то пошло не так! Попробуйте еще раз.");
        }
    }
    
    /**
     * Настройки модуля "Видео советы"
     * @return type
     */
    public function actionSettings() {
        $id = Yii::app()->params['modules']['videoTips'];
        $model = Pages::model()->findByPk($id);
        $modelSettings['numPage'] = Settings::model()->findByPk(5);

        $this->pageTitle = 'Настройка модуля советов | CMS ALTADMIN';
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
                Yii::app()->request->redirect('/altadmin/videoTips/');
            } elseif (isset($_POST['yt1'])) {
                Yii::app()->request->redirect('/altadmin/videoTips/settings/');
            }   
        }
        $this->render('settings', array('settings' => $model, 'paginator' => $modelSettings['numPage']));
    }
}