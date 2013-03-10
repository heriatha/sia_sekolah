<?php

/**
 * This is the model class for table "mapel".
 *
 * The followings are the available columns in table 'mapel':
 * @property integer $id
 * @property string $kd_mapel
 * @property string $diskripsi
 * @property integer $kkm
 * @property string $nama
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property KategoriMapelRef[] $kategoriMapelRefs
 * @property MapelKelasAktif[] $mapelKelasAktifs
 * @property Kelas[] $kelases
 */
class Mapel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mapel the static model class
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
		return 'mapel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kkm, status', 'required'),
			array('kkm, status', 'numerical', 'integerOnly'=>true),
			array('kd_mapel', 'length', 'max'=>10),
			array('diskripsi', 'length', 'max'=>50),
			array('nama', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kd_mapel, diskripsi, kkm, nama, status', 'safe', 'on'=>'search'),
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
			'kategoriMapelRefs' => array(self::HAS_MANY, 'KategoriMapelRef', 'id_mapel'),
			'mapelKelasAktifs' => array(self::HAS_MANY, 'MapelKelasAktif', 'id_mapel'),
			'kelases' => array(self::MANY_MANY, 'Kelas', 'matapelajaran_kelas_ref(id_mapel, id_kelas)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kd_mapel' => 'Kd Mapel',
			'diskripsi' => 'Diskripsi',
			'kkm' => 'Kkm',
			'nama' => 'Nama',
			'status' => 'Status',
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
		$criteria->compare('kd_mapel',$this->kd_mapel,true);
		$criteria->compare('diskripsi',$this->diskripsi,true);
		$criteria->compare('kkm',$this->kkm);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getMapelUncategoriesByIdKurikulum($id_kurikulum){
            $query=  Yii::app()->db
                    ->createCommand()
                    ->select('mapel.*,ref.*')
                    ->from('kategori_mapel_ref ref')
                    ->join('mapel','mapel.id=ref.id_mapel')
                    ->where("ref.id_kurikulum='$id_kurikulum'")
                    ->andWhere("ref.id_kategori is null")
                    ;
            return $query->queryAll();
        }
        public function getMapelByIdKategori($id_kategori){
            $query=  Yii::app()->db
                    ->createCommand()
                    ->select('mapel.*,ref.*')
                    ->from('kategori_mapel_ref ref')
                    ->join('mapel','mapel.id=ref.id_mapel')
                    ->where("ref.id_kategori='$id_kategori'");
            return $query->queryAll();
        }
        public function pilihanMapel($id_kurikulum){
            $query=Yii::app()->db
                    ->createCommand()
                    ->select('mapel.*')
                    ->from('mapel')
                    ->where("mapel.id not in (select id_mapel from kategori_mapel_ref where id_kurikulum='$id_kurikulum')")
                    ;
            return $query->queryAll();
        }
        public function pilihanMapelKelas($id_kelas){
            $kelas=  Kelas::model()->findByPk($id_kelas);
            $query=Yii::app()->db
                    ->createCommand()
                    ->select('mapel.*')
                    ->from('kategori_mapel_ref')
                    ->join('mapel','mapel.id=kategori_mapel_ref.id_mapel')
                    ->where("mapel.id not in (select id_mapel from mapel_kelas_ref where id_kelas='$id_kelas')")
                    ->andWhere("kategori_mapel_ref.id_kurikulum='$kelas[id_kurikulum]'")
                    ;
            return $query->queryAll();
        }
}