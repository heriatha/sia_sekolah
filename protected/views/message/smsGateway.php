<h3>Setting Service Modem</h3>
<hr>
<?php
if(isset($pesan)){
    if(strpos(strtolower($pesan), 'error')!==false){
        $class="alert-error";
    }else{
        $class="alert-block";
    }
    ?>
    <div class="alert <?php echo $class?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $pesan?>
    </div>
        <?php
}
?>
<div class="sortable row-fluid ui-sortable" style="text-align: center;vertical-align: middle;">
    <a data-rel="tooltip" class="well span2 top-block" href="<?php echo Yii::app()->createUrl('message/start') ?>">
        <span class="icon32 icon-red icon-refresh"></span>
        <div>Start</div>
    </a>
<!--    <a data-rel="tooltip" class="well span2 top-block" href="<?php echo Yii::app()->createUrl('message/install') ?>">
        <span class="icon32 icon-red icon-user"></span>
        <div>Install</div>
    </a>
    <a data-rel="tooltip" class="well span2 top-block" href="<?php echo Yii::app()->createUrl('message/service') ?>">
        <span class="icon32 icon-red icon-user"></span>
        <div>Service</div>
    </a>-->
    <a data-rel="tooltip" class="well span2 top-block" href="<?php echo Yii::app()->createUrl('message/stop') ?>">
        <span class="icon32 icon-red icon-cross"></span>
        <div>Stop</div>
    </a>
</div>