<?php
/* @var $this MapelKelasAktifController */
/* @var $model MapelKelasAktif */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'mapel-kelas-aktif-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> MapelKelasAktif </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_guru_pengampu',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_guru_pengampu',array()); ?>
                    <?php echo $form->error($model,'id_guru_pengampu'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kelas_aktif',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_kelas_aktif',array()); ?>
                    <?php echo $form->error($model,'id_kelas_aktif'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_mapel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_mapel',array()); ?>
                    <?php echo $form->error($model,'id_mapel'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kkm',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kkm',array('size'=>11,'maxlength'=>11,)); ?>
                    <?php echo $form->error($model,'kkm'); ?>
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
