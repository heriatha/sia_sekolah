<?php
/* @var $this GuruController */
/* @var $viewModel Guru */

$this->breadcrumbs=array(
	'Gurus'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Guru', 'url'=>array('index')),
	array('label'=>'Create Guru', 'url'=>array('create')),
	array('label'=>'Update Guru', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Guru', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guru', 'url'=>array('admin')),
);
?>

<h3>View Guru #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'id_user',
		'nip',
		'nama',
		'alamat',
		'catatan',
		'id_jenjang_pendidikan',
		'instansi_pendidikan_terakhir',
		'jurusan_pendidikan_terakhir',
		'is_pegawai_tetap',
		'tahunLulus',
		'id_agama',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
