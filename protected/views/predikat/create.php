<?php
/* @var $this PredikatController */
/* @var $model Predikat */

$this->breadcrumbs=array(
	'Predikats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Predikat', 'url'=>array('index')),
	array('label'=>'Manage Predikat', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>