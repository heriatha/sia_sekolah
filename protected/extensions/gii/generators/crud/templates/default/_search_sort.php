<div class="controls">
    <div class="input-append">
        <?php
        echo "
        <?php
        \$form = \$this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl(\$this->route),
            'method' => 'get',
                ));
        ?>    
        ";
        ?>
        <?php 
            $count=0;
            echo "<?php \n";
            $show=0;
            foreach($this->tableSchema->columns as $column): 
                if(!$column->autoIncrement)
                    $show++;
                if(++$count>=3 || $column->autoIncrement){
                    if($column->autoIncrement)$count--;
                    $commentTag='//';
                }else{
                    $commentTag='';
                }   
                $field=$this->generateInputField($this->modelClass,$column);
                if(strpos($field,'password')!==false)
                        continue;
        ?>
<?php echo "$commentTag echo ".$this->generateActiveField($this->modelClass,$column,array('class'=>'span3','placeholder'=>$this->class2name($column->name)))."; \n"; ?>
        <?php endforeach; ?>
        <?php echo "?> \n";?>
        <?php
        echo "
        <?php
        \$this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => \"$('#searchForm').submit()\"),
        ));
        ";
        
        if($show<=2){
            $commentTagStart="/** \n";
            $commentTagEnd="*/";
        }
        echo "$commentTagStart \$this->widget('bootstrap.widgets.TbButton', array(
            'icon' => 'search white',
            'label' => 'Advanced Search',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#searchModal',
            ),
        ));$commentTagEnd
        ?>
        
        <?php \$this->endWidget(); ?>    
        ";
        ?>
    </div>
</div>