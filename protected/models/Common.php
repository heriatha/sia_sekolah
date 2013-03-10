<?php
class Common extends MyCActiveRecord{
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Agama the static model class
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
		return 'agama';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('nama', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama', 'safe', 'on'=>'search'),
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
			'polisis' => array(self::HAS_MANY, 'Polisi', 'id_agama'),
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
		);
	}
        /**
         * if($type=='dropdown'){
                $bulan[]='- Pilih Bulan-';
            }
         * @param type $index
         * @param type $type
         * @return string
         */
        public function getBulan($index=null,$type=null){
            if($type=='dropdown'){
                $bulan[]='- Pilih Bulan-';
            }
            $i=1;
            $bulan[$i++]='Januari';
            $bulan[$i++]='Februari';
            $bulan[$i++]='Maret';
            $bulan[$i++]='April';
            $bulan[$i++]='Mei';
            $bulan[$i++]='Juni';
            $bulan[$i++]='Juli';
            $bulan[$i++]='Agustus';
            $bulan[$i++]='September';
            $bulan[$i++]='Oktober';
            $bulan[$i++]='November';
            $bulan[$i++]='Desember';
            if($index==null){
                return $bulan;
            }else{
                return $bulan[$index];
            }
        }
        public function getTahun($type=null){
            $tahunList=array();
            if($type=='dropdown'){
                $tahunList[]='- Pilih Tahun-';
            }
            for($tahun=2011;$tahun<date('Y')+3;$tahun++){
                $tahunList[$tahun]=$tahun;
            }
            return $tahunList;
        }
        public function numberFormat($angka,$base=4,$isPembulatan=false){
            $search='';
            if($base>0){
                $search=',';
                for($i=1;$i<=$base;$i++){
                    $search.='0';
                }
            }
            if($isPembulatan)
                return str_replace($search,'',number_format($angka*1, $base,',','.'));
            else
                return number_format($angka*1, $base,',','.');
    //        return number_format($angka*1, $base,',','.');
        }
        public function rupiah($uang){
            return $this->numberFormat($uang,0);
        }
        public function sendMessage($nomorHp,$text){
            if($nomorHp==null || $nomorHp==''){
                return null;
            }
            $maxLength=155;
            $jumlahSms=  floor(strlen($text)/$maxLength);
            if(strlen($text)%$maxLength!=0){
                $jumlahSms++;
            }
            $idList=array();
            for($i=0;$i<$jumlahSms;$i++){
                $messageContent[]=substr($text,$maxLength*($i),$maxLength);
            }
//            $this->show_array($messageContent);
            $indexTerakhir=count($messageContent)-1;
            if(strlen($messageContent[$indexTerakhir])<10 && $indexTerakhir>=1){
                $messageBefore=  explode(' ', $messageContent[count($messageContent)-2]);
                $messageContent[$indexTerakhir-1]= substr($messageContent[$indexTerakhir-1], 0,  strlen($messageContent[$indexTerakhir-1])-  strlen($messageBefore[count($messageBefore)-1]));
                $messageContent[$indexTerakhir]= $messageBefore[count($messageBefore)-1].' '.$messageContent[$indexTerakhir];
                
            }
            $this->show_array($messageContent);exit;
            for($i=0;$i<count($messageContent);$i++){
                exec('gammu-smsd-inject -c smsdrc1 TEXT '.$nomorHp.' -text "'.$messageContent[$i].'"',$hasil[$i]);
//                $this->show_array($hasil[$i]);
                sleep(1);
                $id=explode("ID ", $hasil[$i][4]);
                $idList[]=$id[1];
                
            }
            
    //        echo "-$id[1]-";
//            return 1;
            return $idList;
        }
}
?>
