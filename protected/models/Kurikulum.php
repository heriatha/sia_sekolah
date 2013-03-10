<?php

/**
 * This is the model class for table "kurikulum".
 *
 * The followings are the available columns in table 'kurikulum':
 * @property integer $id
 * @property string $diskripsi
 * @property string $tahun
 *
 * The followings are the available model relations:
 * @property KategoriMapel[] $kategoriMapels
 * @property Kelas[] $kelases
 */
class Kurikulum extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kurikulum the static model class
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
		return 'kurikulum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('diskripsi', 'length', 'max'=>50),
			array('tahun', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, diskripsi, tahun', 'safe', 'on'=>'search'),
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
			'kategoriMapels' => array(self::HAS_MANY, 'KategoriMapel', 'id_kurikulum'),
			'kelases' => array(self::HAS_MANY, 'Kelas', 'id_kurikulum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'diskripsi' => 'Diskripsi',
			'tahun' => 'Tahun',
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
		$criteria->compare('diskripsi',$this->diskripsi,true);
		$criteria->compare('tahun',$this->tahun,true);
                $criteria->select="*";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getJumlahKategoriMapel($id_kurikulum=null){
            if($id_kurikulum==null){
                $id_kurikulum=$this->id;
            }
            $jumlah=Yii::app()->db->createCommand()
                    ->select('count(*) as jumlah_mapel')
                    ->from('kategori_mapel')
                    ->where("id_kurikulum='$id_kurikulum'")
                    ->queryRow()
                    ;
//            print_r($jumlah);exit;
            return $jumlah['jumlah_mapel'];
        }
        public function getJumlahMapel($id_kurikulum=null){
            if($id_kurikulum==null){
                $id_kurikulum=$this->id;
            }
            $jumlah=Yii::app()->db->createCommand()
                    ->select('count(*) as jumlah_mapel')
                    ->from('kategori_mapel_ref')
                    ->where("id_kurikulum='$id_kurikulum'")
                    ->queryRow()
                    ;
//            print_r($jumlah);exit;
            return $jumlah['jumlah_mapel'];
        }
        public function dropdownModel($data=array()){
            if(count($data)==0){
                $data=$this->findAll();
            }
            $result=array();
            foreach($data as $d){
                $result[$d['id']]=$d['diskripsi'];
            }
            return $result;
        }
}