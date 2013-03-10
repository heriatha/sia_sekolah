<?php
/* @var $this MessageController */

$this->breadcrumbs=array(
	'Message',
);
?>
<h3>Kirim SMS Reminder</h3>
<hr>
<?php if($jumlahHariAktif==null):?>
<div class="alert alert-error">
    Jumlah Hari Aktif Belum diisi
</div>
<?php endif;?>
<form>
<table class="table table-striped">
    <tr>
        <td>Bulan</td><td><?php echo CHtml::dropDownList('bulan', $bulan, Common::model()->getBulan(null,'dropdown'))?></td>
    </tr>
    <tr>
        <td>Tahun</td><td><?php echo CHtml::dropDownList('tahun', $tahun, Common::model()->getTahun())?></td>
    </tr>
    <tr>
        <td>PNS/Polisi</td><td><?php echo CHtml::dropDownList('status', $status,array('polisi'=>'Polisi','pns'=>'PNS'))?></td>
    </tr>
    <tr>
        <td colspan="2">
            <button class="btn btn-primary"><i class="icon-list icon-white"></i> Lihat</button>
        </td>
    </tr>
</table>
</form>    

<table class="table table-bordered table-striped datatable">
    <thead>
        <tr>
            <!--<th style="width: 25px">No</th>-->
            <th style="width: 70px">NIP</th>
            <th style="width: 150px">Nama</th>
            <th style="width: 75px">Polisi/PNS</th>
            <th>Isi SMS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($pegawaiList as $pegawai){
            ?>
        <tr>
            <!--<td><?php echo $no++?></td>-->
            <td><?php echo $pegawai['nip']?></td>
            <td><?php echo $pegawai['nama']?></td>
            <td><?php echo $pegawai['status']?></td>
            <td><?php echo Pegawai::model()->getSmsReminder($pegawai['status'],$pegawai['id'],$bulan,$tahun,$jumlahHariAktif)?></td>
        </tr>    
            <?php
        }
        ?>
    </tbody>
</table>
<div class="grid" style="text-align: right">
    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo Yii::app()->createUrl('message/kirimPesan',array('bulan'=>$bulan,'tahun'=>$tahun,'status'=>$status))?>" class="btn btn-primary"><i class="icon-white icon-envelope"></i> Kirim Pesan Sekarang</a>
</div>
