<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property string $alamat
 * @property string $telp1
 * @property string $kabupaten
 * @property string $telp2
 * @property string $nama_polres
 */
class Setting extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alamat', 'length', 'max'=>255),
			array('telp1, telp2', 'length', 'max'=>15),
			array('kabupaten, nama_polres', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alamat, telp1, kabupaten, telp2, nama_polres', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'alamat' => 'Alamat',
			'telp1' => 'Telp1',
			'kabupaten' => 'Kabupaten',
			'telp2' => 'Telp2',
			'nama_polres' => 'Nama Polres',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Setting -');
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
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp1',$this->telp1,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('telp2',$this->telp2,true);
		$criteria->compare('nama_polres',$this->nama_polres,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}