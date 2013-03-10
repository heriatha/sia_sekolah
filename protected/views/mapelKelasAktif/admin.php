<?php
/* @var $this MapelKelasAktifController */
/* @var $model MapelKelasAktif */

$this->breadcrumbs=array(
	'Mapel Kelas Aktif'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MapelKelasAktif', 'url'=>array('index')),
	array('label'=>'Create MapelKelasAktif', 'url'=>array('create')),
);

?>

<h3>Manage Mapel Kelas Aktif</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Mapel Kelas Aktif',
                'url'=>Yii::app()->createUrl('mapelKelasAktif/create'),
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
	'id'=>'mapel-kelas-aktif-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'id_guru_pengampu',
                array(
                    'header'=>'Pengampu',
                    'value'=>'Guru::model()->findByPk($data->id_guru_pengampu)->nama."  (".Guru::model()->findByPk($data->id_guru_pengampu)->nip.")"'
                ),
		'id_kelas_aktif',
		'id_mapel',
		'kkm',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View')
                        ),
                        'update'=>array(
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
