<?php
/* @var $this KelasParalelController */
/* @var $model KelasParalel */

$this->breadcrumbs=array(
	'Kelas Paralels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KelasParalel', 'url'=>array('index')),
	array('label'=>'Create KelasParalel', 'url'=>array('create')),
	array('label'=>'View KelasParalel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KelasParalel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>