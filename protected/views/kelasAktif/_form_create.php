<?php
/* @var $this KelasAktifController */
/* @var $model KelasAktif */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'kelas-aktif-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> KelasAktif </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

        <div class="control-group">
                <div class="control-label">Tahun Ajaran</div>
                <div class="controls">
                    <?php echo $tahunAjaran['tahun_ajaran'];?>
                    <?php echo $form->hiddenField($model,'id_tahun_ajaran',array()); ?>
                </div>    
	</div>
        <div class="control-group">
                <div class="control-label">Semester</div>
                <div class="controls">
                    <?php echo $semester['semester'];?>
                    <?php echo CHtml::hiddenField('id_semester', $semester['id'])?>
                </div>    
	</div>
        <div class="control-group">
                <div class="control-label">Kurikulum</div>
                <div class="controls">
                    <?php echo CHtml::dropDownList('id_kurikulum', '', Kurikulum::model()->dropdownModel(),array('class'=>'span3'))?>
                </div>    
	</div>    
        <div class="control-group">
                <div class="control-label">Tingkat Kelas</div>
                <div class="controls">
                    <?php echo CHtml::dropDownList('id_tingkat_kelas', '', TingkatKelas::model()->dropdownModel(),array('class'=>'span3'))?>
                </div>    
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'id_kelas_paralel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_kelas_paralel', KelasParalel::model()->dropdownModel(),array('class'=>'span3'))?>
                    <?php echo $form->error($model,'id_kelas_paralel'); ?>
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
		<?php echo $form->labelEx($model,'id_guru_walikelas',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_guru_walikelas', Guru::model()->dropdownModel(Guru::model()->getCalonWaliKelas($model->id_tahun_ajaran)),
                            array('class'=>'','data-rel'=>'chosen'))?>
                    <?php echo $form->error($model,'id_guru_walikelas'); ?>
                </div>    
	</div>    
	<div class="control-group">
		<?php echo $form->labelEx($model,'keterangan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'keterangan',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'keterangan'); ?>
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
<script type="text/javascript">
$(document).ready(function(){
    $('select[data-rel=chosen]').chosen();
})
</script>