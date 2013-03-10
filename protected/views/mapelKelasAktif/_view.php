<?php
/* @var $this MapelKelasAktifController */
/* @var $data MapelKelasAktif */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_guru_pengampu')); ?>:</b>
	<?php echo CHtml::encode($data->id_guru_pengampu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kelas_aktif')); ?>:</b>
	<?php echo CHtml::encode($data->id_kelas_aktif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mapel')); ?>:</b>
	<?php echo CHtml::encode($data->id_mapel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kkm')); ?>:</b>
	<?php echo CHtml::encode($data->kkm); ?>
	<br />


</div>