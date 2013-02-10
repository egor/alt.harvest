<?php
/**
 * ReviewsController
 * Модуль "Отзывы"
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */
class StockController extends Controller
{
	/**
     * Список наших работ
     */
    public function actionIndex() {
        $stockData = Pages::model()->findByPk(Yii::app()->params['modules']['stock']);
        $stockCount = Stock::model()->count('visibility=:visibility', array(':visibility' => 1));
        $paginator = new CPagination($stockCount);
        $setting = Settings::model()->findByPk(7);
        $paginator->pageSize = $setting->value;
        $paginator->route = '/' . $stockData->url;
        $countPage = ceil($stockCount / $setting->value);
        if (isset($_GET['page'])) {
            $start = ((int) ($_GET['page']) - 1) * $paginator->pageSize;
        } else {
            $start = 0;
        }
        $this->pageTitle = $stockData->meta_title;
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $stockData->meta_keywords);
        Yii::app()->clientScript->registerMetaTag('meta_keywords', $stockData->meta_description);
        $model = Stock::model()->findAll('visibility=:visibility ORDER BY `date` DESC LIMIT ' . $start . ', ' . $setting->value, array(':visibility' => 1));
        $this->render('index', array('model' => $model, 'stockData' => $stockData, 'paginator' => $paginator, 'countPage' => $countPage, 'settingValue'=>$setting->value));
    }
}