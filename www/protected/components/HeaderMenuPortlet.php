<?php
/**
 * Description of MainHeaderPortlet
 *
 * @author egorik
 */

Yii::import('zii.widgets.CPortlet');

class HeaderMenuPortlet extends CPortlet
{
    public $footer = 0;
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $models = Pages::model()->findAll('visibility=:visibility AND level=:level AND root=:root AND pages_id!=:pages_id AND in_menu=:in_menu ORDER BY lft', array(':visibility'=>1, ':level'=>2, ':root'=>33,  ':pages_id'=>33, ':in_menu'=>1));
        $items = array();
        $counts = count($models);
        $count = 0;
        foreach($models as $model) {
            $count++;
            $items[] = array('label' => $model->menu_name, 
                'url' =>  '/' . ($model->url == 'main'? '':$model->url . '/'),                 
                'itemOptions'=>array('class'=> ($count==1?('first'):($count == $counts ? 'last':''))), 
                'active'=>'');
            
        }
        if ($this->footer == 1) {
            $this->render('footerMenuPortlet', array('items' => $items));
        } else {
            $this->render('headerMenuPortlet', array('items' => $items));
        }
    }
}

?>
