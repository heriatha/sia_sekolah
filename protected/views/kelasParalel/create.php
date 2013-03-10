<?php
/* @var $this KelasParalelController */
/* @var $model KelasParalel */

$this->breadcrumbs=array(
	'Kelas Paralels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KelasParalel', 'url'=>array('index')),
	array('label'=>'Manage KelasParalel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>