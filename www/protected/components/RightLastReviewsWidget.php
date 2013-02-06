<?php
/**
 * Description
 *
 * @author Egor Rihnov <egor.developer@gmail.com>
 */
class RightLastReviewsWidget extends CWidget
{
    public function init()
    {
        $count = EditFields::model()->findByPk(46);
        $reviewsData = Pages::model()->findByPk(Yii::app()->params['modules']['reviews']);
        $subModels = Reviews::model()->findAll('visibility=:visibility ORDER BY date DESC LIMIT '.$count->value.'', array(':visibility'=>1));
        $this->render('rightLastReviewsWidget',array('items' => $subModels, 'reviewsData'=>$reviewsData));
    } 
}