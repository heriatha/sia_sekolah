<?php
$this->breadcrumbs=array(
	'Tahun Ajarans',
);

$this->menu=array(
	array('label'=>'Create TahunAjaran', 'url'=>array('create')),
	array('label'=>'Manage TahunAjaran', 'url'=>array('admin')),
);
?>

<h1>Tahun Ajarans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
