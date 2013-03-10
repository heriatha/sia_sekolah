<?php
/* @var $this KelasAktifController */
/* @var $data KelasAktif */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kuota')); ?>:</b>
	<?php echo CHtml::encode($data->kuota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kelas')); ?>:</b>
	<?php echo CHtml::encode($data->id_kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tahun_ajaran')); ?>:</b>
	<?php echo CHtml::encode($data->id_tahun_ajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_guru_walikelas')); ?>:</b>
	<?php echo CHtml::encode($data->id_guru_walikelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kelas_paralel')); ?>:</b>
	<?php echo CHtml::encode($data->id_kelas_paralel); ?>
	<br />
</div>