<?php
/* @var $this MapelKelasAktifController */
/* @var $viewModel MapelKelasAktif */

$this->breadcrumbs=array(
	'Mapel Kelas Aktifs'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List MapelKelasAktif', 'url'=>array('index')),
	array('label'=>'Create MapelKelasAktif', 'url'=>array('create')),
	array('label'=>'Update MapelKelasAktif', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete MapelKelasAktif', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MapelKelasAktif', 'url'=>array('admin')),
);
?>

<h3>View Mapel Kelas Aktif #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'id_guru_pengampu',
		'id_kelas_aktif',
		'id_mapel',
		'kkm',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
