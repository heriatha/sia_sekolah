<?php
/* @var $this EkstrakurikulerController */
/* @var $model Ekstrakurikuler */

$this->breadcrumbs=array(
	'Ekstrakurikulers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ekstrakurikuler', 'url'=>array('index')),
	array('label'=>'Create Ekstrakurikuler', 'url'=>array('create')),
	array('label'=>'View Ekstrakurikuler', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ekstrakurikuler', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>