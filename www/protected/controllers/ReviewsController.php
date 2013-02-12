<?php
/**
 * ReviewsController
 * Модуль "Отзывы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class ReviewsController extends Controller {

    /**
     * Список наших работ
     */
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
        Yii::app()->clientScript->registerMetaTag($reviewsData->meta_keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($reviewsData->meta_description, 'description');
        $model = Reviews::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT ' . $start . ', ' . $setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'reviewsData' => $reviewsData, 'paginator' => $paginator, 'countPage' => $countPage, 'settingValue'=>$setting->value));
    }
}