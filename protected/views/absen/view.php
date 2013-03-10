<?php
/* @var $this AbsenController */
/* @var $viewModel Absen */

$this->breadcrumbs=array(
	'Absens'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Absen', 'url'=>array('index')),
	array('label'=>'Create Absen', 'url'=>array('create')),
	array('label'=>'Update Absen', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Absen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Absen', 'url'=>array('admin')),
);
?>

<h3>View Absen #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'tanggal',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
