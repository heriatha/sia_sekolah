<?php
/* @var $this MapelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mapels',
);

$this->menu=array(
	array('label'=>'Create Mapel', 'url'=>array('create')),
	array('label'=>'Manage Mapel', 'url'=>array('admin')),
);
?>

<h1>Mapels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
