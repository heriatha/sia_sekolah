<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyActiveForm
 *
 * @author fendi
 */
class MyCActiveForm extends CActiveForm{
    public function __construct($owner = null) {
        parent::__construct($owner);
        $this->htmlOptions=array('class'=>'form');
    }
}

?>
