<?php
/* @var $this TingkatKelasController */
/* @var $model TingkatKelas */

$this->breadcrumbs=array(
	'Tingkat Kelases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TingkatKelas', 'url'=>array('index')),
	array('label'=>'Manage TingkatKelas', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>