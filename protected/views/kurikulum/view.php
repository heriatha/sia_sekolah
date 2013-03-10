<?php
/* @var $this KurikulumController */
/* @var $viewModel Kurikulum */

$this->breadcrumbs=array(
	'Kurikulums'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Kurikulum', 'url'=>array('index')),
	array('label'=>'Create Kurikulum', 'url'=>array('create')),
	array('label'=>'Update Kurikulum', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Kurikulum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kurikulum', 'url'=>array('admin')),
);
?>

<h3>View Kurikulum #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'diskripsi',
		'tahun',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
