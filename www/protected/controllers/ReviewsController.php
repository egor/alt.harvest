<?php

class ReviewsController extends Controller {

    public function actionIndex() {
        $reviewsData = Pages::model()->findByPk(Yii::app()->params['modules']['reviews']);
        $reviewsCount = Reviews::model()->count('visibility=:visibility', array(':visibility' => 1));
        $paginator = new CPagination($reviewsCount);
        $setting = Settings::model()->findByPk(4);
        $paginator->pageSize = $setting->value;
        $paginator->route = '/' . $reviewsData->url;
        $countPage = ceil($reviewsCount / $setting->value);
        if (isset($_GET['page'])) {
            $start = ((int) ($_GET['page']) - 1) * $paginator->pageSize;
        } else {
            $start = 0;
        }
        $this->pageTitle = $reviewsData->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $reviewsData->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $reviewsData->meta_description);
        $model = Reviews::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT ' . $start . ', ' . $setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'reviewsData' => $reviewsData, 'paginator' => $paginator, 'countPage' => $countPage, 'settingValue'=>$setting->value));
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