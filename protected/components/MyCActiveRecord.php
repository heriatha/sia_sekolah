<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Yii::import('db.ar.CActiveRecord');
/**
 * Description of MyCActiveRecord
 *
 * @author fendi
 */
class MyCActiveRecord extends CActiveRecord{
    //put your code here
    function __construct($scenario = 'insert') {
        parent::__construct($scenario);
    }
    function db(){
        return Yii::app()->db;
    }
    function show_array($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    function date2mysql($tgl){
        $new = null;
        $tgl = explode("/", $tgl);
        if (empty($tgl[2]))
            return "";
        $new = "$tgl[2]-$tgl[1]-$tgl[0]";
        return $new;
    }
    function datefmysql($tgl) {
        if ($tgl == '' || $tgl == null) {
            return "-";
        } else {
            $tgl = explode("-", $tgl);
            $new = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
            return $new;
        }
    }
}

?>
