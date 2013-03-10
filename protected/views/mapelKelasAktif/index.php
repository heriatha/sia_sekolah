<?php
/* @var $this MapelKelasAktifController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mapel Kelas Aktifs',
);

$this->menu=array(
	array('label'=>'Create MapelKelasAktif', 'url'=>array('create')),
	array('label'=>'Manage MapelKelasAktif', 'url'=>array('admin')),
);
?>

<h1>Mapel Kelas Aktifs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
