<?php
/* @var $this PredikatController */
/* @var $model Predikat */

$this->breadcrumbs=array(
	'Predikats'=>array('index'),
	$model->kd=>array('view','id'=>$model->kd),
	'Update',
);

$this->menu=array(
	array('label'=>'List Predikat', 'url'=>array('index')),
	array('label'=>'Create Predikat', 'url'=>array('create')),
	array('label'=>'View Predikat', 'url'=>array('view', 'id'=>$model->kd)),
	array('label'=>'Manage Predikat', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>