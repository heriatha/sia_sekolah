<?php
/* @var $this PredikatController */
/* @var $model Predikat */

$this->breadcrumbs=array(
	'Predikat'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Predikat', 'url'=>array('index')),
	array('label'=>'Create Predikat', 'url'=>array('create')),
);

?>

<h3>Manage Predikat</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Predikat',
                'url'=>Yii::app()->createUrl('predikat/create'),
                'type'=>'primary',
                'htmlOptions'=>array('target' => 'ajax-modal')
        )); ?>    
            </div>
</div>
<div class="span7" style="text-align: right">
   
    <?php $this->renderPartial('_search_sort',array(
            'model'=>$model,
    )); ?>
        
</div>
</div>

<?php $this->widget('MyCGridView', array(
	'id'=>'predikat-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'kd',
		'predikat',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'url' => 'Yii::app()->createUrl("predikat/view", array("kd"=>$data->kd))',
                            'label'=>'',
                            'options'=>array('target'=>'ajax-modal','title'=>'View')
                        ),
                        'update'=>array(
                            'url' => 'Yii::app()->createUrl("predikat/update", array("kd"=>$data->kd))',
                            'label'=>'',
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit')
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>


 <?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
    ?>    
