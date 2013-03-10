<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
                <?php 
 echo $form->textField($model,'id',array('size'=>7,'maxlength'=>7,'class'=>'span3','placeholder'=>'Id',)); 
         echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Alamat',)); 
        // echo $form->textField($model,'kabupaten',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Kabupaten',)); 
        // echo $form->textField($model,'kecamatan',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Kecamatan',)); 
        // echo $form->textField($model,'nama',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textField($model,'nss',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Nss',)); 
        // echo $form->textField($model,'provinsi',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Provinsi',)); 
        // echo $form->textField($model,'id_guru_kepsek',array('class'=>'span3','placeholder'=>'Id Guru Kepsek',)); 
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