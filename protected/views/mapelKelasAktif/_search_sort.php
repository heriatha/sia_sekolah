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
         echo $form->textField($model,'id_guru_pengampu',array('class'=>'span3','placeholder'=>'Id Guru Pengampu',)); 
         echo $form->textField($model,'id_kelas_aktif',array('class'=>'span3','placeholder'=>'Id Kelas Aktif',)); 
        // echo $form->textField($model,'id_mapel',array('class'=>'span3','placeholder'=>'Id Mapel',)); 
        // echo $form->textField($model,'kkm',array('size'=>11,'maxlength'=>11,'class'=>'span3','placeholder'=>'Kkm',)); 
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