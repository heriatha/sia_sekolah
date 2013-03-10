<form action="<?php echo Yii::app()->createUrl('absen/absenSiswaHariIni',$_GET)?>" method="post">
<h3>Absen Siswa</h3><hr>
<?php
if(date('N')==7){
    ?><div class="alert alert-error"><h4>Hari ini hari Minggu</h4></div><?php
}
?>
<table class="table">
    <tr>
        <td width="150px">Kelas</td><td><?php echo $kelasAktif['tingkat_kelas'].' '.$kelasAktif['kelas_paralel']?></td>
    </tr>
    <tr>
        <td>Jumlah Siswa</td><td><?php echo KelasAktif::model()->getJumlahSiswa($kelasAktif['id'])?></td>
    </tr>
    <tr>
        <td>Walikelas</td><td><?php echo Guru::model()->findByPk($kelasAktif['id_guru_walikelas'])->nama?></td>
    </tr>
    <tr>
        <td>Tanggal</td><td><?php echo $tanggal?><input type="hidden" name="tanggal" class="tanggal span2" value="<?php echo $tanggal?>"></td>
    </tr>
</table>
    
<div style="width: 100%">
    <div style="text-align: left" class="span5">
        <a id="" class="btn btn-primary"><i class="icon-back icon-white"></i> List Absen</a>
    </div>
    <div style="text-align: right" class="span7">
        <button id="buttonSetDefault" class="btn btn-primary">Set Semua Masuk</button>
    </div>
</div>
    <br><br><br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Absen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswaList as $siswa) {
            $absenSelected='';
            
            if($idAbsen!=null){
                $absenSelected=  Absen::model()->getAbsenSiswa($idAbsen,$siswa['id_rapor']);
                $absenSelected=$absenSelected['absen'];
            }
            ?><tr>
                <td><?php echo $siswa['nis'];//$this->show_array($siswa) ?></td>
                <td><?php echo $siswa['siswa'] ?></td>
                <td>
                    <?php echo CHtml::dropDownList("absenSiswa[$siswa[id_rapor]][absen]", $absenSelected, Absen::model()->dropdownModel(),array('class'=>'absen'))?>
                    <?php echo CHtml::hiddenField("absenSiswa[$siswa[id_rapor]][id_rapor]", $siswa['id_rapor'])?>
                </td>
            </tr><?php }
        ?>
    </tbody>
</table>
<div class="form-actions">
    <input type="Submit" value="Simpan" class="btn btn-primary">
    <input type="reset" value="Reset" class="btn btn-danger">
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $("#buttonSetDefault").click(function(event){
        event.preventDefault();
        $('.absen').attr('value', 'masuk');
    });
})
</script>