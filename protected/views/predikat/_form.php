<?php
/* @var $this PredikatController */
/* @var $model Predikat */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'predikat-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Predikat </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kd',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kd',array('size'=>2,'maxlength'=>2,)); ?>
                    <?php echo $form->error($model,'kd'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'predikat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'predikat',array('size'=>15,'maxlength'=>15,)); ?>
                    <?php echo $form->error($model,'predikat'); ?>
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
