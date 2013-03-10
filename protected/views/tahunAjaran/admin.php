<?php
$this->breadcrumbs=array(
	'Tahun Ajarans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TahunAjaran', 'url'=>array('index')),
	array('label'=>'Create TahunAjaran', 'url'=>array('create')),
);

?>
<h3>Tahun Ajaran</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Tahun Ajaran',
                'url'=>Yii::app()->createUrl('tahunAjaran/create'),
                'type'=>'primary',
                'htmlOptions'=>array('target' => "ajax-modal")
        )); ?>
    </div>
</div>
<div class="span7" style="text-align: right">
    <?php $this->renderPartial('_search',array(
            'model'=>$model,
    )); ?>
</div>
</div>
<?php $this->widget('MyCGridView', array(
    'id' => 'tahun-ajaran-grid',
    'dataProvider' => $model->search(),
    'rowCssClassExpression' => '$data->is_aktif?"red":(($row % 2==1)?"even":"odd")',
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$row+1',
            'htmlOptions' => array('align' => 'center', 'style' => 'width: 5%')
        ),
        array(
            'name' => 'semester',
            'value' => '$data->Semester->semester',
        ),
        'tahun_ajaran',
        array(
            'class' => 'MyCButtonColumn',
            'template' => '{kelas} {aktifkan} {view} {update} {delete}',
            'buttons' => array(
                'kelas'=>array(
                            'url' => 'Yii::app()->createUrl("kelasAktif/viewByTahunAjaran", array("id_tahun_ajaran"=>$data->id))',
                            'label' => '',
                            'options' => array('class' => 'icon-darkgray icon-folder-open', 'data-original-title' => "Kelas"),
                        ),
                'view' => array(
                    'options' => array('target' => 'ajax-modal', 'title' => 'View Tahun Ajaran')
                ),
                'update' => array(
                    'options' => array('target' => 'ajax-modal', 'title' => 'Edit Tahun Ajaran'),
                ),
                'delete'=>array(
                            'options'=>array('header'=>'Delete Data','target'=>'confirm','message'=>'Apakah anda yakin akan menghapus tahun data ini?',)
                        ),
                'aktifkan' => array(
                    'url' => 'Yii::app()->createUrl("tahunAjaran/aktifkan", array("id"=>$data->id))',
//                            'imageUrl'=>Yii::app()->theme->baseUrl."/asset/themes/icons/active.png",
                    'label' => '',
                    'options' => array('class' => 'icon-darkgray icon-check', 'data-original-title' => "Aktifkan Tahun Ajaran"),
                    'visible' => '$data->is_aktif==0',
                ),
            ),
            'header' => 'Action',
            'htmlOptions' => array('style' => 'width: 10%;text-align:right')
        ),
    ),
));

