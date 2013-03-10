<?php
/* @var $this SekolahController */
/* @var $model Sekolah */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'sekolah-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Sekolah </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id',array('size'=>7,'maxlength'=>7,)); ?>
                    <?php echo $form->error($model,'id'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'alamat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'alamat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kabupaten',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kabupaten',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'kabupaten'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kecamatan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kecamatan',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'kecamatan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'nama'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nss',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nss',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'nss'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'provinsi',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'provinsi',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'provinsi'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_guru_kepsek',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_guru_kepsek',array()); ?>
                    <?php echo $form->error($model,'id_guru_kepsek'); ?>
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
