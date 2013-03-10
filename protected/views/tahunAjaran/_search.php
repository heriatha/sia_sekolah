<div class="controls">
    <div class="input-append">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
        <?php echo $form->dropDownList($model, 'id_semester', Semester::model()->getCbModel(),array('class'=>'span3')) ?>
        <?php echo $form->textField($model, 'tahun_ajaran', array('size' => 5, 'maxlength' => 10,'placeholder'=>'tahun ajaran','class'=>'span2')); ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'buttonType' => 'submit',
            'url' => '#',
            'htmlOptions' => array('data-dismiss' => 'modal'),
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>