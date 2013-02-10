<?php
/*
    $this->widget('zii.widgets.CMenu',
            array('items'=>$items, 
                'id'=>'leftMenuList',                 
                )
            );  */
if ($main->in_menu){
    echo '<ul class="left-menu-blog">';
        $count = 0;
           foreach ($items as $value) {
                $count++;
                echo '<li class="'.($count%2 != 0? 'left':'right').'"><a href="/'.$value->url.'">'.(!empty($value->img)? '<img class="left_blog_img" src="/images/pages/'.$value->img.'" />':'').
                        '<span>'.$value->menu_name.'</span></a></li>';
            }
    echo '</ul>';
}
?>