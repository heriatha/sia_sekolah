<?php
/* @var $this KategoriMapelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategori Mapels',
);

$this->menu=array(
	array('label'=>'Create KategoriMapel', 'url'=>array('create')),
	array('label'=>'Manage KategoriMapel', 'url'=>array('admin')),
);
?>

<h1>Kategori Mapels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
