<?php
/* @var $this PagesController */
$this->breadcrumbs = array(
    $model->menu_name,
);
?>
<h1  class="main_h1"><?php echo $model->h1; ?></h1>
<div class="sitemap">
    <?php
    echo $model->text;
    $url = '';
    $categories = Pages::model()->findAll(array('condition' => 'level>1', 'order' => 'root,lft'));
    $level = 0;
    $oldLevel = 2;
    foreach ($categories as $n => $category) {

        if ($category->visibility != 1) {
            $oldLevel = $category->level;
        }
        if ($category->visibility == 1 && $oldLevel >= $category->level) {
            $oldLevel = $category->level + 1;
        }
        if ($category->visibility == 1 && $oldLevel >= $category->level) {
            if ($category->level == $level) {
                echo CHtml::closeTag('li') . "\n";
            } else if ($category->level > $level) {
                echo CHtml::openTag('ul') . "\n";
            } else {
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $category->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }
            echo CHtml::openTag('li', array('id' => 'node_' . $category->pages_id, 'rel' => $category->menu_name));
            $s = 0;
            if ($category->level == 2) {
                $url = '/' . $category->url;
            } else {
                $u = Pages::model()->findByPk($category->pages_id);
                $parent = $category->ancestors()->findAll();
                $url = '';
                foreach ($parent as $value) {
                    if ($value->level > 1) {
                        $url = $url . '/' . $value->url;
                    }
                }
                $url .= '/' . $category->url;
            }
            echo CHtml::openTag('a', array('href' => $url));

            echo CHtml::encode($category->menu_name);

            echo CHtml::closeTag('a');

            $level = $category->level;
        }
    }
    for ($i = $level; $i; $i--) {
        echo CHtml::closeTag('li') . "\n";
        echo CHtml::closeTag('ul') . "\n";
    }
    ?>
</div>