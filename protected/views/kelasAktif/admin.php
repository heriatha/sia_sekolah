<?php
/* @var $this KelasAktifController */
/* @var $model KelasAktif */

$this->breadcrumbs=array(
	'Kelas Aktif'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KelasAktif', 'url'=>array('index')),
	array('label'=>'Create KelasAktif', 'url'=>array('create')),
);

?>

<h3>Manage Kelas Aktif</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Buka Kelas',
                'url'=>Yii::app()->createUrl('kelasAktif/create',array('id_tahun_ajaran'=>$model->id_tahun_ajaran)),
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
	'id'=>'kelas-aktif-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
                array(
                    'header'=>'Kurikulum',
                    'value'=>'Kurikulum::model()->findByPk(Kelas::model()->findByPk($data->id_kelas)->id_kurikulum)->diskripsi'
                ),
                array(
                    'header'=>'Tingkat Kelas',
                    'value'=>'TingkatKelas::model()->findByPk(Kelas::model()->findByPk($data->id_kelas)->id_tingkat_kelas)->nama." ".
                        KelasParalel::model()->findByPk($data->id_kelas_paralel)->nama'
                ),
                array(
                    'header'=>'Tahun Ajaran',
                    'value'=>'TahunAjaran::model()->findByPk($data->id_tahun_ajaran)->tahun_ajaran'
                ),
                array(
                    'header'=>'Semester',
                    'value'=>'Semester::model()->findByPk(TahunAjaran::model()->findByPk($data->id_tahun_ajaran)->id_semester)->semester'
                ),
                array(
                    'header'=>'Walikelas',
                    'value'=>'Guru::model()->findByPk($data->id_guru_walikelas)->nama."  (".Guru::model()->findByPk($data->id_guru_walikelas)->nip.")"'
                ),
                'kuota',
                array(
                    'header'=>'Jumlah Siswa',
                    'value'=>'KelasAktif::model()->getJumlahSiswa($data->id)'
                ),
		'keterangan',
		array(
                    'class'=>'MyCButtonColumn',
                    'template' => '{tambah_siswa} {guru_mapel} {view} {update} {delete}',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View')
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit')
                        ),
                        'guru_mapel'=>array(
                            'url' => 'Yii::app()->createUrl("mapelKelasAktif/viewMapelByKelasAktif", array("id_kelas_aktif"=>$data->id))',
                            'label'=>'',
                            'options' => array('class' => 'icon-darkgray icon-bell', 'data-original-title' => "Setting Guru Mapel"),
                        ),
                        'tambah_siswa'=>array(
                            'url' => 'Yii::app()->createUrl("kelasAktif/tambahSiswa", array("id_kelas_aktif"=>$data->id))',
                            'label'=>'',
                            'options' => array('class' => 'icon-darkgray icon-user', 'data-original-title' => "Setting Guru Mapel"),
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
