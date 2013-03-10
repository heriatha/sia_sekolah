<?php
/* @var $this MapelController */
/* @var $data Mapel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_mapel')); ?>:</b>
	<?php echo CHtml::encode($data->kd_mapel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->diskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kkm')); ?>:</b>
	<?php echo CHtml::encode($data->kkm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>