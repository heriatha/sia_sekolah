<?php
/* @var $this SiswaController */
/* @var $model Siswa */
/* @var $form CActiveForm */
$model->status=1;
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'siswa-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Siswa </h3><hr>
    <table>
        <tr>
            <td>
                 <fieldset>
                        <legend><h5>Data Siswa</h5></legend>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'nis', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'nis', array('size' => 13, 'maxlength' => 13)); ?>
                                <?php echo $form->error($model, 'nis'); ?>
                            </div>    
                        </div>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'nama', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'nama', array('size' => 32, 'maxlength' => 32)); ?>
                                <?php echo $form->error($model, 'nama'); ?>
                            </div>    
                        </div>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'jenis_kelamin', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php $jenisKelaminModel=new JenisKelamin();?>
                                <?php echo $form->dropDownList($model, 'jenis_kelamin', $jenisKelaminModel->getCbModel()); ?>
                                <?php echo $form->error($model, 'jenis_kelamin'); ?>
                            </div>    
                        </div>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'tanggal_lahir', array('class' => 'control-label tanggal')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'tanggal_lahir',array('class'=>'tanggal')); ?>
                                <?php echo $form->error($model, 'tanggal_lahir'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'tempat_lahir', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'tempat_lahir', array('size' => 32, 'maxlength' => 32)); ?>
                                <?php echo $form->error($model, 'tempat_lahir'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'alamat_siswa', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'alamat_siswa', array('size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'alamat_siswa'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_agama', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_agama', Agama::model()->getCbModel()); ?>
                                <?php echo $form->error($model, 'id_agama'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_tahun_ajaran_diterima', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_tahun_ajaran_diterima', TahunAjaran::model()->dropdownModel()); ?>
                                <?php echo $form->error($model, 'id_tahun_ajaran_diterima'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_tingkat_kelas_diterima', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_tingkat_kelas_diterima', TingkatKelas::model()->dropdownModel()); ?>
                                <?php echo $form->error($model, 'id_tingkat_kelas_diterima'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'tanggal_diterima', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'tanggal_diterima',array('class'=>'tanggal')); ?>
                                <?php echo $form->error($model, 'tanggal_diterima'); ?>
                            </div>    
                        </div>
                    </fieldset>
                
                <fieldset>
                        <legend><h5>Riwayat Sekolah</h5></legend>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'danem', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'danem'); ?>
                                <?php echo $form->error($model, 'danem'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'no_ijazah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'no_ijazah', array('size' => 25, 'maxlength' => 25)); ?>
                                <?php echo $form->error($model, 'no_ijazah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'sekolah_asal', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'sekolah_asal', array('size' => 32, 'maxlength' => 32)); ?>
                                <?php echo $form->error($model, 'sekolah_asal'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'alamat_sekolah_asal', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'alamat_sekolah_asal', array('size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'alamat_sekolah_asal'); ?>
                            </div>    
                        </div>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'tahun_ijazah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'tahun_ijazah', array('size' => 14, 'maxlength' => 14)); ?>
                                <?php echo $form->error($model, 'tahun_ijazah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'jurusan_idJurusan', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'jurusan_idJurusan'); ?>
                                <?php echo $form->error($model, 'jurusan_idJurusan'); ?>
                            </div>    
                        </div>
                </fieldset>
            </td>
            <td valign="top" style="padding-left: 30px">
                 <fieldset>
                        <legend><h5>Data Orang Tua</h5></legend>
                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'nama_ayah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'nama_ayah'); ?>
                                <?php echo $form->error($model, 'nama_ayah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'alamat_ayah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'alamat_ayah'); ?>
                                <?php echo $form->error($model, 'alamat_ayah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_pendidikan_ayah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_pendidikan_ayah', JenjangPendidikan::model()->getCbModel()); ?>
                                <?php echo $form->error($model, 'id_pendidikan_ayah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'pekerjaan_ayah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'pekerjaan_ayah'); ?>
                                <?php echo $form->error($model, 'pekerjaan_ayah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'penghasilan_ayah', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'penghasilan_ayah'); ?>
                                <?php echo $form->error($model, 'penghasilan_ayah'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'nama_ibu', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'nama_ibu'); ?>
                                <?php echo $form->error($model, 'nama_ibu'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'alamat_ibu', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'alamat_ibu'); ?>
                                <?php echo $form->error($model, 'alamat_ibu'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_pendidikan_ibu', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_pendidikan_ibu', JenjangPendidikan::model()->getCbModel()); ?>
                                <?php echo $form->error($model, 'id_pendidikan_ibu'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'pekerjaan_ibu', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'pekerjaan_ibu'); ?>
                                <?php echo $form->error($model, 'pekerjaan_ibu'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'penghasilan_ibu', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'penghasilan_ibu'); ?>
                                <?php echo $form->error($model, 'penghasilan_ibu'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'nama_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'nama_wali'); ?>
                                <?php echo $form->error($model, 'nama_wali'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'hubungan_dengan_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'hubungan_dengan_wali'); ?>
                                <?php echo $form->error($model, 'hubungan_dengan_wali'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'alamat_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'alamat_wali'); ?>
                                <?php echo $form->error($model, 'alamat_wali'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'id_pendidikan_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->dropDownList($model, 'id_pendidikan_wali', JenjangPendidikan::model()->getCbModel()); ?>
                                <?php echo $form->error($model, 'id_pendidikan_wali'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'pekerjaan_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'pekerjaan_wali'); ?>
                                <?php echo $form->error($model, 'pekerjaan_wali'); ?>
                            </div>    
                        </div>

                        <div class="control-group">
                            <?php echo $form->labelEx($model, 'penghasilan_wali', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo $form->textField($model, 'penghasilan_wali'); ?>
                                <?php echo $form->error($model, 'penghasilan_wali'); ?>
                            </div>    
                        </div>
                 </fieldset>
            </td>
        </tr>
    </table>
    <div class="form">    
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model, 'status', array('size' => 13, 'maxlength' => 13)); ?>
        
        
        
        
        
    </div><!-- form -->

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
            )); ?>

<?php $this->endWidget(); ?>
