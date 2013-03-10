<a href="<?php echo Yii::app()->createUrl('kelasAktif/create',array('id_tahun_ajaran'=>$id_tahun_ajaran))?>"
   target="ajax-modal" class="btn btn-primary"><i class="icon icon-add icon-white"></i> Buka Kelas Baru</a><br/><br/>

<table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Kuota</th>
            <th>Isi</th>
            <th>Walikelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=1;
            foreach($kelasList as $kelas):?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $kelas['tingkat_kelas'].' '.$kelas['kelas_paralel']?></td>
            <td><?php echo $kelas['kuota']?></td>
            <td><?php echo $kelas['isi']?></td>
            <td><?php echo $kelas['walikelas']?></td>
            <td></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>