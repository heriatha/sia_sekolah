<?php
/* @var $this EkstrakurikulerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ekstrakurikulers',
);

$this->menu=array(
	array('label'=>'Create Ekstrakurikuler', 'url'=>array('create')),
	array('label'=>'Manage Ekstrakurikuler', 'url'=>array('admin')),
);
?>

<h1>Ekstrakurikulers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
