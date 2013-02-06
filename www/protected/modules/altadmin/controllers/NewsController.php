<?php
/**
 * News управление новостями
 * 
 * Действия класс. Вывод списка новостей, редактирование, удаление, добавление
 * Настройка отображения новостей и метатегов главной страницы "Новости"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package backEnd
 */
class NewsController extends Controller {

   /**
    * Вывод списка новостей
    */
    public function actionIndex() {
        $this->pageTitle = 'Список новостей | CMS ALTADMIN';
        $news = News::model()->findAll(array('order' => 'date DESC'));
        $this->render('index', array('news' => $news));
    }

    /**
     * Добавлние новости.
     * После добавления переадресует на редактирование этой записи
     */
    public function actionAdd() {
        $news = new News;
        $news->date = time();
        $news->save();
        if (isset($news->news_id)) {
            Yii::app()->request->redirect('/altadmin/news/edit/' . $news->news_id);
        }
    }

    /**
     * Редактирование новости
     * 
     * @param type $id id новости
     * @return action
     */
    public function actionEdit($id = 0) {
        // = $_GET['id'];
        $this->pageTitle = 'Редактирование новости | CMS ALTADMIN';
        $model = News::model()->findByPk($id);
        $model->scenario = 'edit';
        $img = $model->img;
        //echo     Yii::getPathOfAlias('webroot') ;
        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {
                $file = CUploadedFile::getInstance($model, 'img');
                if (!empty($file->name)) {
                    if (!empty($img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/' . $img)) {
                        unlink(Yii::getPathOfAlias('webroot') . '/images/news/' . $img);
                    }
                    $model->img = $id . '_' . $file->name;
                    $file->saveAs(Yii::getPathOfAlias('webroot') . '/images/news/' . $model->img);
                } else {
                    $model->img = $img;
                }
                
                //удаляем картинку, если установлена галочка
                if (isset($_POST['Reviews']['delpic']) && $_POST['Reviews']['delpic'] == 1) {
                    $this->deletePic($id);
                    $model->img = '';
                }
                
                $u = News::model()->find('url="' . $model->url . '" AND news_id!="' . $id . '"');
                if (!empty($u->news_id)) {
                    $model->date = date('d.m.Y', $model->date);
                    $model->addError('url', 'url уже занят');
                    $this->render('edit', array('news' => $model));
                    return;
                }

                //sreturn $model;
                Yii::app()->user->setFlash('success', "Новость отредактирована");
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/news/');
                } else {
                    Yii::app()->request->redirect('/altadmin/news/edit/' . $model->news_id);
                }
                // form inputs are valid, do something here
                return;
            }
        }
        $model->date = date('d.m.Y', $model->date);
        //$this->render('edit');
        //$this->render('_form',array('model'=>$model));
        $this->render('edit', array('news' => $model));
    }

    /**
     * Удалнеи новости
     * @param type $id - id новости
     */
    public function actionDelete($id = 0) {
        if (!empty($id)) {
            News::model()->deleteByPk($id);
            News::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Новость удалена");
            Yii::app()->request->redirect('/altadmin/news/');
        } else {
            $this->render('error', array('text' => 'Нет такой новости'));
        }
    }

    /**
     * Настройки модуля новости
     * @return type
     */
    public function actionSettings() {
        
        // = $_GET['id'];
        $id = Yii::app()->params['modules']['news'];
        $model = Pages::model()->findByPk($id);
        $modelSettings['numPage'] = Settings::model()->findByPk(1);

        $this->pageTitle = 'Настройка модуля новости | CMS ALTADMIN';
        //if (isset($_POST['News'])) {
        //}  
        //var_dump($_POST['Pages']);
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
        //sreturn $model;
        Yii::app()->user->setFlash('success', "Настройки сохранены");
        if (!isset($_POST['yt0'])) {
            $model->saveNode();
        }
        if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
            Yii::app()->request->redirect('/altadmin/news/');
        } elseif (isset($_POST['yt1'])) {
            Yii::app()->request->redirect('/altadmin/news/settings/');
        }
}

        $this->render('settings', array('settings' => $model, 'paginator' => $modelSettings['numPage']));
    }
    
    /**
     * Удаляет картинку
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     */
    public function deletePic($id) {
        $model = News::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/' . $model->img)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/news/' . $model->img);
        }
        return true;
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