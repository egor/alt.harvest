<?php
/**
 * WorksController
 * Модуль "Наши работы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class WorksController extends Controller {

    /**
     * Список работ
     */
    public function actionIndex() {
        $worksData = Pages::model()->findByPk(Yii::app()->params['modules']['works']);
        $worksCount = Reviews::model()->count('visibility=:visibility', array(':visibility' => 1));
        $paginator = new CPagination($worksCount);
        $setting = Settings::model()->findByPk(6);
        $paginator->pageSize = $setting->value;
        $paginator->route = '/' . $worksData->url;
        $countPage = ceil($worksCount / $setting->value);
        if (isset($_GET['page'])) {
            $start = ((int) ($_GET['page']) - 1) * $paginator->pageSize;
        } else {
            $start = 0;
        }
        $this->pageTitle = $worksData->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $worksData->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $worksData->meta_description);
        $model = Works::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT ' . $start . ', ' . $setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'worksData' => $worksData, 'paginator' => $paginator, 'countPage' => $countPage, 'settingValue' => $setting->value));
    }
}