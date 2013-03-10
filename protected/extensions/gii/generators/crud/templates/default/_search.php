<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<?php echo "<?php \$this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?>"?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search <?php echo $this->class2name($this->modelClass)?></h3>
</div>

<div class="modal-body">

<?php echo "<?php \$form=\$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>\n"; ?>
<fieldset>
<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="control-group">
		<?php echo "<?php echo \$form->label(\$model,'{$column->name}',array('class'=>'control-label')); ?>\n"; ?>
		<div class="controls"><?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?></div>
	</div>

<?php endforeach; ?>
</fieldset>    
</div><!-- search-form -->    
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>    
<div class="modal-footer">
    <?php
    echo "
    <?php \$this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Search',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>\"$('#searchForm').submit()\"),
    )); ?>
    <?php \$this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
    )); ?>    
    "
    ?>
</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>