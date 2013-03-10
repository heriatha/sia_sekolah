<?php
/* @var $this JenjangPendidikanController */
/* @var $model JenjangPendidikan */

$this->breadcrumbs=array(
	'Jenjang Pendidikans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JenjangPendidikan', 'url'=>array('index')),
	array('label'=>'Manage JenjangPendidikan', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>