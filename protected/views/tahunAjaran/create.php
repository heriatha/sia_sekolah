<?php
$this->breadcrumbs=array(
	'Tahun Ajarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TahunAjaran', 'url'=>array('index')),
	array('label'=>'Manage TahunAjaran', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>