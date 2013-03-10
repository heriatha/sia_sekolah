<?php
/* @var $this SettingController */
/* @var $viewModel Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Create Setting', 'url'=>array('create')),
	array('label'=>'Update Setting', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Setting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Setting', 'url'=>array('admin')),
);
?>

<h3>View Setting #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'alamat',
		'telp1',
		'kabupaten',
		'telp2',
		'nama_polres',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
