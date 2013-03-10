<?php 
    $this->renderPartial($view,$data); 
?>    
<script type="text/javascript">
    $(document).ready(function(){
        $('.tanggal').datepicker();
    })
        <?php
            if(Yii::app()->session['success']){
                echo "noty({
                    text:'".Yii::app()->session['success']."',
                    layout:'topCenter',
                    type:'success'
                })";
                unset(Yii::app()->session['success']);
            }else if(Yii::app()->session['failed']){
                echo "noty({
                    text:'".Yii::app()->session['failed']."',
                    layout:'topCenter',
                    type:'error'
                })";
                unset(Yii::app()->session['failed']);
            }
        ?>
            datefmysql();
</script>