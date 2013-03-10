<?php

/**
 * This is the model class for table "tahun_ajaran".
 *
 * The followings are the available columns in table 'tahun_ajaran':
 * @property integer $id
 * @property integer $id_semester
 * @property string $tahun_ajaran
 * @property integer $is_aktif
 *
 * The followings are the available model relations:
 * @property Kelasaktif[] $kelasaktifs
 * @property Rapor[] $rapors
 * @property Siswa[] $siswas
 * @property Semester $idSemester
 */
class TahunAjaranOri extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TahunAjaranOri the static model class
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
		return 'tahun_ajaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_aktif', 'required'),
			array('id_semester, is_aktif', 'numerical', 'integerOnly'=>true),
			array('tahun_ajaran', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_semester, tahun_ajaran, is_aktif', 'safe', 'on'=>'search'),
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
			'kelasaktifs' => array(self::HAS_MANY, 'Kelasaktif', 'id_tahun_ajaran'),
			'rapors' => array(self::HAS_MANY, 'Rapor', 'id_tahun_ajaran'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'id_tahun_ajaran_diterima'),
			'idSemester' => array(self::BELONGS_TO, 'Semester', 'id_semester'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_semester' => 'Id Semester',
			'tahun_ajaran' => 'Tahun Ajaran',
			'is_aktif' => 'Is Aktif',
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
		$criteria->compare('id_semester',$this->id_semester);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran,true);
		$criteria->compare('is_aktif',$this->is_aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}