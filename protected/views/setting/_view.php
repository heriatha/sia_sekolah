<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp1')); ?>:</b>
	<?php echo CHtml::encode($data->telp1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kabupaten')); ?>:</b>
	<?php echo CHtml::encode($data->kabupaten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp2')); ?>:</b>
	<?php echo CHtml::encode($data->telp2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_polres')); ?>:</b>
	<?php echo CHtml::encode($data->nama_polres); ?>
	<br />


</div>