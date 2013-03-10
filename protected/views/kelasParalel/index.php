<?php
/* @var $this KelasParalelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kelas Paralels',
);

$this->menu=array(
	array('label'=>'Create KelasParalel', 'url'=>array('create')),
	array('label'=>'Manage KelasParalel', 'url'=>array('admin')),
);
?>

<h1>Kelas Paralels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
