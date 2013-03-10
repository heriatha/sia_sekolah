<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
                <?php 
// echo $form->textField($model,'id',array('class'=>'span3','placeholder'=>'Id',)); 
         echo $form->textField($model,'nis',array('size'=>13,'maxlength'=>13,'class'=>'span3','placeholder'=>'Nis',)); 
         echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1,'class'=>'span3','placeholder'=>'Jenis Kelamin',)); 
        // echo $form->textField($model,'tanggal_lahir',array('class'=>'span3','placeholder'=>'Tanggal Lahir',)); 
        // echo $form->textField($model,'tempat_lahir',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Tempat Lahir',)); 
        // echo $form->textField($model,'alamat_siswa',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Alamat Siswa',)); 
        // echo $form->textField($model,'danem',array('class'=>'span3','placeholder'=>'Danem',)); 
        // echo $form->textField($model,'no_ijazah',array('size'=>25,'maxlength'=>25,'class'=>'span3','placeholder'=>'No Ijazah',)); 
        // echo $form->textField($model,'sekolah_asal',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Sekolah Asal',)); 
        // echo $form->textField($model,'alamat_sekolah_asal',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Alamat Sekolah Asal',)); 
        // echo $form->textField($model,'status',array('class'=>'span3','placeholder'=>'Status',)); 
        // echo $form->textField($model,'tahun_ijazah',array('size'=>14,'maxlength'=>14,'class'=>'span3','placeholder'=>'Tahun Ijazah',)); 
        // echo $form->textField($model,'tanggal_diterima',array('class'=>'span3','placeholder'=>'Tanggal Diterima',)); 
        // echo $form->textField($model,'id_tingkat_kelas_diterima',array('class'=>'span3','placeholder'=>'Id Tingkat Kelas Diterima',)); 
        // echo $form->textField($model,'jurusan_idJurusan',array('class'=>'span3','placeholder'=>'Jurusan Id Jurusan',)); 
        // echo $form->textField($model,'id_tahun_ajaran_diterima',array('class'=>'span3','placeholder'=>'Id Tahun Ajaran Diterima',)); 
        // echo $form->textField($model,'nama_ayah',array('class'=>'span3','placeholder'=>'Nama Ayah',)); 
        // echo $form->textField($model,'alamat_ayah',array('class'=>'span3','placeholder'=>'Alamat Ayah',)); 
        // echo $form->textField($model,'id_pendidikan_ayah',array('class'=>'span3','placeholder'=>'Pendidikan Ayah',)); 
        // echo $form->textField($model,'pekerjaan_ayah',array('class'=>'span3','placeholder'=>'Pekerjaan Ayah',)); 
        // echo $form->textField($model,'penghasilan_ayah',array('class'=>'span3','placeholder'=>'Penghasilan Ayah',)); 
        // echo $form->textField($model,'nama_ibu',array('class'=>'span3','placeholder'=>'Nama Ibu',)); 
        // echo $form->textField($model,'alamat_ibu',array('class'=>'span3','placeholder'=>'Alamat Ibu',)); 
        // echo $form->textField($model,'id_pendidikan_ibu',array('class'=>'span3','placeholder'=>'Pendidikan Ibu',)); 
        // echo $form->textField($model,'pekerjaan_ibu',array('class'=>'span3','placeholder'=>'Pekerjaan Ibu',)); 
        // echo $form->textField($model,'penghasilan_ibu',array('class'=>'span3','placeholder'=>'Penghasilan Ibu',)); 
        // echo $form->textField($model,'nama_wali',array('class'=>'span3','placeholder'=>'Nama Wali',)); 
        // echo $form->textField($model,'hubungan_dengan_wali',array('class'=>'span3','placeholder'=>'Hubungan Dengan Wali',)); 
        // echo $form->textField($model,'alamat_wali',array('class'=>'span3','placeholder'=>'Alamat Wali',)); 
        // echo $form->textField($model,'id_pendidikan_wali',array('class'=>'span3','placeholder'=>'Pendidikan Wali',)); 
        // echo $form->textField($model,'pekerjaan_wali',array('class'=>'span3','placeholder'=>'Pekerjaan Wali',)); 
        // echo $form->textField($model,'penghasilan_wali',array('class'=>'span3','placeholder'=>'Penghasilan Wali',)); 
        // echo $form->textField($model,'id_agama',array('class'=>'span3','placeholder'=>'Id Agama',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
         $this->widget('bootstrap.widgets.TbButton', array(
            'icon' => 'search white',
            'label' => 'Advanced Search',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#searchModal',
            ),
        ));
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>