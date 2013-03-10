<?php
/* @var $this MapelController */
/* @var $model Mapel */

$this->breadcrumbs=array(
	'Mapels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mapel', 'url'=>array('index')),
	array('label'=>'Create Mapel', 'url'=>array('create')),
	array('label'=>'View Mapel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mapel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>