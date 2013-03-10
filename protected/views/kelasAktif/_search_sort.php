<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
            'id'=>'tahunAjaranSearch'
                ));
        ?>    
                <?php 
        echo $form->dropDownList($model,'id_tahun_ajaran', TahunAjaran::model()->dropdownModel(),array('onchange'=>"$('#tahunAjaranSearch').submit()"));        
//        echo $form->textField($model,'id',array('class'=>'span3','placeholder'=>'Id',)); 
//         echo $form->textField($model,'kuota',array('class'=>'span3','placeholder'=>'Kuota',)); 
        // echo $form->textField($model,'keterangan',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Keterangan',)); 
        // echo $form->textField($model,'id_kelas',array('class'=>'span3','placeholder'=>'Id Kelas',)); 
        // echo $form->textField($model,'id_tahun_ajaran',array('class'=>'span3','placeholder'=>'Id Tahun Ajaran',)); 
        // echo $form->textField($model,'id_guru_walikelas',array('class'=>'span3','placeholder'=>'Id Guru Walikelas',)); 
        // echo $form->textField($model,'id_kelas_paralel',array('class'=>'span3','placeholder'=>'Id Kelas Paralel',)); 
                ?> 
        
        <?php
//        $this->widget('bootstrap.widgets.TbButton', array(
//            'type' => 'primary',
//            'label' => 'Search',
//            'url' => '#',
//            'buttonType' => 'submit',
//            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
//        ));
//         $this->widget('bootstrap.widgets.TbButton', array(
//            'icon' => 'search white',
//            'label' => 'Advanced Search',
//            'type' => 'primary',
//            'htmlOptions' => array(
//                'data-toggle' => 'modal',
//                'data-target' => '#searchModal',
//            ),
//        ));
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>