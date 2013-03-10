<?php

/**
 * This is the model class for table "nilai_siswa".
 *
 * The followings are the available columns in table 'nilai_siswa':
 * @property string $deskripsi_kemajuan_belajar
 * @property string $nilai
 * @property integer $id_rapor
 * @property integer $id_mapel_kelas_aktif
 */
class NilaiSiswa extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NilaiSiswa the static model class
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
		return 'nilai_siswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nilai', 'required'),
			array('id_rapor, id_mapel_kelas_aktif', 'numerical', 'integerOnly'=>true),
			array('deskripsi_kemajuan_belajar', 'length', 'max'=>32),
			array('nilai', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('deskripsi_kemajuan_belajar, nilai, id_rapor, id_mapel_kelas_aktif', 'safe', 'on'=>'search'),
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
			'deskripsi_kemajuan_belajar' => 'Deskripsi Kemajuan Belajar',
			'nilai' => 'Nilai',
			'id_rapor' => 'Rapor',
			'id_mapel_kelas_aktif' => 'Mapel Kelas Aktif',
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

		$criteria->compare('deskripsi_kemajuan_belajar',$this->deskripsi_kemajuan_belajar,true);
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('id_rapor',$this->id_rapor);
		$criteria->compare('id_mapel_kelas_aktif',$this->id_mapel_kelas_aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        function getNilaiSiswaByMapel($id_mapel_kelas_aktif){
            $mapelAktif=  MapelKelasAktif::model()->findByPk($id_mapel_kelas_aktif);
            return Yii::app()->db->createCommand("
                    select siswa.*,siswa.id as id_siswa,nilai_siswa.*,rapor.id as id_rapor,$id_mapel_kelas_aktif as id_mapel_kelas_aktif
                        from siswa 
                    join rapor on rapor.id_siswa=siswa.id and rapor.id_kelas_aktif='$mapelAktif[id_kelas_aktif]'
                    left join nilai_siswa on rapor.id=nilai_siswa.id_rapor and id_mapel_kelas_aktif='$id_mapel_kelas_aktif'
                    where siswa.id in (select id_siswa from rapor where id_kelas_aktif='$mapelAktif[id_kelas_aktif]')
                ")->queryAll();
        }
        function simpanNilai($data){
//            $this->show_array($data);exit;
            $conn=  Yii::app()->db;
            $trans=$conn->beginTransaction();
            try{
                foreach ($data as $d){
                  $nilaiSiswa=$this->findByPk(array('id_rapor'=>$d['id_rapor'],'id_mapel_kelas_aktif'=>$d['id_mapel_kelas_aktif']));
                  if(empty($nilaiSiswa['nilai'])){
                      $nilaiSiswa=new NilaiSiswa();
                      $nilaiSiswa->attributes=$d;
                  }else{
                      $nilaiSiswa['nilai']=$d['nilai'];
                      $nilaiSiswa['deskripsi_kemajuan_belajar']=$d['deskripsi_kemajuan_belajar'];
                  }
                  $nilaiSiswa->save();
                }
                $trans->commit();
            }catch(Exception $e){
                $trans->rollback();
                return false;
            }
        }
}