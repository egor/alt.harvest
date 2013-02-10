<?php

class PagesController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Главная страница
     */
    public function actionMain() {
        $model = Pages::model()->findByPk(Yii::app()->params['modules']['mainPage']);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_description);
        $this->render('main', array('model' => $model));
    }

    public function actionDetail($id = 0) {
        if ($id == Yii::app()->params['modules']['zayavka']) {
            SendForm::sendSmallForm();
        }

        //echo $id;
        //var_dump($_GET); die;
        $model = Pages::model()->findByPk($id);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_description);
        if ($id == Yii::app()->params['modules']['sitemap']) {
            $this->render('sitemap', array('model' => $model));
            return true;
        }
        $items=$model->children()->findAll('visibility=:visibility', array(':visibility' => 1));
        //$items = Pages::model()->findAll('visibility=:visibility AND root=:root ORDER BY lft', array(':visibility' => 1, ':root' => $id));
        $this->render('detail', array('model' => $model, 'items' => $items));
    }


    public function action404() {
        $model = Pages::model()->findByPk(Yii::app()->params['modules']['404']);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_description);
        $this->render('404', array('model' => $model));
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