<?php

/**
 * This is the model class for table "absen".
 *
 * The followings are the available columns in table 'absen':
 * @property integer $id
 * @property integer $id_tahun_ajaran
 * @property string $tanggal
 *
 * The followings are the available model relations:
 * @property TahunAjaran $idTahunAjaran
 * @property Rapor[] $rapors
 */
class Absen extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Absen the static model class
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
		return 'absen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tahun_ajaran, tanggal', 'required'),
			array('id_tahun_ajaran', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_tahun_ajaran, tanggal', 'safe', 'on'=>'search'),
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
			'idTahunAjaran' => array(self::BELONGS_TO, 'TahunAjaran', 'id_tahun_ajaran'),
			'rapors' => array(self::MANY_MANY, 'Rapor', 'absen_siswa(id_absen, id_rapor)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_tahun_ajaran' => 'Tahun Ajaran',
			'tanggal' => 'Tanggal',
		);
	}

        public function dropdownModel(){
            return array(
                ''=>'- Pilih -',
                'masuk' => 'Masuk',
                'sakit' => 'Sakit',
                'ijin' => 'Ijin',
                'alpha' => 'Tanpa Keterangan'
            );$results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Absen -');
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
		$criteria->compare('id_tahun_ajaran',$this->id_tahun_ajaran);
		$criteria->compare('tanggal',$this->tanggal,true);
                $criteria->order="tanggal desc";
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        function getAbsenByTanggal($tanggal,$is_insert=true){
            $absen=  Yii::app()->db->createCommand()
                    ->select()
                    ->from('absen')
                    ->where("tanggal='$tanggal'")
                    ->queryRow();
            
            if($is_insert && empty($absen['id'])){ 
                $tahunAjaran=  TahunAjaran::model()->getTahunAjaranAktif();
                $this->id_tahun_ajaran=$tahunAjaran['id'];
                Yii::app()->db->createCommand()->insert('absen', array('id_tahun_ajaran'=>$tahunAjaran['id'],'tanggal'=>$tanggal));
                return $this->getAbsenByTanggal($tanggal);
            }
            return $absen;
        }
        function getAbsenSiswa($id_absen,$id_rapor){
            return Yii::app()->db->createCommand()
                    ->select()
                    ->from('absen_siswa')
                    ->where("id_absen='$id_absen'")
                    ->andWhere("id_rapor='$id_rapor'")
                    ->queryRow();
        }
        function absenSiswa($id_absen,$data){
            $connection=Yii::app()->db;
            $transaction    = $connection->beginTransaction();
            try{
                foreach($data as $d){
                    if(!$connection->createCommand("select * from absen_siswa where id_rapor='$d[id_rapor]' and id_absen='$id_absen'")->queryScalar()){
                        $d['id_absen']=$id_absen;
                        $connection->createCommand()
                                ->insert('absen_siswa', $d);
                    }else{
                        $d['id_absen']=$id_absen;
                        $connection->createCommand()
                                ->update('absen_siswa', $d,"id_rapor='$d[id_rapor]' and id_absen='$id_absen'");
                    }
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollback();
                return false;
            }
        }
        function getRekapitulasiAbsenSiswaByRapor($id_rapor){
            $absenQuery=  Yii::app()->db->createCommand()
                    ->select(array(
                        "sum(case absen_siswa.absen when 'masuk' then 1 else 0 end) as masuk",
                        "sum(case absen_siswa.absen when 'ijin' then 1 else 0 end) as ijin",
                        "sum(case absen_siswa.absen when 'sakit' then 1 else 0 end) as sakit",
                        "sum(case absen_siswa.absen when 'alpha' then 1 else 0 end) as alpha",
                    ))
                    ->from('absen_siswa');
            $absenQuery->where("absen_siswa.id_rapor='$id_rapor'");
        }
}