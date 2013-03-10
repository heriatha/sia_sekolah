<?php
/* @var $this SiswaController */
/* @var $model Siswa */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Siswa</h3>
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
		<?php echo $form->label($model,'nis',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nis',array('size'=>13,'maxlength'=>13,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jenis_kelamin',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tanggal_lahir',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tanggal_lahir',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tempat_lahir',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tempat_lahir',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat_siswa',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat_siswa',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'danem',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'danem',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'no_ijazah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'no_ijazah',array('size'=>25,'maxlength'=>25,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'sekolah_asal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'sekolah_asal',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat_sekolah_asal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat_sekolah_asal',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'status',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'status',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tahun_ijazah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tahun_ijazah',array('size'=>14,'maxlength'=>14,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tanggal_diterima',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tanggal_diterima',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_tingkat_kelas_diterima',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_tingkat_kelas_diterima',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jurusan_idJurusan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jurusan_idJurusan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_tahun_ajaran_diterima',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_tahun_ajaran_diterima',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama_ayah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama_ayah',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat_ayah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat_ayah',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_pendidikan_ayah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pendidikan_ayah',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'pekerjaan_ayah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'pekerjaan_ayah',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'penghasilan_ayah',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'penghasilan_ayah',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama_ibu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama_ibu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat_ibu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat_ibu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_pendidikan_ibu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pendidikan_ibu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'pekerjaan_ibu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'pekerjaan_ibu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'penghasilan_ibu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'penghasilan_ibu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama_wali',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'hubungan_dengan_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'hubungan_dengan_wali',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat_wali',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_pendidikan_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pendidikan_wali',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'pekerjaan_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'pekerjaan_wali',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'penghasilan_wali',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'penghasilan_wali',array()); ?>
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
