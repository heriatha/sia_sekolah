<?php
/* @var $this KategoriMapelController */
/* @var $model KategoriMapel */

$this->breadcrumbs=array(
	'Kategori Mapels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KategoriMapel', 'url'=>array('index')),
	array('label'=>'Create KategoriMapel', 'url'=>array('create')),
	array('label'=>'View KategoriMapel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KategoriMapel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>