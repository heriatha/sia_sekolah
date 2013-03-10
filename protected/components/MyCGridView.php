<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::import('zii.widgets.grid.CGridView');
Yii::import('bootstrap.widgets.TbGridView');
/**
 * Description of MyCGridView
 *
 * @author fendi
 */
class MyCGridView extends TbGridView{
    function __construct($owner = null) {
        parent::__construct($owner);
        $this->itemsCssClass='data';
        $this->itemsCssClass='table table-striped table-bordered bootstrap-datatable';
//        $this->htmlOptions=array('style'=>'width: 100%');
        $this->summaryText="Menampilkan {start}-{end} dari {count} data";
        
    }
    function initColumns() {
//        echo "<pre>";print_r($this->columns);exit;
        parent::initColumns();
    }
}

?>
