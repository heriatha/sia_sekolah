<?php
/* @var $this KelasParalelController */
/* @var $viewModel KelasParalel */

$this->breadcrumbs=array(
	'Kelas Paralels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List KelasParalel', 'url'=>array('index')),
	array('label'=>'Create KelasParalel', 'url'=>array('create')),
	array('label'=>'Update KelasParalel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete KelasParalel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KelasParalel', 'url'=>array('admin')),
);
?>

<h3>View Kelas Paralel #<?php echo $viewModel->id; ?></h3>

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
