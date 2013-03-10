<?php
/* @var $this SekolahController */
/* @var $model Sekolah */

$this->breadcrumbs=array(
	'Sekolahs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sekolah', 'url'=>array('index')),
	array('label'=>'Create Sekolah', 'url'=>array('create')),
	array('label'=>'View Sekolah', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>