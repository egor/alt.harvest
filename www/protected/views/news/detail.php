<?php
/* @var $this PagesController */

$this->breadcrumbs=array(
    $newsData->menu_name=>array('/'.$newsData->url),
    $model->menu_name
);
?>
<h1><?php echo $model->h1; ?></h1>
<?php
echo $model->text;
?>