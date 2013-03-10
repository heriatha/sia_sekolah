<?php
/* @var $this JenjangPendidikanController */
/* @var $model JenjangPendidikan */

$this->breadcrumbs=array(
	'Jenjang Pendidikans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JenjangPendidikan', 'url'=>array('index')),
	array('label'=>'Create JenjangPendidikan', 'url'=>array('create')),
	array('label'=>'View JenjangPendidikan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JenjangPendidikan', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>