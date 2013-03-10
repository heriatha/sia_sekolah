<?php

/**
 * This is the model class for table "mapel_kelas_aktif".
 *
 * The followings are the available columns in table 'mapel_kelas_aktif':
 * @property integer $id
 * @property integer $id_guru_pengampu
 * @property integer $id_kelas_aktif
 * @property integer $id_mapel
 * @property string $kkm
 *
 * The followings are the available model relations:
 * @property KelasAktif $idKelasAktif
 * @property Mapel $idMapel
 * @property Guru $idGuruPengampu
 * @property Rapor[] $rapors
 */
class MapelKelasAktif extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MapelKelasAktif the static model class
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
		return 'mapel_kelas_aktif';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kkm', 'required'),
			array('id_guru_pengampu, id_kelas_aktif, id_mapel', 'numerical', 'integerOnly'=>true),
			array('kkm', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_guru_pengampu, id_kelas_aktif, id_mapel, kkm', 'safe', 'on'=>'search'),
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
			'idKelasAktif' => array(self::BELONGS_TO, 'KelasAktif', 'id_kelas_aktif'),
			'idMapel' => array(self::BELONGS_TO, 'Mapel', 'id_mapel'),
			'idGuruPengampu' => array(self::BELONGS_TO, 'Guru', 'id_guru_pengampu'),
			'rapors' => array(self::MANY_MANY, 'Rapor', 'nilai_siswa(id_matapelajaran_kelas_aktif, id_rapor)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_guru_pengampu' => 'Id Guru Pengampu',
			'id_kelas_aktif' => 'Id Kelas Aktif',
			'id_mapel' => 'Id Mapel',
			'kkm' => 'Kkm',
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
		$criteria->compare('id_guru_pengampu',$this->id_guru_pengampu);
		$criteria->compare('id_kelas_aktif',$this->id_kelas_aktif);
		$criteria->compare('id_mapel',$this->id_mapel);
		$criteria->compare('kkm',$this->kkm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getMapelByKelasAktif($id_kelas_aktif){
            return Yii::app()->db->createCommand()
                    ->select("guru.nama as pengampu, tk.nama as tingkat_kelas,
                        kelas_paralel.nama as kelas_paralel,mapel.nama as mapel,mka.*")
                    ->from('mapel_kelas_aktif mka')
                    ->leftJoin('guru', 'guru.id=mka.id_guru_pengampu')
                    ->join('mapel','mapel.id=mka.id_mapel')
                    ->join('kelas_aktif ka','ka.id=mka.id_kelas_aktif')
                    ->join('kelas','kelas.id=ka.id_kelas')
                    ->join('tingkat_kelas tk','tk.id=kelas.id_tingkat_kelas')
                    ->join('kelas_paralel','kelas_paralel.id=ka.id_kelas_paralel')
                    ->where("ka.id='$id_kelas_aktif'")
                    ->queryAll()
                    ;
        }
        public function setGuruMapel($data=array()){
            $connection=Yii::app()->db;
            $transaction    = $connection->beginTransaction();
            try{
                foreach($data as $id=>$id_guru){
                    $connection->createCommand()->update('mapel_kelas_aktif', array('id_guru_pengampu'=>$id_guru),"id='$id'");
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollback();
                return false;
            }
        }
        public function getMapelByGuruPengampu($id_guru,$id_tahun_ajaran){
            return Yii::app()->db->createCommand()
                    ->select('mapel_kelas_aktif.*,mapel.nama as mapel,kelas_paralel.nama as kelas_paralel,tingkat_kelas.nama as tingkat_kelas')
                    ->from('mapel_kelas_aktif')
                    ->join('mapel','mapel.id=mapel_kelas_aktif.id_mapel')
                    ->join('kelas_aktif','kelas_aktif.id=mapel_kelas_aktif.id_kelas_aktif')
                    ->join('kelas_paralel', 'kelas_paralel.id=kelas_aktif.id_kelas_paralel')
                    ->join('kelas','kelas_aktif.id_kelas=kelas.id')
                    ->join('tingkat_kelas','tingkat_kelas.id=kelas.id_tingkat_kelas')
                    ->where("id_guru_pengampu='$id_guru'")
                    ->andWhere("id_tahun_ajaran='$id_tahun_ajaran'")
                    ->order("mapel.nama,tingkat_kelas.nama,kelas_paralel.nama")
                    ->queryAll();
        }
        
        public function getCbModel($mapel_kelas_aktif){
            $results=$mapel_kelas_aktif;
            $data=array(''=>'- Pilih Matapelajaran -');
            foreach($results as $result){
                $data[$result['id']]=$result['mapel']." ($result[tingkat_kelas] $result[kelas_paralel])";
            }
            return $data;
        }
}