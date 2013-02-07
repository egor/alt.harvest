<?php
/**
 * RightBannersWidget
 *
 * Вывод баннеров в правой колонке
 * 
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @package frontEnd
 */

class RightBannersWidget extends CWidget
{
    public function init()
    {
        $model = Banners::model()->findAll('visibility=1', array('order' => 'position DESC'));
        $this->render('rightBannersWidget',array('banners' => $model));
    }
 

}

?>
