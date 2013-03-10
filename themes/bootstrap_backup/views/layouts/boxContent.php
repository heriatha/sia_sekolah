<div class="box <?php echo $boxClass ?>">
    <div class="box-header well" data-original-title="">
        <h2>
            <?php echo $header;?>
        </h2>
        <?php
        if(isset($visibleIcon) && $visibleIcon){
            ?>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>    
            <?php
        }
        ?>
    </div>
    <div class="box-content" style="display: block;">
        <?php echo $content?>
    </div>
</div>