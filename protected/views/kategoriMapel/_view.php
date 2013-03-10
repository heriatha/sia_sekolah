<?php
/* @var $this KategoriMapelController */
/* @var $data KategoriMapel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kurikulum')); ?>:</b>
	<?php echo CHtml::encode($data->id_kurikulum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kategori_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_kategori_parent); ?>
	<br />


</div>