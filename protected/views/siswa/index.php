<?php
/* @var $this SiswaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Siswas',
);

$this->menu=array(
	array('label'=>'Create Siswa', 'url'=>array('create')),
	array('label'=>'Manage Siswa', 'url'=>array('admin')),
);
?>

<h1>Siswas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
