<?php
/* @var $this JenjangPendidikanController */
/* @var $viewModel JenjangPendidikan */

$this->breadcrumbs=array(
	'Jenjang Pendidikans'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List JenjangPendidikan', 'url'=>array('index')),
	array('label'=>'Create JenjangPendidikan', 'url'=>array('create')),
	array('label'=>'Update JenjangPendidikan', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete JenjangPendidikan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JenjangPendidikan', 'url'=>array('admin')),
);
?>

<h3>View Jenjang Pendidikan #<?php echo $viewModel->id; ?></h3>

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
