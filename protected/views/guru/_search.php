<?php
/* @var $this GuruController */
/* @var $model Guru */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Guru</h3>
</div>

<div class="modal-body">

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>
<fieldset>
	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_user',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_user',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nip',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nip',array('size'=>10,'maxlength'=>10,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'catatan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'catatan',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_jenjang_pendidikan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_jenjang_pendidikan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'instansi_pendidikan_terakhir',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'instansi_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jurusan_pendidikan_terakhir',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jurusan_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'is_pegawai_tetap',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'is_pegawai_tetap',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tahunLulus',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tahunLulus',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_agama',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_agama',array()); ?>
</div>
	</div>

</fieldset>    
</div><!-- search-form -->    
<?php $this->endWidget(); ?>
    
<div class="modal-footer">
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Search',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>"$('#searchForm').submit()"),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
    )); ?>    
    </div>
<?php $this->endWidget(); ?>
