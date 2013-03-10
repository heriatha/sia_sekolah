<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JenisKelamin
 *
 * @author ERPSAR
 */
class JenisKelamin extends CModel{
    function getList(){
        return array(
            'L'=>'Laki-laki',
            'P'=>'Perempuan'
        );
    }
    function getJenisKelamin($kd){
        $list=  $this->getList();
        return $list[$kd];
    }
    public function getCbModel(){
            $results=$this->getList();
            $data=array(''=>'- Pilih Jenis Kelamin -');
            foreach($results as $key=>$result){
                $data[$key]=$result;
            }
            return $data;
        }

    public function attributeNames() {
        
    }
}

?>
