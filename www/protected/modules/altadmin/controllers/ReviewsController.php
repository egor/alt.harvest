<?php
/**
 * ReviewsController Контроллер отзывов
 * 
 * Добавление, редактирование и удаление отзывов
 * 
 * @author Egor Rihnov <egor.developer@email.com>
 * @version 1.1
 * @package backEnd
 */
class ReviewsController extends Controller {

    /**
     * Список записей
     */
    public function actionIndex() {
        $this->pageTitle = 'Список отзывов | CMS ALTADMIN';
        $model = Reviews::model()->findAll(array('order' => 'date DESC'));
        $this->render('index', array('model' => $model));
    }

    /**
     * Добавление записи
     * Добавляеться пустая запись, после чего переадресуем на редактирование
     */
    public function actionAdd() {
        $maxOrderNumber = Yii::app()->db->createCommand()
                ->select('max(position) as max')
                ->from('reviews')
                ->queryScalar();

        $model = new Reviews;
        $model->position = $maxOrderNumber + 1;
        $model->date = time();
        $model->save();
        if (isset($model->reviews_id)) {
            Yii::app()->request->redirect('/altadmin/reviews/edit/' . $model->reviews_id);
        }
    }

    /**
     * Редактирование записи
     * 
     * @param int $id - id редактируемой записи
     * @return type
     */
    public function actionEdit($id = 0) {
        $this->pageTitle = 'Редактирование отзыва | CMS ALTADMIN';
        $model = Reviews::model()->findByPk($id);
        $model->scenario = 'edit';
        $img = $model->img;
        if (isset($_POST['Reviews'])) {
            $model->attributes = $_POST['Reviews'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {
                $file = CUploadedFile::getInstance($model, 'img');
                if (!empty($file->name)) {
                    if (!empty($img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/reviews/' . $img)) {
                        unlink(Yii::getPathOfAlias('webroot') . '/images/reviews/' . $img);
                    }
                    $model->img = $id . '_' . $file->name;
                    $file->saveAs(Yii::getPathOfAlias('webroot') . '/images/reviews/' . $model->img);
                } else {
                    $model->img = $img;
                }
                if (isset($_POST['Reviews']['delpic']) && $_POST['Reviews']['delpic'] == 1) {
                    $this->deletePic($id);
                    $model->img = '';
                }

                Yii::app()->user->setFlash('success', "Отзыв отредактирован");
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/reviews/');
                } else {
                    Yii::app()->request->redirect('/altadmin/reviews/edit/' . $model->reviews_id);
                }
                return;
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('edit', array('model' => $model));
    }

    /**
     * Удаляем запись
     * 
     * @param int $id - id удаляемой записи
     */
    public function actionDelete($id = 0) {
        if (!empty($id)) {
            $this->deletePic($id);
            Reviews::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Отзыв удален");
            Yii::app()->request->redirect('/altadmin/reviews/');
        } else {
            $this->render('error', array('text' => 'Упс...'));
        }
    }
    
    /**
     * Удаляет картинку
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     
    public function deletePic($id) {
        $model = News::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/' . $model->img)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/news/' . $model->img);
        }
        return true;
    }*/
    /**
     * Удаляет картинку
     * 
     * @param int $id - id записи у которой нужно удалить картинку
     * @return boolean
     */
    public function deletePic($id) {
        $model = Reviews::model()->findByPk($id);
        if (!empty($model->img) && file_exists(Yii::getPathOfAlias('webroot') . '/images/reviews/' . $model->img)) {
            unlink(Yii::getPathOfAlias('webroot') . '/images/reviews/' . $model->img);
        }
        return true;
    }

     /**
     * Настройки модуля "Отзывы"
     * @return type
     */
    public function actionSettings() {
        $id = Yii::app()->params['modules']['reviews'];
        $model = Pages::model()->findByPk($id);
        $modelSettings['numPage'] = Settings::model()->findByPk(4);

        $this->pageTitle = 'Настройка модуля отзывы | CMS ALTADMIN';
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
                Yii::app()->request->redirect('/altadmin/reviews/');
            } elseif (isset($_POST['yt1'])) {
                Yii::app()->request->redirect('/altadmin/reviews/settings/');
            }   
        }
        $this->render('settings', array('settings' => $model, 'paginator' => $modelSettings['numPage']));
    }
    
    
    
    
    
    /* сортировка, пока не используется, т.к. оказалось, что сортировка будет по дате*/
    public function actionChangeOrder() {
        $data = json_decode($_POST['neworder']);
        if (null == $data) {
            
        }
        //обновляем записи
        foreach ($data as $note) {
            $model = Reviews::model()->updateByPk(substr($note->id, 5), array('position' => ($note->order + 1)));
        }
        //отправляем отчет браузеру
        echo json_encode(array('status' => 'OK'));
    }
}