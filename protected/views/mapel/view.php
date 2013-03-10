<?php
/* @var $this MapelController */
/* @var $viewModel Mapel */

$this->breadcrumbs=array(
	'Mapels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Mapel', 'url'=>array('index')),
	array('label'=>'Create Mapel', 'url'=>array('create')),
	array('label'=>'Update Mapel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Mapel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mapel', 'url'=>array('admin')),
);
?>

<h3>View Mapel #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'kd_mapel',
		'diskripsi',
		'kkm',
		'nama',
		'status',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
