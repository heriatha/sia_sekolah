<h3>History Pesan</h3>
<hr>
<table class="table table-striped">
    <tr>
        <td>Tanggal, Jam</td><td><?php echo Common::model()->datefmysql($pesan['tanggal']).' '.$pesan['jam']?></td>
    </tr>
    <tr>
        <td>Type</td><td><?php echo $pesan['status']?></td>
    </tr>
</table>
<a class="btn btn-primary" href="<?php echo Yii::app()->request->url?>" rel="tooltip" data-original-title="Klik tombol ini untuk cek sms terkirim"><i class="icon icon-refresh icon-white"></i> Refresh</a>
    <br><br>
<table class="table table-bordered table-striped datatable">
    <thead>
        <tr>
            <th style="width: 25px">No</th>
            <th style="width: 100px">NIP</th>
            <th style="width: 150px">Nama</th>
            <th style="width: 75px">Polisi/PNS</th>
            <th>Isi SMS</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($pesanPegawai as $pegawai){
            $param=array();
            foreach ($pegawai['id_send_item'] as $key => $value) {
                $param["id_send_item[$key]"]=$value;
            }
            $param['id_pesan']=$_GET['id_pesan'];
            ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $pegawai['nip']?></td>
            <td><?php echo $pegawai['nama']?></td>
            <td><?php echo $pegawai['status']?></td>
            <td><?php echo Pesan::model()->getMessage($pegawai['id_send_item'],$pegawai['is_terkirim'])?></td>
            <td><?php echo ($pegawai['is_terkirim'])?'TERKIRIM':'PENDING'?></td>
           <td class="button-column"><?php echo (!$pegawai['is_terkirim'])?"<a class='delete' rel='tooltip' data-original-title='Kirim Ulang'
               href='".Yii::app()->createUrl('message/resend',$param)."' onclick='return confirm(\"Apakah anda yakin akan mengirim ulang sms untuk $pegawai[nama]?\")'><i class='icon-refresh'></i></a>":''?></td>
        </tr>    
            <?php
        }
        ?>
    </tbody>
</table>