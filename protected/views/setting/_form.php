<?php
/* @var $this SettingController */
/* @var $model Setting */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'setting-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Setting </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'alamat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>255,)); ?>
                    <?php echo $form->error($model,'alamat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'telp1',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'telp1',array('size'=>15,'maxlength'=>15,)); ?>
                    <?php echo $form->error($model,'telp1'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kabupaten',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kabupaten',array('size'=>30,'maxlength'=>30,)); ?>
                    <?php echo $form->error($model,'kabupaten'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'telp2',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'telp2',array('size'=>15,'maxlength'=>15,)); ?>
                    <?php echo $form->error($model,'telp2'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama_polres',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama_polres',array('size'=>30,'maxlength'=>30,)); ?>
                    <?php echo $form->error($model,'nama_polres'); ?>
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
