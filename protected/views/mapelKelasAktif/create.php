<?php
/* @var $this MapelKelasAktifController */
/* @var $model MapelKelasAktif */

$this->breadcrumbs=array(
	'Mapel Kelas Aktifs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MapelKelasAktif', 'url'=>array('index')),
	array('label'=>'Manage MapelKelasAktif', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>