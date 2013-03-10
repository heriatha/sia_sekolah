<?php
Yii::import('zii.widgets.CMenu');

class MainMenu extends CMenu{
    //put your code here
    var $menu=array();
    function __construct($owner = null) {
        parent::__construct($owner);
        $tahunAjaran= TahunAjaran::model()->getTahunAjaranAktif();
        
        $this->menu=array(
            array('module'=>'Master Data',
                'menu'=>array(
                    array('title'=>'Profile Sekolah','url'=>'sekolah/admin','access'=>array('tu'=>1)),
                    array('title'=>'Guru','url'=>'guru/admin','access'=>array('tu'=>1)),
                    array('title'=>'Agama','url'=>'agama/admin','access'=>array('tu'=>1)),
                    array('title'=>'Siswa','url'=>'siswa/admin','access'=>array('tu'=>1)),
                    array('title'=>'Semester','url'=>'semester/admin','access'=>array('tu'=>1)),
                    array('title'=>'Tingkat Kelas','url'=>'tingkatKelas/admin','access'=>array('tu'=>1)),
                    array('title'=>'Estrakurikuler','url'=>'ekstrakurikuler/admin','access'=>array('tu'=>1)),
                    array('title'=>'Jenjang Pendidikan','url'=>'jenjangPendidikan','access'=>array('tu'=>1)),
                ),
            ),
            array('module'=>'Master Akademik',
                'menu'=>array(
                    array('title'=>'Predikat Nilai','url'=>'predikat/admin','access'=>array('tu'=>1)),
                    array('title'=>'Kurikulum','url'=>'kurikulum/admin','access'=>array('tu'=>1)),
                    array('title'=>'Kelas Paralel','url'=>'kelasParalel/admin','access'=>array('tu'=>1)),
                    array('title'=>'Kategori Matapelajaran','url'=>'kategoriMapel','access'=>array('tu'=>1)),
                    array('title'=>'Matapelajaran','url'=>'mapel/admin','access'=>array('tu'=>1)),
                    array('title'=>'Tahun Ajaran','url'=>'tahunAjaran/admin','access'=>array('tu'=>1)),
                    array('title'=>'Absen','url'=>'absen/admin','access'=>array('tu'=>1)),
                    array('title'=>'Absen','url'=>'absen/listAbsenByGuru','access'=>array('guru'=>1)),
                    array('title'=>'Kelas','url'=>'kelasAktif/admin','param'=>array('KelasAktif[id_tahun_ajaran]'=>$tahunAjaran['id']),'access'=>array('tu'=>1)),
                    array('title'=>'Nilai Siswa','url'=>'mapelKelasAktif/nilaiSiswa','param'=>array('KelasAktif[id_tahun_ajaran]'=>$tahunAjaran['id']),'access'=>array('guru'=>1)),
                    array('title'=>'Rapor Siswa','url'=>'rapor/viewByGuru','param'=>array('KelasAktif[id_tahun_ajaran]'=>$tahunAjaran['id']),'access'=>array('guru'=>1)),
                    array('title'=>'Rapor Siswa','url'=>'rapor/admin','param'=>array('KelasAktif[id_tahun_ajaran]'=>$tahunAjaran['id']),'access'=>array('tu'=>1)),
                ),
            ),
            array('module'=>'Nilai Kelas',
                'menu'=>array(
//                    array('title'=>'Tahun Ajaran','url'=>'agama/admin'),
//                    array('title'=>'Tahun Ajaran','url'=>'agama/admin'),
                ),
            ),
        );
    }
    function getMenu(){
        return $this->menu;
    }
    function run() {
        parent::run();
    }
    function generateMenu(){
        echo '<div class="easyui-accordion" fit="true" border="false">';
        $userType=  Yii::app()->user->getUserType();
        foreach($this->menu as $menu){
            echo '<div title="'.$menu['module'].'" selected="true" style="overflow:auto;" class="module-menu">';
            echo '<ul>';
            foreach($menu['menu'] as $m){
                if(isset($m[$userType])&& $m[$userType]){
                    echo "<li><a href=".Yii::app()->createUrl($m['url']).">".$m['title']."</a></li>";
                }
            }
            echo '</ul>';
            echo '</div>';
        }
        echo '</div>';
    }
}

?>
