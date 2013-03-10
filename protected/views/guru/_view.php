<?php
/* @var $this GuruController */
/* @var $data Guru */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::encode($data->nip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catatan')); ?>:</b>
	<?php echo CHtml::encode($data->catatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenjang_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenjang_pendidikan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('instansi_pendidikan_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->instansi_pendidikan_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan_pendidikan_terakhir')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan_pendidikan_terakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_pegawai_tetap')); ?>:</b>
	<?php echo CHtml::encode($data->is_pegawai_tetap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahunLulus')); ?>:</b>
	<?php echo CHtml::encode($data->tahunLulus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agama')); ?>:</b>
	<?php echo CHtml::encode($data->id_agama); ?>
	<br />

	*/ ?>

</div>