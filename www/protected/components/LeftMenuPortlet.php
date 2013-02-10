<?php
/**
 * Description of MainHeaderPortlet
 *
 * @author egorik
 */

Yii::import('zii.widgets.CPortlet');

class LeftMenuPortlet extends CPortlet
{
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $models = Pages::model()->findAll('visibility=:visibility AND level=:level AND pages_id!=33 AND pages_id!=85 AND in_menu=:in_menu ORDER BY lft', array(':visibility'=>1, ':level'=>1, ':in_menu'=>1));
        $items = array();
        $counts = count($models);
        $count = 0;
        $sUrl = explode('/', Yii::app()->request->url);
        foreach($models as $model) {
            $subModels = Pages::model()->findAll('visibility=:visibility AND level=:level AND in_menu=:in_menu AND root=:root ORDER BY lft', array(':visibility'=>1, ':level'=>2,  ':in_menu'=>1, ':root'=>$model->pages_id));            
            $subItem = array();
            foreach($subModels as $subModel) {
                
                $subItem[] = array('label' => $subModel->menu_name, 
                    'url' =>  '/' . $subModel->url,
                    //'itemOptions'=>array('class'=> ($count==1?('first'):($count == $counts ? 'last':''))), 
                    'active'=>(in_array($subModel->url, $sUrl)?'true':''));
                $subItem[] = array('label' => '', 
                    'itemOptions'=>array('class'=> 'left-menu-li-hr'), 
                    );

            }

            $count++;            
            $items[] = array('label' => $model->menu_name, 
                //'url' =>  '/' . ($model->url == 'main'? '':$model->url . '/'),                 
                'itemOptions'=>array('class'=> ($count==1?('first'):($count == $counts ? 'last':'inner'))), 
                'active'=>'',                 
                    'items' =>$subItem,// array($subItem),
                );
            
            
        }
        $this->render('leftMenuPortlet', array('items' => $items));
    }
}

?>
