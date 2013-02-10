<?php
header("HTTP/1.0 404 Not Found");
?>
<link rel="stylesheet" href="/library/countdown/jquery.countdown.css" />        
<?php
/* @var $this PagesController */
$this->breadcrumbs = Breadcrumbs::getBreadcrumbsToPageById($model->pages_id);
$this->breadcrumbs[] .= $model->menu_name;

?>
<h1><?php echo $model->h1; ?></h1>
<?php

echo $model->text;
?>