<?php
/* @var $this EkstrakurikulerController */
/* @var $viewModel Ekstrakurikuler */

$this->breadcrumbs=array(
	'Ekstrakurikulers'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Ekstrakurikuler', 'url'=>array('index')),
	array('label'=>'Create Ekstrakurikuler', 'url'=>array('create')),
	array('label'=>'Update Ekstrakurikuler', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Ekstrakurikuler', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ekstrakurikuler', 'url'=>array('admin')),
);
?>

<h3>View Ekstrakurikuler #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'deskripsi',
		'nama',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
