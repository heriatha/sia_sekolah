<?php
$form = $this->beginWidget('MyCActiveForm', array(
    'id' => 'tahun-ajaran-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('class'=>'form-horizontal')
        ));
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo $model->isNewRecord ? 'Tambah' : 'Edit' ?> Tahun Ajaran</h4>
</div>
<div class="modal-body">
    <div class="form">
        <?php echo $form->errorSummary($model); ?>
        <fieldset>
            <div class="control-group">
                <?php echo $form->labelEx($model, 'Semester',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_semester', Semester::model()->getCbModel()) ?>
                    <?php echo $form->error($model, 'id_semester'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->labelEx($model, 'tahun_ajaran',array('class'=>'control-label')); ?></td>
                <div class="controls">
                    <?php echo $form->textField($model, 'tahun_ajaran', array('size' => 10, 'maxlength' => 10)); ?>
                    <?php echo $form->error($model, 'tahun_ajaran'); ?>
                </div>
            </div>    
        </fieldset>
    </div>        
</div>
<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
        'buttonType' => 'submit'
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'class' => 'btn btn-warning'),
    ));
    ?>
</div>
<?php $this->endWidget(); ?>