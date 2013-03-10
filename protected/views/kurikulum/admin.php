<?php
/* @var $this KurikulumController */
/* @var $model Kurikulum */

$this->breadcrumbs=array(
	'Kurikulum'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kurikulum', 'url'=>array('index')),
	array('label'=>'Create Kurikulum', 'url'=>array('create')),
);

?>

<h3>Manage Kurikulum</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Kurikulum',
                'url'=>Yii::app()->createUrl('kurikulum/create'),
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
	'id'=>'kurikulum-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'tahun',
                array(
                    'class'=>'MyCButtonColumn',
//                    'value'=>'$data->getJumlahMapel()',
                    'header'=>'Jumlah Matapelajaran',
                    'htmlOptions'=>array('style'=>'text-align: right'),
                    'template' => '{kategorimapel}',
                    'buttons'=>array(
                        'kategorimapel'=>array(
                            'url' => 'Yii::app()->createUrl("kategoriMapel/viewByKurikulum", array("id_kurikulum"=>$data->id))',
                            'label' => '$data->getJumlahMapel()',
                            'options' => array('class' => '', 'data-original-title' => "Kategori Mapel"),
                        ),
                    ),
                ),
                'diskripsi',
		array(
                    'class'=>'MyCButtonColumn',
                    'template' => '{kategorimapel} {kelas} {view} {update} {delete}',
                    'buttons'=>array(
                        'kategorimapel'=>array(
                            'url' => 'Yii::app()->createUrl("kategoriMapel/viewByKurikulum", array("id_kurikulum"=>$data->id))',
                            'label' => '',
                            'options' => array('class' => 'icon-darkgray icon-folder-open', 'data-original-title' => "Kategori Mapel"),
                        ),
                        'kelas'=>array(
                            'url' => 'Yii::app()->createUrl("kelas/viewByKurikulum", array("id_kurikulum"=>$data->id))',
                            'label' => '',
                            'options' => array('class' => 'icon-darkgray icon-folder-open', 'data-original-title' => "Kelas"),
                        ),
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View')
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit')
                        ),
                        'delete'=>array(
                            'options'=>array('header'=>'Delete Data','target'=>'confirm','message'=>'Apakah anda yakin akan menghapus tahun data ini?',)
                        ),
                    ),
                    'header'=>'Action',
                    'htmlOptions' => array('style' => 'width: 10%;text-align:right')
		),
	),
)); ?>


 <?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
    ?>    