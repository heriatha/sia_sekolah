<?php
/* @var $this EkstrakurikulerController */
/* @var $model Ekstrakurikuler */

$this->breadcrumbs=array(
	'Ekstrakurikulers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ekstrakurikuler', 'url'=>array('index')),
	array('label'=>'Manage Ekstrakurikuler', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>