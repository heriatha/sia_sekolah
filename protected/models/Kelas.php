<?php

/**
 * This is the model class for table "kelas".
 *
 * The followings are the available columns in table 'kelas':
 * @property integer $id
 * @property integer $id_jurusan
 * @property integer $id_kurikulum
 * @property integer $id_semester
 * @property integer $id_tingkat_kelas
 *
 * The followings are the available model relations:
 * @property Semester $idSemester
 * @property TingkatKelas $idTingkatKelas
 * @property Kurikulum $idKurikulum
 * @property Jurusan $idJurusan
 * @property Kelasaktif[] $kelasaktifs
 * @property Mapel[] $mapels
 */
class Kelas extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kelas the static model class
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
		return 'kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jurusan, id_kurikulum, id_semester, id_tingkat_kelas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_jurusan, id_kurikulum, id_semester, id_tingkat_kelas', 'safe', 'on'=>'search'),
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
			'idSemester' => array(self::BELONGS_TO, 'Semester', 'id_semester'),
			'idTingkatKelas' => array(self::BELONGS_TO, 'TingkatKelas', 'id_tingkat_kelas'),
			'idKurikulum' => array(self::BELONGS_TO, 'Kurikulum', 'id_kurikulum'),
			'idJurusan' => array(self::BELONGS_TO, 'Jurusan', 'id_jurusan'),
			'kelasaktifs' => array(self::HAS_MANY, 'Kelasaktif', 'id_kelas'),
			'mapels' => array(self::MANY_MANY, 'Mapel', 'matapelajaran_kelas_ref(id_kelas, id_mapel)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_jurusan' => 'Jurusan',
			'id_kurikulum' => 'Kurikulum',
			'id_semester' => 'Semester',
			'id_tingkat_kelas' => 'Tingkat Kelas',
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
		$criteria->compare('id_jurusan',$this->id_jurusan);
		$criteria->compare('id_kurikulum',$this->id_kurikulum);
		$criteria->compare('id_semester',$this->id_semester);
		$criteria->compare('id_tingkat_kelas',$this->id_tingkat_kelas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getKelas($id_tingkat_kelas,$id_semester,$id_kurikulum){
            $kelas=Yii::app()->db->createCommand()
                    ->select()
                    ->from('kelas')
                    ->where("id_tingkat_kelas='$id_tingkat_kelas'")
                    ->andWhere("id_semester='$id_semester'")
                    ->andWhere("id_kurikulum='$id_kurikulum'")
                    ->queryRow()
                    ;
            if(!isset($kelas['id'])){
                $kelas=new Kelas;
                $kelas->id_kurikulum        =$id_kurikulum;
                $kelas->id_semester         =$id_semester;
                $kelas->id_tingkat_kelas    =$id_tingkat_kelas;
                $kelas->save();
                return $this->getKelas($id_tingkat_kelas, $id_semester, $id_kurikulum);
            }  else {
                return $kelas;
            }
            
        }
        public function getMapel($id_tingkat_kelas,$id_semester,$id_kurikulum){
            $kelas=$this->getKelas($id_tingkat_kelas, $id_semester, $id_kurikulum);
            $mapelQuery=  Yii::app()->db->createCommand()
                    ->select("*,mapel_kelas_ref.kkm")
                    ->from('mapel_kelas_ref')
                    ->join('mapel','mapel.id=id_mapel')
                    ->where("id_kelas='$kelas[id]'")
                    ->queryAll();
            return $mapelQuery;
        }
 
        function tambahMapel($data,$id_kelas){
            $connection=Yii::app()->db;
            $transaction    = $connection->beginTransaction();
            try{
                foreach($data['mapel'] as $id_mapel){
                    $d['id_kelas']      =$id_kelas;
                    $d['id_mapel']      =$id_mapel;
                    $d['kkm']           =$data['kkm'][$id_mapel];
                    $connection->createCommand()
                            ->insert('mapel_kelas_ref', $d);
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollback();
                return false;
            }
        }
        function hapusMapel($id_kelas,$id_mapel){
            $where="id_mapel='$id_mapel'";
           $where.=" and id_kelas='$id_kelas'";
            return Yii::app()->db
                    ->createCommand()
                    ->delete('mapel_kelas_ref',$where)
                    ;
        }
        
}