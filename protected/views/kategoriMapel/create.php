<?php
/* @var $this KategoriMapelController */
/* @var $model KategoriMapel */

$this->breadcrumbs=array(
	'Kategori Mapels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriMapel', 'url'=>array('index')),
	array('label'=>'Manage KategoriMapel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>