<?php
/* @var $this TingkatKelasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tingkat Kelases',
);

$this->menu=array(
	array('label'=>'Create TingkatKelas', 'url'=>array('create')),
	array('label'=>'Manage TingkatKelas', 'url'=>array('admin')),
);
?>

<h1>Tingkat Kelases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
