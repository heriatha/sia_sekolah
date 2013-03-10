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
         echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>255,'class'=>'span3','placeholder'=>'Alamat',)); 
         echo $form->textField($model,'telp1',array('size'=>15,'maxlength'=>15,'class'=>'span3','placeholder'=>'Telp1',)); 
        // echo $form->textField($model,'kabupaten',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Kabupaten',)); 
        // echo $form->textField($model,'telp2',array('size'=>15,'maxlength'=>15,'class'=>'span3','placeholder'=>'Telp2',)); 
        // echo $form->textField($model,'nama_polres',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Nama Polres',)); 
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