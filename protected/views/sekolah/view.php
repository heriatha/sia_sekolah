<?php
/* @var $this SekolahController */
/* @var $viewModel Sekolah */

$this->breadcrumbs=array(
	'Sekolahs'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Sekolah', 'url'=>array('index')),
	array('label'=>'Create Sekolah', 'url'=>array('create')),
	array('label'=>'Update Sekolah', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Sekolah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<h3>View Sekolah #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'alamat',
		'kabupaten',
		'kecamatan',
		'nama',
		'nss',
		'provinsi',
		'id_guru_kepsek',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
