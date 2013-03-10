<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>    
	</div>
