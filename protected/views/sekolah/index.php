<?php
/* @var $this SekolahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sekolahs',
);

$this->menu=array(
	array('label'=>'Create Sekolah', 'url'=>array('create')),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<h1>Sekolahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
