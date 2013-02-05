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
        $this->render('main', array('model'=>$model));
    }

    public function actionDetail($id = 0) {
        if ($id == $id = Yii::app()->params['modules']['zayavka']) {
            SendForm::sendSmallForm();
        }
        //echo $id;
        //var_dump($_GET); die;
        $model = Pages::model()->findByPk($id);
        $this->pageTitle = $model->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $model->meta_description);

        $this->render('detail', array('model' => $model));
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