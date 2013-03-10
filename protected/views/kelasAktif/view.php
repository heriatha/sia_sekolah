<?php
/* @var $this KelasAktifController */
/* @var $viewModel KelasAktif */

$this->breadcrumbs=array(
	'Kelas Aktifs'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List KelasAktif', 'url'=>array('index')),
	array('label'=>'Create KelasAktif', 'url'=>array('create')),
	array('label'=>'Update KelasAktif', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete KelasAktif', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KelasAktif', 'url'=>array('admin')),
);
?>

<h3>View Kelas Aktif #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'kuota',
		'keterangan',
		'id_kelas',
		'id_tahun_ajaran',
		'id_guru_walikelas',
		'id_kelas_paralel',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
