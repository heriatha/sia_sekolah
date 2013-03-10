<?php
/* @var $this SettingController */
/* @var $model Setting */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Setting</h3>
</div>

<div class="modal-body">

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>
<fieldset>
	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'alamat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>255,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'telp1',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'telp1',array('size'=>15,'maxlength'=>15,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'kabupaten',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'kabupaten',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'telp2',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'telp2',array('size'=>15,'maxlength'=>15,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama_polres',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama_polres',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

</fieldset>    
</div><!-- search-form -->    
<?php $this->endWidget(); ?>
    
<div class="modal-footer">
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Search',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>"$('#searchForm').submit()"),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
    )); ?>    
    </div>
<?php $this->endWidget(); ?>
