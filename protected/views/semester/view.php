<?php
/* @var $this SemesterController */
/* @var $viewModel Semester */

$this->breadcrumbs=array(
	'Semesters'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'Update Semester', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Semester', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h3>View Semester #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'semester',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
