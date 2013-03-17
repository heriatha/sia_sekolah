<?php

/**
 * This is the model class for table "guru".
 *
 * The followings are the available columns in table 'guru':
 * @property integer $id
 * @property integer $id_user
 * @property string $nip
 * @property string $nama
 * @property string $alamat
 * @property string $catatan
 * @property integer $id_jenjang_pendidikan
 * @property string $instansi_pendidikan_terakhir
 * @property string $jurusan_pendidikan_terakhir
 * @property integer $is_pegawai_tetap
 * @property integer $tahunLulus
 * @property integer $id_agama
 * @property integer $id_golongan
 *
 * The followings are the available model relations:
 * @property JenjangPendidikan $idJenjangPendidikan
 * @property Agama $idAgama
 * @property User $idUser
 * @property Kelasaktif[] $kelasaktifs
 * @property MapelKelasAktif[] $mapelKelasAktifs
 * @property Sekolah[] $sekolahs
 */
class Guru extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guru the static model class
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
		return 'guru';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nip, id_jenjang_pendidikan, tahunLulus, id_golongan', 'required'),
			array('id_user, id_jenjang_pendidikan, is_pegawai_tetap, tahunLulus, id_agama, id_golongan', 'numerical', 'integerOnly'=>true),
			array('nip', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>32),
			array('alamat, catatan', 'length', 'max'=>50),
			array('instansi_pendidikan_terakhir, jurusan_pendidikan_terakhir', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, nip, nama, alamat, catatan, id_jenjang_pendidikan, id_golongan, instansi_pendidikan_terakhir, jurusan_pendidikan_terakhir, is_pegawai_tetap, tahunLulus, id_agama', 'safe', 'on'=>'search'),
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
			'idJenjangPendidikan' => array(self::BELONGS_TO, 'JenjangPendidikan', 'id_jenjang_pendidikan'),
			'idGolongan' => array(self::BELONGS_TO, 'Golongan', 'id_golongan'),
			'idAgama' => array(self::BELONGS_TO, 'Agama', 'id_agama'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'kelasaktifs' => array(self::HAS_MANY, 'Kelasaktif', 'id_guru_walikelas'),
			'mapelKelasAktifs' => array(self::HAS_MANY, 'MapelKelasAktif', 'id_guru_pengampu'),
			'sekolahs' => array(self::HAS_MANY, 'Sekolah', 'id_guru_kepsek'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'User',
			'id_golongan' => 'Golongan',
			'nip' => 'Nip',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'catatan' => 'Catatan',
			'id_jenjang_pendidikan' => 'Jenjang Pendidikan',
			'instansi_pendidikan_terakhir' => 'Instansi Pendidikan Terakhir',
			'jurusan_pendidikan_terakhir' => 'Jurusan Pendidikan Terakhir',
			'is_pegawai_tetap' => 'Pegawai Tetap',
			'tahunLulus' => 'Tahun Lulus',
			'id_agama' => 'Agama',
		);
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('id_jenjang_pendidikan',$this->id_jenjang_pendidikan);
		$criteria->compare('instansi_pendidikan_terakhir',$this->instansi_pendidikan_terakhir,true);
		$criteria->compare('jurusan_pendidikan_terakhir',$this->jurusan_pendidikan_terakhir,true);
		$criteria->compare('is_pegawai_tetap',$this->is_pegawai_tetap);
		$criteria->compare('tahunLulus',$this->tahunLulus);
		$criteria->compare('id_agama',$this->id_agama);
		$criteria->compare('id_golongan',$this->id_golongan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getCalonWaliKelas($id_tahun_ajaran,$id_guru=null){
            $select=  Yii::app()->db->createCommand()
                    ->select()
                    ->from('guru')
                    ->where('guru.id not in (select id_guru_walikelas from kelas_aktif where id_tahun_ajaran=\''.$id_tahun_ajaran.'\')');
            if($id_guru!=null)
                $select->orWhere ("guru.id='$id_guru'");
            return $select->queryAll();
        }
        public function getGuru(){
            $select=  Yii::app()->db->createCommand()
                    ->select()
                    ->from('guru')
                    ;
            return $select->queryAll();
        }
        public function dropdownModel($data){
            $result=array();
            $result[]='- Pilih Guru -';
            foreach($data as $d){
                $result[$d['id']]=$d['nama'].' ('.$d['nip'].')';
            }
            return $result;
        }
        public function findByUser($id_user){
            return Yii::app()->db->createCommand()
                    ->select()
                    ->from('guru')
                    ->where("id_user='$id_user'")->queryRow();
        }
}