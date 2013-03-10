<?php
/* @var $this PredikatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Predikats',
);

$this->menu=array(
	array('label'=>'Create Predikat', 'url'=>array('create')),
	array('label'=>'Manage Predikat', 'url'=>array('admin')),
);
?>

<h1>Predikats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
