<?php
/* @var $this KelasController */
/* @var $model Kelas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'kelas-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Kelas </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_jurusan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_jurusan',array()); ?>
                    <?php echo $form->error($model,'id_jurusan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kurikulum',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_kurikulum',array()); ?>
                    <?php echo $form->error($model,'id_kurikulum'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_semester',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_semester',array()); ?>
                    <?php echo $form->error($model,'id_semester'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_tingkat_kelas',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_tingkat_kelas',array()); ?>
                    <?php echo $form->error($model,'id_tingkat_kelas'); ?>
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
