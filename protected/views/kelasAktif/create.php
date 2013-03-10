<?php
/* @var $this KelasAktifController */
/* @var $model KelasAktif */

$this->breadcrumbs=array(
	'Kelas Aktifs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KelasAktif', 'url'=>array('index')),
	array('label'=>'Manage KelasAktif', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form_create', array('model'=>$model,'tahunAjaran'=>$tahunAjaran,
                        'semester'=>$semester,)); ?>