<?php
/**
 * Description of MainHeaderPortlet
 *
 * @author egorik
 */

Yii::import('zii.widgets.CPortlet');

class HeaderContactsMenuPortlet extends CPortlet
{
    public $footer = 0;
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        //$topMenus = Pages::model()->findAll('root=:root AND level=:level', array(':root'=>Yii::app()->params['modules']['contacts'], ':level'=>3));
        //var_dump($topMenus); die;
        $contacts = Pages::model()->findByPk(Yii::app()->params['modules']['contacts']);
        $topMenus=$contacts->children()->findAll();
        $items = array();
        $counts = count($topMenus);
        $count = 0;
        $sUrl = explode('/', Yii::app()->request->url);
        foreach($topMenus as $model) {            
            $count++;
            $items[] = array('label' => $model->menu_name, 
                'url' =>  '/'.$contacts->url .'/'. ($model->url == 'main'? '':$model->url . '/'),                 
                'itemOptions'=>array('class'=> ($count==1?('first'):($count == $counts ? 'last':''))), 
                'active'=>(in_array($model->url, $sUrl)?'true':''));
            if ($count != $counts) {
            $items[] = array('label' => '', 
                                 
                'itemOptions'=>array('class'=> 'deli'), 
                );
            }
        }
        //var_dump($topMenus); die;
        $this->render('headerContactsMenuPortlet', array('items' => $items));
        
    }
}

?>
