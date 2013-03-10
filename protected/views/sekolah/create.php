<?php
/* @var $this SekolahController */
/* @var $model Sekolah */

$this->breadcrumbs=array(
	'Sekolahs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sekolah', 'url'=>array('index')),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>