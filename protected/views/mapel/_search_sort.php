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
         echo $form->textField($model,'kd_mapel',array('size'=>10,'maxlength'=>10,'class'=>'span3','placeholder'=>'Kd Mapel',)); 
         echo $form->textField($model,'diskripsi',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Diskripsi',)); 
        // echo $form->textField($model,'kkm',array('class'=>'span3','placeholder'=>'Kkm',)); 
        // echo $form->textField($model,'nama',array('size'=>25,'maxlength'=>25,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textField($model,'status',array('class'=>'span3','placeholder'=>'Status',)); 
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