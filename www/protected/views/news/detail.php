<?php
/* @var $this PagesController */

$this->breadcrumbs=array(
    $newsData->menu_name=>array('/'.$newsData->url),
    $model->menu_name
);
?>
<h1 class="h1-date"><?php echo $model->h1; ?></h1>
<span class="main-date"><?php echo date('d.m.Y', $model->date); ?></span>
<?php
echo $model->text;
?>