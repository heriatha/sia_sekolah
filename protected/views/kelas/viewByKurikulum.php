<?php $this->beginContent('//layouts/boxContent',array('header'=>'Kelas','boxClass'=>'span4','visibleIcon'=>true)); ?>
<ul>
<?php
foreach ($tingkatKelas as $tk){
    ?><li><?php
    echo "Kelas ".$tk['nama'];
    echo "<ul>";
    foreach($semester as $s){
        echo "<li>";
        ?>
        <a href="<?php echo Yii::app()->createUrl('kelas/loadMapel',array('id_tingkat_kelas'=>$tk['id'],'id_semester'=>$s['id'],'id_kurikulum'=>$id_kurikulum))?>"
           target="ajax-view" view="#mapel" class='kelasLink'><?php echo "Semester ".$s['semester'];?></a>
        <?php
        echo "</li>";
    }
    echo "</ul>";
    ?></li><?php
}
?>
</ul>
<?php $this->endContent(); ?>
<?php $this->beginContent('//layouts/boxContent',array('header'=>'Matapelajaran','boxClass'=>'span8','visibleIcon'=>true)); ?>
<div id="mapel">
    
</div>
<?php $this->endContent(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.kelasLink').click(function(){
            $('.kelasLink').parent('li').removeClass('selected');
            $(this).parent('li').addClass('selected');
        })
    })
</script>