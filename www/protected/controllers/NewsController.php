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
        Yii::app()->clientScript->registerMetaTag($newsData->meta_keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($newsData->meta_description, 'description');
        $model = News::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT '.$start.', '.$setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'newsData' => $newsData, 'paginator' => $paginator, 'countPage'=>$countPage, 'settingValue'=>$setting->value));
    }

    /**
     * Новость подробно
     */
    public function actionDetail($id = 0) {
        $newsData = Pages::model()->findByPk(Yii::app()->params['modules']['news']);
        $model = News::model()->findByPk($id);
        $this->render('detail', array('model' => $model, 'newsData' => $newsData));
    }
}