<?php
/* @var $this KategoriMapelController */
/* @var $viewModel KategoriMapel */

$this->breadcrumbs=array(
	'Kategori Mapels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List KategoriMapel', 'url'=>array('index')),
	array('label'=>'Create KategoriMapel', 'url'=>array('create')),
	array('label'=>'Update KategoriMapel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete KategoriMapel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KategoriMapel', 'url'=>array('admin')),
);
?>

<h3>View Kategori Mapel #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
		'id_kurikulum',
		'id_kategori_parent',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
