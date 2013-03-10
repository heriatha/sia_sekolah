<?php
/* @var $this KelasAktifController */
/* @var $model KelasAktif */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'kelas-aktif-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> KelasAktif </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id',array()); ?>
                    <?php echo $form->error($model,'id'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kuota',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kuota',array()); ?>
                    <?php echo $form->error($model,'kuota'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'keterangan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'keterangan',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'keterangan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kelas',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_kelas',array()); ?>
                    <?php echo $form->error($model,'id_kelas'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_tahun_ajaran',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_tahun_ajaran',array()); ?>
                    <?php echo $form->error($model,'id_tahun_ajaran'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_guru_walikelas',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_guru_walikelas',array()); ?>
                    <?php echo $form->error($model,'id_guru_walikelas'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kelas_paralel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_kelas_paralel',array()); ?>
                    <?php echo $form->error($model,'id_kelas_paralel'); ?>
                </div>    
	</div>

        </fieldset>
    </div><!-- form -->
</div>
<div class="modal-footer">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
                'buttonType' => 'submit'
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?></div>    

<?php $this->endWidget(); ?>
