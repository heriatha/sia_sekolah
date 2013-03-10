<?php
/* @var $this AbsenController */
/* @var $model Absen */

$this->breadcrumbs=array(
	'Absen'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Absen', 'url'=>array('index')),
	array('label'=>'Create Absen', 'url'=>array('create')),
);

?>

<h3>Manage Absen</h3>
<hr>
<?php
if(date('N')==7){
    ?><div class="alert alert-error"><h4>Hari ini hari Minggu</h4></div><?php
}
?>
<table class="table">
    <tr>
        <td width="150px">Kelas</td><td>
            <?php
                if($isAdmin){
                   ?>
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo (empty($kelasAktif['tingkat_kelas']))?'Pilih Kelas':$kelasAktif['tingkat_kelas'].' '.$kelasAktif['kelas_paralel'];?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($kelasAktifList as $kelas): ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('absen/listAbsenByGuru', array('id_kelas_aktif' => $kelas['id'])) ?>"><?php echo $kelas['tingkat_kelas'] . ' ' . $kelas['kelas_paralel'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php 
                }else{
                    echo $kelasAktif['tingkat_kelas'].' '.$kelasAktif['kelas_paralel'];
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>Jumlah Siswa</td><td><?php echo KelasAktif::model()->getJumlahSiswa($kelasAktif['id'])?></td>
    </tr>
    <tr>
        <td>Walikelas</td><td><?php echo Guru::model()->findByPk($kelasAktif['id_guru_walikelas'])->nama?></td>
    </tr>
</table>
<?php if(isset($kelasAktif['id'])){?>    
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        <?php 
        $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Absen Hari Ini',
                'url'=>Yii::app()->createUrl('absen/absenSiswaHariIni',array('id_kelas_aktif'=>$kelasAktif['id'])),
                'type'=>'primary',
        )); 
        ?>    
     </div>
</div>
<div class="span7" style="text-align: right">
   
    <?php $this->renderPartial('_search_sort',array(
            'model'=>$model,
    )); ?>
        
</div>
</div>

<?php 
$this->widget('MyCGridView', array(
	'id'=>'absen-grid',
	'dataProvider'=>$model->search($kelasAktif['id']),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$row+1',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'tanggal',
            array(
                'header'=>'Masuk',
                'value'=>'AbsenSiswa::model()->getJumlahAbsenSiswa($data->id,"'.$kelasAktif['id'].'","masuk")'
            ),
            array(
                'header'=>'Ijin',
                'value'=>'AbsenSiswa::model()->getJumlahAbsenSiswa($data->id,"'.$kelasAktif['id'].'","ijin")'
            ),
            array(
                'header'=>'Sakit',
                'value'=>'AbsenSiswa::model()->getJumlahAbsenSiswa($data->id,"'.$kelasAktif['id'].'","sakit")'
            ),
            array(
                'header'=>'Alpha',
                'value'=>'AbsenSiswa::model()->getJumlahAbsenSiswa($data->id,"'.$kelasAktif['id'].'","alpha")'
            ),
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View')
                        ),
                        'update'=>array(
                            'url' => 'Yii::app()->createUrl("absen/absenSiswaHariIni", array("id_absen"=>$data->id,"id_kelas_aktif"=>'.$kelasAktif['id'].'))',
                            'label' => '',
                            'options'=>array('title'=>'Edit')
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); 
}else{
    ?><div class="alert alert-info" style="text-align: center"><h4>-- Kelas Belum dipilih --</h4></div><?php
}
?>


 <?php  
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
    ?>    
