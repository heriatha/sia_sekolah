<?php
/* @var $this GuruController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gurus',
);

$this->menu=array(
	array('label'=>'Create Guru', 'url'=>array('create')),
	array('label'=>'Manage Guru', 'url'=>array('admin')),
);
?>

<h1>Gurus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
