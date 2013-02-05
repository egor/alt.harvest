<script type="text/javascript" src="/js/site/jquery.maskedinput-1.2.2.js"></script>
<script type="text/javascript">
jQuery(function($) {
$.mask.definitions['~']='[+-]';
$('#phone').mask('(999) 999-99-99');
//$('#phone2').mask('(999) 999-99-99');
});
</script>
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