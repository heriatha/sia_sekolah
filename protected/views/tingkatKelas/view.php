<?php
/* @var $this TingkatKelasController */
/* @var $viewModel TingkatKelas */

$this->breadcrumbs=array(
	'Tingkat Kelases'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List TingkatKelas', 'url'=>array('index')),
	array('label'=>'Create TingkatKelas', 'url'=>array('create')),
	array('label'=>'Update TingkatKelas', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete TingkatKelas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TingkatKelas', 'url'=>array('admin')),
);
?>

<h3>View Tingkat Kelas #<?php echo $viewModel->id; ?></h3>

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
