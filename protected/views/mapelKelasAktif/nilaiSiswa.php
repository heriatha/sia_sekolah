<h3>Nilai Siswa</h3><hr>
<?php
echo CHtml::form('nilaiSiswa', 'get',array('class'=>'form-horizontal','id'=>'mapelForm'));
?>
<div class="control-group">
    <label class="control-label">Matapelajaran</label>
    <div class="controls"><?php echo CHtml::dropDownList('id_mapel_kelas_aktif', $id_mapel_kelas_aktif, MapelKelasAktif::model()->getCbModel($mapelDiampu),
            array('onchange'=>'$("#mapelForm").submit()'));?></div>
</div>
<?php
echo CHtml::endForm();
?>
<form action="<?php echo Yii::app()->createUrl('mapelKelasAktif/nilaiSiswa', array('id_mapel_kelas_aktif'=>$id_mapel_kelas_aktif))?>" method="POST">
<table class="table table-striped table-bordered bootstrap-datatable datatable" id="siswaTable">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswaList as $key => $siswa) {
            ?>
        <tr>
            <td><?php echo $siswa['nis']?></td>
            <td><?php echo $siswa['nama']?></td>
            <td>
                <input type="text" name="nilai[<?php echo $siswa['id_siswa']?>][nilai]" class="span3" value="<?php echo $siswa['nilai']?>">
                <input type="hidden" name="nilai[<?php echo $siswa['id_siswa']?>][id_rapor]" class="span3" value="<?php echo $siswa['id_rapor']?>">
                <input type="hidden" name="nilai[<?php echo $siswa['id_siswa']?>][id_mapel_kelas_aktif]" class="span3" value="<?php echo $siswa['id_mapel_kelas_aktif']?>">
            </td>
            <td>
                <input type="text" name="nilai[<?php echo $siswa['id_siswa']?>][deskripsi_kemajuan_belajar]" class="span6" value="<?php echo $siswa['deskripsi_kemajuan_belajar']?>">
            </td>
        </tr>    
            <?php
        }?>
    </tbody>
</table>
    <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Simpan">
        <input type="reset" class="btn btn-warning" value="Reset">
    </div>    
</form>
<script type="text/javascript">
    $(document).ready(function(){
        
    });
</script>