<?php
/* @var $this SiswaController */
/* @var $data Siswa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nis')); ?>:</b>
	<?php echo CHtml::encode($data->nis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_siswa')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_siswa); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('danem')); ?>:</b>
	<?php echo CHtml::encode($data->danem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_ijazah')); ?>:</b>
	<?php echo CHtml::encode($data->no_ijazah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sekolah_asal')); ?>:</b>
	<?php echo CHtml::encode($data->sekolah_asal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_sekolah_asal')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_sekolah_asal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ijazah')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ijazah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_diterima')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_diterima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tingkat_kelas_diterima')); ?>:</b>
	<?php echo CHtml::encode($data->id_tingkat_kelas_diterima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan_idJurusan')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan_idJurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tahun_ajaran_diterima')); ?>:</b>
	<?php echo CHtml::encode($data->id_tahun_ajaran_diterima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pendidikan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->id_pendidikan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pendidikan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->id_pendidikan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_wali')); ?>:</b>
	<?php echo CHtml::encode($data->nama_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hubungan_dengan_wali')); ?>:</b>
	<?php echo CHtml::encode($data->hubungan_dengan_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_wali')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pendidikan_wali')); ?>:</b>
	<?php echo CHtml::encode($data->id_pendidikan_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_wali')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_wali')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_wali); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agama')); ?>:</b>
	<?php echo CHtml::encode($data->id_agama); ?>
	<br />

	*/ ?>

</div>