<?php
/* @var $this SiswaController */
/* @var $viewModel Siswa */

$this->breadcrumbs=array(
	'Siswas'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Siswa', 'url'=>array('index')),
	array('label'=>'Create Siswa', 'url'=>array('create')),
	array('label'=>'Update Siswa', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Siswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Siswa', 'url'=>array('admin')),
);
?>

<h3>View Siswa #<?php echo $viewModel->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nis',
		'nama',
		'jenis_kelamin',
		'tanggal_lahir',
		'tempat_lahir',
		'alamat_siswa',
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
		'id_pendidikan_ayah',
		'pekerjaan_ayah',
		'penghasilan_ayah',
		'nama_ibu',
		'alamat_ibu',
		'id_pendidikan_ibu',
		'pekerjaan_ibu',
		'penghasilan_ibu',
		'nama_wali',
		'hubungan_dengan_wali',
		'alamat_wali',
		'id_pendidikan_wali',
		'pekerjaan_wali',
		'penghasilan_wali',
		'id_agama',
	),
)); ?>


<?php 
$this->splitContent();
$this->renderPartial('admin',array(
        'model'=>$model,
)); ?>    
