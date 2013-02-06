<?php
/**
 * NewsController
 * 
 * Вывод списка и подробного описания новостей
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 * 
 */
class NewsController extends Controller {

    /**
     * Главная страница новостей
     */
    public function actionIndex() {
        $newsData = Pages::model()->findByPk(Yii::app()->params['modules']['news']);
        $newsCount = News::model()->count('visibility=:visibility', array(':visibility' => 1));        
        $paginator=new CPagination($newsCount);        
        $setting = Settings::model()->findByPk(1);
        $paginator->pageSize = $setting->value;
        $paginator->route = '/'.$newsData->url;
        $countPage = ceil($newsCount/$setting->value);
        if (isset($_GET['page'])) {
            $start = ((int)($_GET['page'])-1)*$paginator->pageSize;
        } else {
            $start = 0;
        }
        $this->pageTitle=$newsData->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords',$newsData->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords',$newsData->meta_description);
        $model = News::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT '.$start.', '.$setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'newsData' => $newsData, 'paginator' => $paginator, 'countPage'=>$countPage));
    }

    /**
     * Новость подробно
     */
    public function actionDetail($id = 0) {
        $newsData = Pages::model()->findByPk(Yii::app()->params['modules']['news']);
        $model = News::model()->findByPk($id);
        $this->render('detail', array('model' => $model, 'newsData' => $newsData));
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