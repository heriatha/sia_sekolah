<?php
/* @var $this KelasAktifController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kelas Aktifs',
);

$this->menu=array(
	array('label'=>'Create KelasAktif', 'url'=>array('create')),
	array('label'=>'Manage KelasAktif', 'url'=>array('admin')),
);
?>

<h1>Kelas Aktifs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
