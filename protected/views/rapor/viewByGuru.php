<h3>Rapor Siswa</h3><hr>
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
</table>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswaList as $siswa) {
            ?><tr>
                <td><?php echo $siswa['nis'] ?></td>
                <td><?php echo $siswa['nama'] ?></td>
                <td class="button-column"><a href="<?php echo Yii::app()->createUrl('rapor/editRapor',array('id_siswa'=>$siswa['id'],'id_kelas_aktif'=>$id_kelas_aktif))?>" 
                                             rel="tooltip" data-original-title="Rapor"><i class="icon icon-page "></i></a></td>
            </tr><?php }
        ?>
    </tbody>
</table>