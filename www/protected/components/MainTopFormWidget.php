<?php
/**
 * Description of MainHeaderPortlet
 *
 * @author egorik
 */

class MainTopFormWidget extends CWidget
{
    public $footer = 0;
    public function init()
    {

        $model = Stock::model()->findAll('visibility=:visibility AND in_main=:in_main ORDER BY `date` DESC', array(':visibility' => 1, ':in_main'=>1));
        $this->render('mainTopFormWidget',array('model' => $model));
    }
 

}

?>
