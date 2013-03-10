<?php
/* @var $this AgamaController */
/* @var $viewModel Agama */

$this->breadcrumbs=array(
	'Agamas'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Agama', 'url'=>array('index')),
	array('label'=>'Create Agama', 'url'=>array('create')),
	array('label'=>'Update Agama', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Agama', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Agama', 'url'=>array('admin')),
);
?>

<h3>View Agama #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
