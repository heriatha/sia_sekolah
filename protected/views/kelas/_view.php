<?php
/* @var $this KelasController */
/* @var $data Kelas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jurusan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kurikulum')); ?>:</b>
	<?php echo CHtml::encode($data->id_kurikulum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_semester')); ?>:</b>
	<?php echo CHtml::encode($data->id_semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tingkat_kelas')); ?>:</b>
	<?php echo CHtml::encode($data->id_tingkat_kelas); ?>
	<br />


</div>