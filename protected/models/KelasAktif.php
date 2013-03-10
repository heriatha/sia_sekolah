<?php

/**
 * This is the model class for table "kelas_aktif".
 *
 * The followings are the available columns in table 'kelas_aktif':
 * @property integer $id
 * @property integer $kuota
 * @property string $keterangan
 * @property integer $id_kelas
 * @property integer $id_tahun_ajaran
 * @property integer $id_guru_walikelas
 * @property integer $id_kelas_paralel
 *
 * The followings are the available model relations:
 * @property Kelas $idKelas
 * @property Guru $idGuruWalikelas
 * @property TahunAjaran $idTahunAjaran
 * @property KelasParalel $idKelasParalel
 * @property MapelKelasAktif[] $mapelKelasAktifs
 * @property Rapor[] $rapors
 */
class KelasAktif extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KelasAktif the static model class
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
		return 'kelas_aktif';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kuota, id_kelas, id_tahun_ajaran, id_guru_walikelas, id_kelas_paralel', 'required'),
			array('kuota, id_kelas, id_tahun_ajaran, id_guru_walikelas, id_kelas_paralel', 'numerical', 'integerOnly'=>true),
			array('keterangan', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kuota, keterangan, id_kelas, id_tahun_ajaran, id_guru_walikelas, id_kelas_paralel', 'safe', 'on'=>'search'),
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
			'idKelas' => array(self::BELONGS_TO, 'Kelas', 'id_kelas'),
			'idGuruWalikelas' => array(self::BELONGS_TO, 'Guru', 'id_guru_walikelas'),
			'idTahunAjaran' => array(self::BELONGS_TO, 'TahunAjaran', 'id_tahun_ajaran'),
			'idKelasParalel' => array(self::BELONGS_TO, 'KelasParalel', 'id_kelas_paralel'),
			'mapelKelasAktifs' => array(self::HAS_MANY, 'MapelKelasAktif', 'id_kelas_aktif'),
			'rapors' => array(self::HAS_MANY, 'Rapor', 'id_kelas_aktif'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kuota' => 'Kuota',
			'keterangan' => 'Keterangan',
			'id_kelas' => 'Kelas',
			'id_tahun_ajaran' => 'Tahun Ajaran',
			'id_guru_walikelas' => 'Guru Walikelas',
			'id_kelas_paralel' => 'Kelas Paralel',
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
		$criteria->compare('kuota',$this->kuota);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('id_kelas',$this->id_kelas);
		$criteria->compare('id_tahun_ajaran',$this->id_tahun_ajaran);
		$criteria->compare('id_guru_walikelas',$this->id_guru_walikelas);
		$criteria->compare('id_kelas_paralel',$this->id_kelas_paralel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getKelasByTahunAjaran($id_tahun_ajaran){
            return Yii::app()->db->createCommand()
                    ->select("ka.*,tingkat_kelas.nama as tingkat_kelas, kelas_paralel.nama as kelas_paralel,
                        guru.nama as walikelas,
                        (select count(*) from rapor where id_kelas_aktif=ka.id) as isi")
                    ->from('kelas_aktif as ka')
                    ->join('kelas','kelas.id=ka.id_kelas')
                    ->join('tingkat_kelas','tingkat_kelas.id=kelas.id_tingkat_kelas')
                    ->join('kelas_paralel','kelas_paralel.id=ka.id_kelas_paralel')
                    ->join('guru','guru.id=ka.id_guru_walikelas')
                    ->where("ka.id_tahun_ajaran='$id_tahun_ajaran'")
                    ->queryAll()
                    ;
        }
        public function save($runValidation = true, $attributes = null) {
            $is_new=($this->id==null);
            if(!parent::save($runValidation, $attributes)){
                return false;
            }
            if(!$is_new) return true;
            $id=$this->id;
            $idKelas=$this->id_kelas;
            $mapelList=Yii::app()->db->createCommand()
                    ->select()
                    ->from('mapel_kelas_ref')
                    ->where("id_kelas='$idKelas'")->queryAll()
                    ;
            foreach($mapelList as $mapel){
                $mapelKelasAktif=new MapelKelasAktif;
                $mapelKelasAktif->id_kelas_aktif=$id;
                $mapelKelasAktif->id_mapel=$mapel['id_mapel'];
                $mapelKelasAktif->kkm=$mapel['kkm'];
                $mapelKelasAktif->save();
            }
            return true;
        }
        public function getKelasAktif($id){
            return Yii::app()->db->createCommand()
                    ->select('tk.nama as tingkat_kelas, kelas_paralel.nama as kelas_paralel,ka.*,tk.id as id_tingkat_kelas')
                    ->from('kelas_aktif ka')
                    ->join('kelas','kelas.id=ka.id_kelas')
                    ->join('tingkat_kelas tk','tk.id=kelas.id_tingkat_kelas')
                    ->join('kelas_paralel','kelas_paralel.id=ka.id_kelas_paralel')
                    ->where("ka.id='$id'")
                    ->queryRow();
        }
        public function getJumlahSiswa($idKelas){
            $query=  Yii::app()->db->createCommand("select count(*) as jumlah from rapor where id_kelas_aktif='$idKelas'")
                    ->queryRow();
            return $query['jumlah'];
        }
        public function getCbModel($results,$pilihan=array()){
            $data['']='- Pilih Kelas -';
            
            foreach($pilihan as $key=>$result){
                $data[$key]="$result";
            }
            foreach($results as $key=>$result){
                $data[$result['id']]="$result[tingkat_kelas] $result[kelas_paralel]";
            }
            return $data;
        }
        public function tambahSiswa($id_kelas_aktif,$siswa){
            $kelasAktif=  KelasAktif::model()->getKelasAktif($id_kelas_aktif);
            $idTahunAjaran=$kelasAktif['id_tahun_ajaran'];
            if(is_array($siswa)){
                $conn       = Yii::app()->db;
                $transaction= $conn->beginTransaction();
                try{
                    foreach ($siswa as $s){
                        $conn->createCommand()->insert('rapor', array('id_kelas_aktif'=>$id_kelas_aktif,'id_siswa'=>$s,'id_tahun_ajaran'=>$idTahunAjaran));
                    }
                    $transaction->commit();
                    return true;
                }  catch (Exception $e){
                    $transaction->rollback();
                    return false;
                }
            }else{
                return $conn->createCommand()->insert('rapor', array('id_kelas_aktif'=>$id_kelas_aktif,'id_siswa'=>$siswa,'id_tahun_ajaran'=>$idTahunAjaran));
            }
        }
}