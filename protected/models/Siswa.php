<?php

/**
 * This is the model class for table "siswa".
 *
 * The followings are the available columns in table 'siswa':
 * @property integer $id
 * @property string $nis
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $alamat_siswa
 * @property string $danem
 * @property string $no_ijazah
 * @property string $sekolah_asal
 * @property string $alamat_sekolah_asal
 * @property integer $status
 * @property string $tahun_ijazah
 * @property string $tanggal_diterima
 * @property integer $id_tingkat_kelas_diterima
 * @property integer $jurusan_idJurusan
 * @property integer $id_tahun_ajaran_diterima
 * @property string $nama_ayah
 * @property string $alamat_ayah
 * @property integer $id_pendidikan_ayah
 * @property string $pekerjaan_ayah
 * @property integer $penghasilan_ayah
 * @property string $nama_ibu
 * @property string $alamat_ibu
 * @property integer $id_pendidikan_ibu
 * @property string $pekerjaan_ibu
 * @property integer $penghasilan_ibu
 * @property string $nama_wali
 * @property string $hubungan_dengan_wali
 * @property string $alamat_wali
 * @property integer $id_pendidikan_wali
 * @property string $pekerjaan_wali
 * @property integer $penghasilan_wali
 * @property integer $id_agama
 *
 * The followings are the available model relations:
 * @property Rapor[] $rapors
 * @property TahunAjaran $idTahunAjaranDiterima
 * @property Jurusan $jurusanIdJurusan
 * @property TingkatKelas $idTingkatKelasDiterima
 * @property Agama $idAgama
 * @property Guru $idPendidikanAyah
 * @property Guru $idPendidikanIbu
 * @property Guru $idPendidikanWali
 */
