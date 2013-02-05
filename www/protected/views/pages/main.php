<?php
/* @var $this PagesController */

$this->breadcrumbs=array(
	'Pages',
);

$this->widget('MainTopFormWidget');
?>
<h1  class="main_h1"><?php echo $model->h1; ?></h1>
<?php
echo $model->text;

$this->widget('MainFooterFormWidget');
?>