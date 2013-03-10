<?php
/* @var $this PredikatController */
/* @var $data Predikat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kd), array('view', 'id'=>$data->kd)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('predikat')); ?>:</b>
	<?php echo CHtml::encode($data->predikat); ?>
	<br />


</div>