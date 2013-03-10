<?php
/* @var $this MapelController */
/* @var $model Mapel */

$this->breadcrumbs=array(
	'Mapels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mapel', 'url'=>array('index')),
	array('label'=>'Manage Mapel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>