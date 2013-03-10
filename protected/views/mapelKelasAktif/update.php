<?php
/* @var $this MapelKelasAktifController */
/* @var $model MapelKelasAktif */

$this->breadcrumbs=array(
	'Mapel Kelas Aktifs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MapelKelasAktif', 'url'=>array('index')),
	array('label'=>'Create MapelKelasAktif', 'url'=>array('create')),
	array('label'=>'View MapelKelasAktif', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MapelKelasAktif', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>