<h3>Absen</h3>
<hr>
<table class="table table-striped ">
    <tr>
        <td>Kelas Aktif</td>
        <td>
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    Pilih Kelas
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <?php foreach($kelasAktif as $kelas):?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('absen/listAbsenByGuru',array('id_kelas_aktif'=>$kelas['id']))?>"><?php echo $kelas['tingkat_kelas'].' '.$kelas['kelas_paralel']?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </td>
    </tr>
</table>
<div id="load">
    
</div>