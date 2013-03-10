<?php
/* @var $this GuruController */
/* @var $model Guru */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'guru-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Guru </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
        <?php
        $this->renderPartial('//user/_form_mini',array(
            'model'=>$user,'form'=>$form
        ));
        ?>    
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nip',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nip',array('size'=>10,'maxlength'=>10,)); ?>
                    <?php echo $form->error($model,'nip'); ?>
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
		<?php echo $form->labelEx($model,'alamat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'alamat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'catatan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'catatan',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'catatan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_jenjang_pendidikan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_jenjang_pendidikan', JenjangPendidikan::model()->getCbModel()); ?>
                    <?php echo $form->error($model,'id_jenjang_pendidikan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'instansi_pendidikan_terakhir',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'instansi_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'instansi_pendidikan_terakhir'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jurusan_pendidikan_terakhir',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'jurusan_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'jurusan_pendidikan_terakhir'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'is_pegawai_tetap',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php // echo CHtml::checkBox($name, $checked, $htmlOptions)?>
                    <?php echo $form->checkBox($model,'is_pegawai_tetap',array('')); ?>
                    <?php echo $form->error($model,'is_pegawai_tetap'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'tahunLulus',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'tahunLulus',array()); ?>
                    <?php echo $form->error($model,'tahunLulus'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_agama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_agama', Agama::model()->getCbModel()); ?>
                    <?php echo $form->error($model,'id_agama'); ?>
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
