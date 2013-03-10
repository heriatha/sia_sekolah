<table style="width: 95%">
    <tr>
        <td style="width: 40%;vertical-align: top">
            <fieldset>
                <legend><h5>Kelas Asal</h5></legend>
                <?php
                echo CHtml::form(Yii::app()->createUrl('kelasAktif/tambahSiswa',array('id_kelas_aktif'=>$id_kelas_aktif)),'GET',array('id'=>'siswaAsalForm'));
                echo CHtml::dropDownList('id_kelas_aktif_asal', $id_kelas_aktif_asal, KelasAktif::model()->getCbModel($asalKelasAktif,array('-1'=>'Siswa Baru')),array('onchange'=>'$("#siswaAsalForm").submit()'));
                echo CHtml::endForm();
                ?>
                <form action="<?php echo Yii::app()->createUrl('kelasAktif/tambahSiswa',array('id_kelas_aktif'=>$id_kelas_aktif,'id_kelas_aktif_asal'=>$id_kelas_aktif_asal))?>" 
                      id="tambahSiswaForm" method="POST">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th><th>NIS</th><th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($siswaKelasLama as $siswa){
                                ?>
                            <tr>
                                <td><input type="checkbox" name="tambahSiswa[]" value="<?php echo $siswa['id']?>"></td>
                                <td><?php echo $siswa['nis']?></td>
                                <td><?php echo $siswa['nama']?></td>
                            </tr>    
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>    
            </fieldset>
        </td>
        <td style="width: 15%;vertical-align: middle;text-align: center"><button class="btn btn-primary" onclick="$('#tambahSiswaForm').submit()">Tambahkan >></button></td>
        <td style="width: 40%;vertical-align: top">
            <fieldset>
                <legend><h5>Kelas Baru</h5></legend>
                <?php echo "Kelas $kelasTujuan[tingkat_kelas] $kelasTujuan[kelas_paralel]";?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th><th>NIS</th><th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($siswaKelasAktif as $siswa){
                            ?>
                        <tr>
                            <td><input type="checkbox" name="siswa[]" value="<?php echo $siswa['id']?>"></td>
                            <td><?php echo $siswa['nis']?></td>
                            <td><?php echo $siswa['nama']?></td>
                        </tr>    
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </fieldset>
        </td>
    </tr>
</table>
