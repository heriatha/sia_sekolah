<?php
/* @var $this TingkatKelasController */
/* @var $model TingkatKelas */

$this->breadcrumbs=array(
	'Tingkat Kelases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TingkatKelas', 'url'=>array('index')),
	array('label'=>'Create TingkatKelas', 'url'=>array('create')),
	array('label'=>'View TingkatKelas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TingkatKelas', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>