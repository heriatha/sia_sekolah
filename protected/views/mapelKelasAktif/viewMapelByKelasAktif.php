<h3>Guru Pengampu Matapelajaran</h3><hr>
<table class="table">
    <tr>
        <td style="width: 150px" class="title-column">Kelas</td><td><?php echo $kelas['tingkat_kelas'] . ' ' . $kelas['kelas_paralel'] ?></td>
    </tr>
    <tr>
        <td style="" class="title">Semester</td><td><?php echo $tahunAjaran['semester']?></td>
    </tr>
    <tr>
        <td style="" class="title">Tahun Ajaran</td><td><?php echo $tahunAjaran['tahun_ajaran']?></td>
    </tr>
</table>
<br>
<form action="<?php echo Yii::app()->createUrl('mapelKelasAktif/setGuruMapel',array('id_kelas_aktif'=>$id_kelas_aktif))?>"
      method="POST">
<table class="table table-striped table-bordered bootstrap-datatable table">
    <thead>
        <tr>
            <th>No</th>
            <th>Matapelajaran</th>
            <th>Guru Pengampu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        foreach ($data as $d){
            ?><tr>
                <td><?php echo $i++?></td>
                <td><?php echo $d['mapel']?></td>
                <td><?php echo CHtml::dropDownList("pengampu[$d[id]]", $d['id_guru_pengampu'],Guru::model()->dropdownModel($guruList),array('rel'=>'chosen','onchange'=>'$("#saveBtn").removeAttr("disabled")'))?></td>
            </tr><?php
        }
        ?>
    </tbody>
</table>
<input type="submit" disabled="disabled" id="saveBtn" value="Simpan" class="btn btn-primary">
</form>