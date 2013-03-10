<?php
/* @var $this AgamaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Agamas',
);

$this->menu=array(
	array('label'=>'Create Agama', 'url'=>array('create')),
	array('label'=>'Manage Agama', 'url'=>array('admin')),
);
?>

<h1>Agamas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
