<?php

/**
 * This is the model class for table "sekolah".
 *
 * The followings are the available columns in table 'sekolah':
 * @property string $id
 * @property string $alamat
 * @property string $kabupaten
 * @property string $kecamatan
 * @property string $nama
 * @property string $nss
 * @property string $provinsi
 * @property integer $id_guru_kepsek
 *
 * The followings are the available model relations:
 * @property Guru $idGuruKepsek
 */
class Sekolah extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sekolah the static model class
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
		return 'sekolah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id_guru_kepsek', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>7),
			array('alamat', 'length', 'max'=>50),
			array('kabupaten, kecamatan, provinsi', 'length', 'max'=>20),
			array('nama, nss', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alamat, kabupaten, kecamatan, nama, nss, provinsi, id_guru_kepsek', 'safe', 'on'=>'search'),
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
			'idGuruKepsek' => array(self::BELONGS_TO, 'Guru', 'id_guru_kepsek'),
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
			'kabupaten' => 'Kabupaten',
			'kecamatan' => 'Kecamatan',
			'nama' => 'Nama',
			'nss' => 'Nss',
			'provinsi' => 'Provinsi',
			'id_guru_kepsek' => 'Guru Kepsek',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nss',$this->nss,true);
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('id_guru_kepsek',$this->id_guru_kepsek);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}