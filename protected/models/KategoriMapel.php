<?php

/**
 * This is the model class for table "kategori_mapel".
 *
 * The followings are the available columns in table 'kategori_mapel':
 * @property integer $id
 * @property string $nama
 * @property integer $id_kurikulum
 * @property integer $id_kategori_parent
 *
 * The followings are the available model relations:
 * @property Kurikulum $idKurikulum
 * @property KategoriMapel $idKategoriParent
 * @property KategoriMapel[] $kategoriMapels
 * @property Mapel[] $mapels
 * @property Mapel[] $mapels1
 */
class KategoriMapel extends MyCActiveRecord
{       
//        public $idKategoriParent;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KategoriMapel the static model class
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
		return 'kategori_mapel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kurikulum, id_kategori_parent', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, id_kurikulum, id_kategori_parent', 'safe', 'on'=>'search'),
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
			'idKurikulum' => array(self::BELONGS_TO, 'Kurikulum', 'id_kurikulum'),
			'idKategoriParent' => array(self::BELONGS_TO, 'KategoriMapel', 'id_kategori_parent'),
			'kategoriMapels' => array(self::HAS_MANY, 'KategoriMapel', 'id_kategori_parent'),
			'mapels' => array(self::MANY_MANY, 'Mapel', 'kategori_mapel_ref(id_kategori, id_mapel)'),
			'mapels1' => array(self::HAS_MANY, 'Mapel', 'id_kategori'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'id_kurikulum' => 'Kurikulum',
			'id_kategori_parent' => 'Kategori Parent',
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
                $criteria->with=array('idKategoriParent','idKurikulum');
		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_kurikulum',$this->id_kurikulum);
		$criteria->compare('id_kategori_parent',$this->id_kategori_parent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getByGroup(){
            $dp = new CActiveDataProvider($this, array(
                    'criteria' => array(
                        'order' => 'id_kategori_parent',
                    ),
                    'sort' => false,
                    'pagination' => array(
                        'pagesize' => 30,
                    ),
                ));
            
            return $dp;
        }
        function getKategoriByKurikulum($id_kurikulum,$id_parent=null){
            $query=Yii::app()->db->createCommand();
            $query->select()
                    ->from('kategori_mapel')
                    ->where("id_kurikulum='$id_kurikulum'")
                    ;
            if($id_parent==null){
                $query->andWhere("id_kategori_parent is null");
            }else{
                $query->andWhere("id_kategori_parent='$id_parent'");
            }
            
            $kategoriList=$query->queryAll();
            foreach($kategoriList as $key=>$kategori){
                $kategoriList[$key]['subkategori'] = $this->getKategoriByKurikulum($id_kurikulum,$kategori['id']);
            }
            return $kategoriList;
        }
        function tambahMapel($data,$id_kurikulum,$id_kategori){
            $connection=Yii::app()->db;
            $transaction    = $connection->beginTransaction();
            try{
                foreach($data as $id_mapel){
                    $d['id_kategori']   =$id_kategori;
                    $d['id_kurikulum']  =$id_kurikulum;
                    $d['id_mapel']      =$id_mapel;
                    $connection->createCommand()
                            ->insert('kategori_mapel_ref', $d);
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollback();
                return false;
            }
        }
        function hapusMapel($id_kurikulum,$id_kategori,$id_mapel){
            $where="id_mapel='$id_mapel'";
            if($id_kurikulum!=null)
                $where.=" and id_kurikulum='$id_kurikulum'";
            if($id_kategori!=null)
                $where.=" and id_kategori='$id_kategori'";
            return Yii::app()->db
                    ->createCommand()
                    ->delete('kategori_mapel_ref',$where)
                    ;
        }
}