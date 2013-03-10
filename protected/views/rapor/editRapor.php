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
<form action="<?php echo Yii::app()->createUrl('rapor/editRapor',$_GET)?>" method="POST">
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
                <td><?php echo $nilai['mapel'];?></td>
                <td>
                    <input type="text" name="nilai[<?php echo $i?>][nilai]" value="<?php echo $nilai['nilai']?>" class="number span3" />
                    <input type="hidden" name="nilai[<?php echo $i?>][id_rapor]" value="<?php echo $nilai['id_rapor']?>" class="number span3" />
                    <input type="hidden" name="nilai[<?php echo $i?>][id_mapel_kelas_aktif]" value="<?php echo $nilai['id_mapel_kelas_aktif']?>" class="number span3" />
                </td>
                <td><input type="text" name="nilai[<?php echo $i?>][deskripsi_kemajuan_belajar]" value="<?php echo $nilai['deskripsi_kemajuan_belajar']?>"/></td>
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
                <td><?php echo CHtml::dropDownList("ekstrakurikuler[$i][id_ekstrakurikuler]", null, Ekstrakurikuler::model()->dropdownModel())?></td>
                <td><?php echo CHtml::dropDownList("ekstrakurikuler[$i][id_predikat]", null, $predikatCb)?></td>
            </tr><?php
        }
        ?>
    </tbody>
</table>
<span class="span4">
    <h4>Predikat</h4><hr>
    <table>
        <tr>
            <td width='70px'>Kelakuan</td>
            <td><?php echo CHtml::dropDownList('rapor[id_predikat_kelakuan]', $rapor['id_predikat_kelakuan'],Predikat::model()->dropdownModel(),array('class'=>'span12'))?></td>
        </tr>
        <tr>
            <td width='70px'>Kerajinan</td>
            <td><?php echo CHtml::dropDownList('rapor[id_predikat_kerajinan]', $rapor['id_predikat_kerajinan'],Predikat::model()->dropdownModel(),array('class'=>'span12'))?></td>
        </tr>
        <tr>
            <td width='70px'>Kerapian</td>
            <td><?php echo CHtml::dropDownList('rapor[id_predikat_kerapian]', $rapor['id_predikat_kerapian'],Predikat::model()->dropdownModel(),array('class'=>'span12'))?></td>
        </tr>
    </table>
</span>
<span class="span3">
    <h4>Absen</h4><hr>
    <table id="absenTable" class=''>
        <tr>
            <td width='70px'>Sakit</td><td><input type="text" name="rapor[sakit]" value="<?php echo $rapor['sakit']?>" class='span3'/> Hari</td>
        </tr>
        <tr>
            <td>Ijin</td><td><input type="text" name="rapor[ijin]" value="<?php echo $rapor['ijin']?>" class='span3'/> Hari</td>
        </tr>
        <tr>
            <td>Alpha</td><td><input type="text" name="rapor[alpha]" value="<?php echo $rapor['alpha']?>" class='span3'/> Hari</td>
        </tr>
    </table>    
    <div style="text-align: right">
        <a id='setDefaultBtn' class='btn btn-mini btn-inverse' href=''><i class="icon icon-refresh icon-white"></i> Absen Dari System </a>
    </div>
</span>
<span class='span3'>
    <h4>Catatan Untuk Orang Tua</h4>
    <textarea name='rapor[catatan_orang_tua]' cols="100" rows="4"><?php echo $rapor['catatan_orang_tua']?></textarea>
    <h4>Pernyataan</h4>
    <textarea name='rapor[pernyataan]' cols="100" rows="4"><?php echo $rapor['pernyataan']?></textarea>
</span>
<div class="clear"></div>
<div class="form-actions">
    <input type="submit" value="Simpan" class="btn btn-primary">
</div>
</form>
<script type="text/javascript">
var rapor=<?php echo json_encode($rapor)?>;    
var absen=<?php echo json_encode($absenSiswa)?>;    
var isAbsenDefault=true;
$(document).ready(function(){
    $('#setDefaultBtn').click(function(event){
        event.preventDefault();
        if(isAbsenDefault){
            $(this).html('<i class="icon icon-refresh icon-white"></i> Absen Dari Inputan');
            $("input[name^='rapor[sakit]']").attr('value',absen.sakit);
            $("input[name^='rapor[ijin]']").attr('value',absen.ijin);
            $("input[name^='rapor[alpha]']").attr('value',absen.alpha);
            isAbsenDefault=false;
        }else{
            $(this).html('<i class="icon icon-refresh icon-white"></i> Absen Dari System');
            $("input[name^='rapor[sakit]']").attr('value',rapor.sakit);
            $("input[name^='rapor[ijin]']").attr('value',rapor.ijin);
            $("input[name^='rapor[alpha]']").attr('value',rapor.alpha);
            isAbsenDefault=true;
        }
    });
})
</script>