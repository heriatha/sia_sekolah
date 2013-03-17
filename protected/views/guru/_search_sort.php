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
//         echo $form->textField($model,'id_user',array('class'=>'span3','placeholder'=>'Id User',)); 
         echo $form->textField($model,'nip',array('size'=>10,'maxlength'=>10,'class'=>'span3','placeholder'=>'Nip',)); 
         echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Alamat',)); 
        // echo $form->textField($model,'catatan',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Catatan',)); 
        // echo $form->textField($model,'id_jenjang_pendidikan',array('class'=>'span3','placeholder'=>'Id Jenjang Pendidikan',)); 
        // echo $form->textField($model,'instansi_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Instansi Pendidikan Terakhir',)); 
        // echo $form->textField($model,'jurusan_pendidikan_terakhir',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Jurusan Pendidikan Terakhir',)); 
        // echo $form->textField($model,'is_pegawai_tetap',array('class'=>'span3','placeholder'=>'Is Pegawai Tetap',)); 
        // echo $form->textField($model,'tahunLulus',array('class'=>'span3','placeholder'=>'Tahun Lulus',)); 
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