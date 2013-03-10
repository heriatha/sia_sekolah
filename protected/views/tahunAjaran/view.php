<?php
$this->breadcrumbs=array(
	'Tahun Ajarans'=>array('index'),
	$tahunAjaran->id,
);

$this->menu=array(
	array('label'=>'List TahunAjaran', 'url'=>array('index')),
	array('label'=>'Create TahunAjaran', 'url'=>array('create')),
	array('label'=>'Update TahunAjaran', 'url'=>array('update', 'id'=>$tahunAjaran->id)),
	array('label'=>'Delete TahunAjaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$tahunAjaran->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TahunAjaran', 'url'=>array('admin')),
);
?>

<h3>View Tahun Ajaran #<?php echo $tahunAjaran->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$tahunAjaran,
	'attributes'=>array(
		'id',
                'Semester.semester',
		'tahun_ajaran',
	),
)); ?>

<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>