class Siswa extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Siswa the static model class
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
		return 'siswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nis, nama, jenis_kelamin, danem, status', 'required'),
			array('status, id_tingkat_kelas_diterima, jurusan_idJurusan, id_tahun_ajaran_diterima, id_pendidikan_ayah, penghasilan_ayah, id_pendidikan_ibu, penghasilan_ibu, id_pendidikan_wali, penghasilan_wali, id_agama', 'numerical', 'integerOnly'=>true),
			array('nis', 'length', 'max'=>13),
			array('nama, tempat_lahir, sekolah_asal', 'length', 'max'=>32),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('alamat_siswa, alamat_sekolah_asal, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, nama_wali', 'length', 'max'=>50),
			array('danem', 'length', 'max'=>10),
			array('no_ijazah', 'length', 'max'=>25),
			array('tahun_ijazah', 'length', 'max'=>14),
			array('alamat_ayah, alamat_ibu, hubungan_dengan_wali, alamat_wali, pekerjaan_wali', 'length', 'max'=>100),
			array('tanggal_lahir, tanggal_diterima', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nis, nama, jenis_kelamin, tanggal_lahir, tempat_lahir, alamat_siswa, danem, no_ijazah, sekolah_asal, alamat_sekolah_asal, status, tahun_ijazah, tanggal_diterima, id_tingkat_kelas_diterima, jurusan_idJurusan, id_tahun_ajaran_diterima, nama_ayah, alamat_ayah, id_pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, alamat_ibu, id_pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, hubungan_dengan_wali, alamat_wali, id_pendidikan_wali, pekerjaan_wali, penghasilan_wali, id_agama', 'safe', 'on'=>'search'),
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
			'rapors' => array(self::HAS_MANY, 'Rapor', 'id_siswa'),
			'idTahunAjaranDiterima' => array(self::BELONGS_TO, 'TahunAjaran', 'id_tahun_ajaran_diterima'),
			'jurusanIdJurusan' => array(self::BELONGS_TO, 'Jurusan', 'jurusan_idJurusan'),
			'idTingkatKelasDiterima' => array(self::BELONGS_TO, 'TingkatKelas', 'id_tingkat_kelas_diterima'),
			'idAgama' => array(self::BELONGS_TO, 'Agama', 'id_agama'),
			'idPendidikanAyah' => array(self::BELONGS_TO, 'Guru', 'id_pendidikan_ayah'),
			'idPendidikanIbu' => array(self::BELONGS_TO, 'Guru', 'id_pendidikan_ibu'),
			'idPendidikanWali' => array(self::BELONGS_TO, 'Guru', 'id_pendidikan_wali'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nis' => 'Nis',
			'nama' => 'Nama',
			'jenis_kelamin' => 'Jenis Kelamin',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tempat_lahir' => 'Tempat Lahir',
			'alamat_siswa' => 'Alamat Siswa',
			'danem' => 'Danem',
			'no_ijazah' => 'No Ijazah',
			'sekolah_asal' => 'Sekolah Asal',
			'alamat_sekolah_asal' => 'Alamat Sekolah Asal',
			'status' => 'Status',
			'tahun_ijazah' => 'Tahun Ijazah',
			'tanggal_diterima' => 'Tanggal Diterima',
			'id_tingkat_kelas_diterima' => 'Id Tingkat Kelas Diterima',
			'jurusan_idJurusan' => 'Jurusan Id Jurusan',
			'id_tahun_ajaran_diterima' => 'Id Tahun Ajaran Diterima',
			'nama_ayah' => 'Nama Ayah',
			'alamat_ayah' => 'Alamat Ayah',
			'id_pendidikan_ayah' => 'Id Pendidikan Ayah',
			'pekerjaan_ayah' => 'Pekerjaan Ayah',
			'penghasilan_ayah' => 'Penghasilan Ayah',
			'nama_ibu' => 'Nama Ibu',
			'alamat_ibu' => 'Alamat Ibu',
			'id_pendidikan_ibu' => 'Id Pendidikan Ibu',
			'pekerjaan_ibu' => 'Pekerjaan Ibu',
			'penghasilan_ibu' => 'Penghasilan Ibu',
			'nama_wali' => 'Nama Wali',
			'hubungan_dengan_wali' => 'Hubungan Dengan Wali',
			'alamat_wali' => 'Alamat Wali',
			'id_pendidikan_wali' => 'Id Pendidikan Wali',
			'pekerjaan_wali' => 'Pekerjaan Wali',
			'penghasilan_wali' => 'Penghasilan Wali',
			'id_agama' => 'Id Agama',
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
		$criteria->compare('nis',$this->nis,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('alamat_siswa',$this->alamat_siswa,true);
		$criteria->compare('danem',$this->danem,true);
		$criteria->compare('no_ijazah',$this->no_ijazah,true);
		$criteria->compare('sekolah_asal',$this->sekolah_asal,true);
		$criteria->compare('alamat_sekolah_asal',$this->alamat_sekolah_asal,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tahun_ijazah',$this->tahun_ijazah,true);
		$criteria->compare('tanggal_diterima',$this->tanggal_diterima,true);
		$criteria->compare('id_tingkat_kelas_diterima',$this->id_tingkat_kelas_diterima);
		$criteria->compare('jurusan_idJurusan',$this->jurusan_idJurusan);
		$criteria->compare('id_tahun_ajaran_diterima',$this->id_tahun_ajaran_diterima);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('alamat_ayah',$this->alamat_ayah,true);
		$criteria->compare('id_pendidikan_ayah',$this->id_pendidikan_ayah);
		$criteria->compare('pekerjaan_ayah',$this->pekerjaan_ayah,true);
		$criteria->compare('penghasilan_ayah',$this->penghasilan_ayah);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('alamat_ibu',$this->alamat_ibu,true);
		$criteria->compare('id_pendidikan_ibu',$this->id_pendidikan_ibu);
		$criteria->compare('pekerjaan_ibu',$this->pekerjaan_ibu,true);
		$criteria->compare('penghasilan_ibu',$this->penghasilan_ibu);
		$criteria->compare('nama_wali',$this->nama_wali,true);
		$criteria->compare('hubungan_dengan_wali',$this->hubungan_dengan_wali,true);
		$criteria->compare('alamat_wali',$this->alamat_wali,true);
		$criteria->compare('id_pendidikan_wali',$this->id_pendidikan_wali);
		$criteria->compare('pekerjaan_wali',$this->pekerjaan_wali,true);
		$criteria->compare('penghasilan_wali',$this->penghasilan_wali);
		$criteria->compare('id_agama',$this->id_agama);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        function save($runValidation = true, $attributes = null) {
            $this->tanggal_lahir=$this->date2mysql($this->tanggal_lahir);
            $this->tanggal_diterima=$this->date2mysql($this->tanggal_diterima);
            return parent::save($runValidation, $attributes);
        }
        function findByPk($pk, $condition = '', $params = array()) {
            $result=parent::findByPk($pk, $condition, $params);
            $result['tanggal_lahir']=  $this->datefmysql($result['tanggal_lahir']);
            $result['tanggal_diterima']=  $this->datefmysql($result['tanggal_diterima']);
            return $result;
        }
        function getSiswaByKelasAktif($id_kelas_aktif){
            return Yii::app()->db->createCommand("
                    select * from siswa where siswa.id in (select id_siswa from rapor where id_kelas_aktif='$id_kelas_aktif')
                ")->queryAll();
        }
        function getSiswaBaru($id_tingkat_kelas){
            return Yii::app()->db->createCommand("
                    select * from siswa where siswa.id not in (select id_siswa from rapor) and 
                    id_tingkat_kelas_diterima='$id_tingkat_kelas'
                ")->queryAll();
                    
        }
}