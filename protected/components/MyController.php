<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author fendi
 */
class MyController extends Controller {
    var $title="Sistem Informasi Akademik";
    var $checkLogin=true;
    var $tahunAjaran="";
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        if(!Yii::app()->user->isLogin() && $id!='login' && $this->checkLogin){
            $this->redirect(Yii::app()->createUrl('login/login'));
        }
    }
    function init() {
        parent::init();
        $tahunAjaranModel=new TahunAjaran();
        $this->tahunAjaran=  $tahunAjaranModel->getTahunAjaranAktif();
    }
    function render($view, $data = null, $return = false) {
        
        parent::render($view, $data, $return);
    }
    function renderModal($view,$data=array()){
        $param['view']   =$view;
        $param['data']   =$data;
        $this->renderPartial('//layouts/modal', $param);
    }
    function renderRootContent($view,$data=array()){
        $this->layout='//layouts/rootContent';
        $this->render($view, $data);
        
    }
    function splitContent(){
        echo '</div>
                </div>
                </div>
                <div class="sortable row-fluid ui-sortable">
                <div class="box span12">
                <div class="box-content">';
    }
    /**
     * 
     * @param type $is_success
     * @param type $class_name
     * @param type $type create,update,delete
     */
    function notice($is_success,$class_name,$type){
        if($type=='create'){
            $message=($is_success)?'created':'create';
        }else if($type=='update'){
            $message=($is_success)?'updated':'update';
        }else if($type=='delete'){
            $message=($is_success)?'deleted':'delete';
        }
        
        if($is_success){
            Yii::app()->session['success']=$class_name." has $message successfully";
        }else{
            Yii::app()->session['success']="Failed to $message $class_name";
        }
    }
    function show_array($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
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
    function date2mysql($tglParam){
        $new = null;
        $tgl = explode("/", $tglParam);
        if (empty($tgl[2]))
            return "";
//        echo strlen($tgl[2]);
        if(strlen($tgl[0])==4 && strlen($tgl[1])==2){
            return $tglParam;
        }
        $new = "$tgl[2]-$tgl[1]-$tgl[0]";
        return $new;
    }
}

?>
