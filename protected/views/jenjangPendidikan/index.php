<?php
/* @var $this JenjangPendidikanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenjang Pendidikans',
);

$this->menu=array(
	array('label'=>'Create JenjangPendidikan', 'url'=>array('create')),
	array('label'=>'Manage JenjangPendidikan', 'url'=>array('admin')),
);
?>

<h1>Jenjang Pendidikans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
