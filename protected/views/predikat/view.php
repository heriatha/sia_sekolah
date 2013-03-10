<?php
/* @var $this PredikatController */
/* @var $viewModel Predikat */

$this->breadcrumbs=array(
	'Predikats'=>array('index'),
	$viewModel->kd,
);

$this->menu=array(
	array('label'=>'List Predikat', 'url'=>array('index')),
	array('label'=>'Create Predikat', 'url'=>array('create')),
	array('label'=>'Update Predikat', 'url'=>array('update', 'id'=>$viewModel->kd)),
	array('label'=>'Delete Predikat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->kd),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Predikat', 'url'=>array('admin')),
);
?>

<h3>View Predikat #<?php echo $viewModel->kd; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'kd',
		'predikat',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
