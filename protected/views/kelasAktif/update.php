<?php
/* @var $this KelasAktifController */
/* @var $model KelasAktif */

$this->breadcrumbs=array(
	'Kelas Aktifs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KelasAktif', 'url'=>array('index')),
	array('label'=>'Create KelasAktif', 'url'=>array('create')),
	array('label'=>'View KelasAktif', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KelasAktif', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>