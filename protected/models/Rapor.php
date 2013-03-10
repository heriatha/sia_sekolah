<?php

/**
 * This is the model class for table "rapor".
 *
 * The followings are the available columns in table 'rapor':
 * @property integer $id
 * @property string $catatan_orang_tua
 * @property string $id_predikat_kelakuan
 * @property string $id_predikat_kerajinan
 * @property string $id_predikat_kerapian
 * @property string $pernyataan
 * @property integer $rangking
 * @property string $status
 * @property integer $alpha
 * @property integer $ijin
 * @property integer $sakit
 * @property integer $id_kelas_aktif
 * @property integer $id_siswa
 * @property integer $id_tahun_ajaran
 *
 * The followings are the available model relations:
 * @property Ekstrakurikuler[] $ekstrakurikulers
 * @property MapelKelasAktif[] $mapelKelasAktifs
 * @property KelasAktif $idKelasAktif
 * @property TahunAjaran $idTahunAjaran
 * @property Siswa $idSiswa
 */
class Rapor extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rapor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rapor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rangking, alpha, ijin, sakit, id_kelas_aktif, id_siswa, id_tahun_ajaran', 'numerical', 'integerOnly'=>true),
			array('catatan_orang_tua, pernyataan', 'length', 'max'=>255),
			array('id_predikat_kelakuan, id_predikat_kerajinan, id_predikat_kerapian', 'length', 'max'=>2),
			array('status', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catatan_orang_tua, id_predikat_kelakuan, id_predikat_kerajinan, id_predikat_kerapian, pernyataan, rangking, status, alpha, ijin, sakit, id_kelas_aktif, id_siswa, id_tahun_ajaran', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ekstrakurikulers' => array(self::MANY_MANY, 'Ekstrakurikuler', 'nilai_ekstrakurikuler(id_rapor, id_ekstrakurikuler)'),
			'mapelKelasAktifs' => array(self::MANY_MANY, 'MapelKelasAktif', 'nilai_siswa(id_rapor, id_mapel_kelas_aktif)'),
			'idKelasAktif' => array(self::BELONGS_TO, 'KelasAktif', 'id_kelas_aktif'),
			'idTahunAjaran' => array(self::BELONGS_TO, 'TahunAjaran', 'id_tahun_ajaran'),
			'idSiswa' => array(self::BELONGS_TO, 'Siswa', 'id_siswa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catatan_orang_tua' => 'Catatan Orang Tua',
			'id_predikat_kelakuan' => 'Id Predikat Kelakuan',
			'id_predikat_kerajinan' => 'Id Predikat Kerajinan',
			'id_predikat_kerapian' => 'Id Predikat Kerapian',
			'pernyataan' => 'Pernyataan',
			'rangking' => 'Rangking',
			'status' => 'Status',
			'alpha' => 'Alpha',
			'ijin' => 'Ijin',
			'sakit' => 'Sakit',
			'id_kelas_aktif' => 'Id Kelas Aktif',
			'id_siswa' => 'Id Siswa',
			'id_tahun_ajaran' => 'Id Tahun Ajaran',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Rapor -');
            foreach($results as $result){
                $data[$result['id']]=$result['nama'];
            }
            return $data;
        }
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('catatan_orang_tua',$this->catatan_orang_tua,true);
		$criteria->compare('id_predikat_kelakuan',$this->id_predikat_kelakuan,true);
		$criteria->compare('id_predikat_kerajinan',$this->id_predikat_kerajinan,true);
		$criteria->compare('id_predikat_kerapian',$this->id_predikat_kerapian,true);
		$criteria->compare('pernyataan',$this->pernyataan,true);
		$criteria->compare('rangking',$this->rangking);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('alpha',$this->alpha);
		$criteria->compare('ijin',$this->ijin);
		$criteria->compare('sakit',$this->sakit);
		$criteria->compare('id_kelas_aktif',$this->id_kelas_aktif);
		$criteria->compare('id_siswa',$this->id_siswa);
		$criteria->compare('id_tahun_ajaran',$this->id_tahun_ajaran);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getRaporSiswa($id_siswa,$id_kelas_aktif){
            $rapor=Yii::app()->db->createCommand()
                        ->select()
                        ->from('rapor')
                        ->where("id_siswa='$id_siswa'")
                        ->andWhere("id_kelas_aktif='$id_kelas_aktif'")
                        ->queryRow();
            $mapelAktifList=  MapelKelasAktif::model()->getMapelByKelasAktif($id_kelas_aktif);
            foreach($mapelAktifList as $mapel){
                $nilaiSiswa= Yii::app()->db->createCommand()->select()
                        ->from('nilai_siswa')
                        ->where("id_rapor='$rapor[id]' and id_mapel_kelas_aktif='$mapel[id]'")->queryRow();
                if(empty($nilaiSiswa['id_rapor'])){
                    $nilaiSiswa=new NilaiSiswa();
                    $nilaiSiswa->id_mapel_kelas_aktif=$mapel['id'];
                    $nilaiSiswa->id_rapor=$rapor['id'];
                    $nilaiSiswa->nilai=0;
                    $nilaiSiswa->save();
                }
            }
            $rapor['nilaiMapel']=  Yii::app()->db->createCommand()
                    ->select("nilai_siswa.*,mapel.nama as mapel")
                    ->from('nilai_siswa')
                    ->join('mapel_kelas_aktif', "nilai_siswa.id_mapel_kelas_aktif=mapel_kelas_aktif.id")
                    ->join('mapel', "mapel.id=mapel_kelas_aktif.id_mapel")
                    ->where("nilai_siswa.id_rapor='$rapor[id]'")
                    ->queryAll();
            $rapor['nilaiEkstraKurikuler']=  Yii::app()->db->createCommand()
                    ->select("nilai_ekstrakurikuler.*,ekstrakurikuler.nama as ekstrakurikuler")
                    ->from('nilai_ekstrakurikuler')
                    ->join('ekstrakurikuler', "nilai_ekstrakurikuler.id_ekstrakurikuler=ekstrakurikuler.id")
                    ->where("nilai_ekstrakurikuler.id_rapor='$rapor[id]'")
                    ->queryAll();
            return $rapor;
        }       
        function getRaporByKelasAktif($id_kelas_aktif){
            return Yii::app()->db->createCommand()
                    ->select("rapor.*,rapor.id as id_rapor,siswa.nama as siswa,siswa.nis")
                    ->from('rapor')
                    ->join('siswa','siswa.id=rapor.id_siswa')
                    ->join('kelas_aktif','rapor.id_kelas_aktif=kelas_aktif.id')
                    ->where("kelas_aktif.id='$id_kelas_aktif'")
                    ->queryAll();
        }
}