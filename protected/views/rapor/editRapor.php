<?php
$predikatCb=  Predikat::model()->dropdownModel();
?>
<h3>Edit Rapor Siswa</h3>
<hr>
<table class="table table-striped">
    <tr>
        <td>NIS</td>
        <td><?php echo $siswa['nis']?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $siswa['nama']?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td><?php echo $kelas['tingkat_kelas'].' '.$kelas['kelas_paralel']?></td>
    </tr>
</table>
<form>
<h4>Matapelajaran</h4><hr>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Matapelajaran</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        foreach ($rapor['nilaiMapel'] as $key => $nilai) {
            ?><tr>
                <td><?php echo $i++?></td>
                <td><?php echo $nilai['mapel']?></td>
                <td><input type="text" name="nilai[<?php echo $nilai['id']?>][nilai]" value="<?php echo $nilai['nilai']?>" class="number span3" /></td>
                <td><input type="text" name="nilai[<?php echo $nilai['id']?>][deskripsi_kemajuan_belajar]" value="<?php echo $nilai['deskripsi_kemajuan_belajar']?>"/></td>
            </tr><?php
        }
        ?>
    </tbody>
</table>
<br>
<h4>Ekstrakurikuler</h4>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Ekstrakurikuler</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        foreach ($rapor['nilaiEkstraKurikuler'] as $key => $nilai) {
            ?><tr>
                <td><?php echo $i;?></td>
                <td><?php echo CHtml::dropDownList("ekstrakurikuler[$i][id_ekstrakurikuler]", $nilai['id_ekstrakurikuler'], Ekstrakurikuler::model()->dropdownModel())?></td>
                <td><?php echo CHtml::dropDownList("ekstrakurikuler[$i][id_predikat]", $nilai['id_predikat'], $predikatCb)?></td>
            </tr><?php $i++;
        }
        for($i;$i<=6-count($rapor['nilaiEkstraKurikuler']);$i++) {
            ?><tr>
                <td><?php echo $i?></td>
                <td><?php echo CHtml::dropDownList("ekstrakurikulerBaru[$i][id_ekstrakurikuler]", null, Ekstrakurikuler::model()->dropdownModel())?></td>
                <td><?php echo CHtml::dropDownList("ekstrakurikulerBaru[$i][id_predikat]", null, $predikatCb)?></td>
            </tr><?php
        }
        ?>
    </tbody>
</table>
<span class="span3">
    <table>
        
    </table>    
</span>
<span class="span3">
   tes 
</span>
</form>
