<?php
/* @var $this SiswaController */
/* @var $model Siswa */

$this->breadcrumbs=array(
	'Siswa'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Siswa', 'url'=>array('index')),
	array('label'=>'Create Siswa', 'url'=>array('create')),
);

?>

<h3>Manage Siswa</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Siswa',
                'url'=>Yii::app()->createUrl('siswa/create'),
                'type'=>'primary',
//                'htmlOptions'=>array('target' => 'ajax-modal')
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
	'id'=>'siswa-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'nis',
		'nama',
		'jenis_kelamin',
		'tanggal_lahir',
		'tempat_lahir',
		'alamat_siswa',
		/*
		'danem',
		'no_ijazah',
		'sekolah_asal',
		'alamat_sekolah_asal',
		'status',
		'tahun_ijazah',
		'tanggal_diterima',
		'id_tingkat_kelas_diterima',
		'jurusan_idJurusan',
		'id_tahun_ajaran_diterima',
		'nama_ayah',
		'alamat_ayah',
		'pendidikan_ayah',
		'pekerjaan_ayah',
		'penghasilan_ayah',
		'nama_ibu',
		'alamat_ibu',
		'pendidikan_ibu',
		'pekerjaan_ibu',
		'penghasilan_ibu',
		'nama_wali',
		'hubungan_dengan_wali',
		'alamat_wali',
		'pendidikan_wali',
		'pekerjaan_wali',
		'penghasilan_wali',
		'id_agama',
		*/
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('title'=>'View')
                        ),
                        'update'=>array(
                            'options'=>array('title'=>'Edit')
                        ),
                        'delete'=>array(
                            'options'=>array('header'=>'Delete Data','target'=>'confirm','message'=>'Apakah anda yakin akan menghapus tahun data ini?',)
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
