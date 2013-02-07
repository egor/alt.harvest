<?php
/**
 * VideoTipsController
 * Модуль "Видео советы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class VideoTipsController extends Controller {

    /**
     * Список советов
     */
    public function actionIndex() {
        $videoTipsData = Pages::model()->findByPk(Yii::app()->params['modules']['videoTips']);
        $videoTipsCount = VideoTips::model()->count('visibility=:visibility', array(':visibility' => 1));
        $paginator = new CPagination($videoTipsCount);
        $setting = Settings::model()->findByPk(5);
        $paginator->pageSize = $setting->value;
        $paginator->route = '/' . $videoTipsData->url;
        $countPage = ceil($videoTipsCount / $setting->value);
        if (isset($_GET['page'])) {
            $start = ((int) ($_GET['page']) - 1) * $paginator->pageSize;
        } else {
            $start = 0;
        }
        $this->pageTitle = $videoTipsData->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $videoTipsData->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $videoTipsData->meta_description);
        $model = VideoTips::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT ' . $start . ', ' . $setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'videoTipsData' => $videoTipsData, 'paginator' => $paginator, 'countPage' => $countPage, 'settingValue' => $setting->value));
    }
}