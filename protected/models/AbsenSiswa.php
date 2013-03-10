<?php

/**
 * This is the model class for table "absen_siswa".
 *
 * The followings are the available columns in table 'absen_siswa':
 * @property integer $id_absen
 * @property integer $id_rapor
 * @property string $absen
 */
class AbsenSiswa extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AbsenSiswa the static model class
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
		return 'absen_siswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_absen, id_rapor, absen', 'required'),
			array('id_absen, id_rapor', 'numerical', 'integerOnly'=>true),
			array('absen', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_absen, id_rapor, absen', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_absen' => 'Absen',
			'id_rapor' => 'Rapor',
			'absen' => 'Absen',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Absen Siswa -');
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

		$criteria->compare('id_absen',$this->id_absen);
		$criteria->compare('id_rapor',$this->id_rapor);
		$criteria->compare('absen',$this->absen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * 
         * @param type $id_absen
         * @param type $id_kelas_aktif
         * @param type $status ijin,sakit,masuk,alpha
         */
        public function getJumlahAbsenSiswa($id_absen,$id_kelas_aktif,$status){
            $data=  Yii::app()->db->createCommand("select count(*) as jumlah
                    from absen_siswa 
                        join rapor on rapor.id=absen_siswa.id_rapor
                    where rapor.id_kelas_aktif='$id_kelas_aktif' and id_absen='$id_absen' and absen_siswa.absen='$status'")
                    ->queryRow();
            return $data['jumlah'];
        }
}