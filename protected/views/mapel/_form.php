<?php
/* @var $this MapelController */
/* @var $model Mapel */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'mapel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Mapel </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kd_mapel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kd_mapel',array('size'=>10,'maxlength'=>10,)); ?>
                    <?php echo $form->error($model,'kd_mapel'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'diskripsi',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'diskripsi',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'diskripsi'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kkm',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kkm',array()); ?>
                    <?php echo $form->error($model,'kkm'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama',array('size'=>25,'maxlength'=>25,)); ?>
                    <?php echo $form->error($model,'nama'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'status',array()); ?>
                    <?php echo $form->error($model,'status'); ?>
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
