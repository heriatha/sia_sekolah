<?php
$this->breadcrumbs=array(
	'Kurikulum'=>array('kurikulum'),
        $kurikulum['tahun']=>array('kurikulum/'.$kurikulum['id'],'htmlOptions'=>array('target'=>'ajax-modal')),
        'List Matapelajaran'
);
?>
<?php $this->beginContent('//layouts/boxContent',array('header'=>'Kategori Matapelajaran','boxClass'=>'span3','visibleIcon'=>false)); ?>
<a href="<?php echo Yii::app()->createUrl('kategoriMapel/create',array('id_kurikulum'=>$kurikulum['id']))?>" 
   class="btn btn-primary btn-mini" target="ajax-modal"><i class="icon-plus icon-white"></i> Tambah Kategori</a>
<?php
show_kategori($kategori,true,$kurikulum);
function show_kategori($kat,$is_root=false,$kurikulum=null) {
    echo"<ul>";
    if($is_root)
        echo "<li><i><a href='".Yii::app()->createUrl('kategoriMapel/loadMapel',array('id_kurikulum'=>$kurikulum['id']))."'
            target='ajax-view' view='#mapel'
            >Uncategories</a></i></li>";
    
    foreach ($kat as $k) {
        echo "<li class='kategori-mapel'>";
        ?><a href='<?php echo Yii::app()->createUrl('kategoriMapel/loadMapel',array('id_kategori'=>$k['id']))?>'
            target='ajax-view' view='#mapel' class="kelasLink"
            ><?php echo $k['nama'] ?></a>
            <div style="display: inline" class="adm-kategori">
                <a style="display: none" href='<?php echo Yii::app()->createUrl('kategoriMapel/create',array('id_kategori'=>$k['id']))?>'
                   data-original-title="Tambah Subkategori" rel="tooltip" target="ajax-modal"><i class='icon-plus'></i></a>
                <a style="display: none" href='<?php echo Yii::app()->createUrl('kategoriMapel/update/'.$k['id'])?>'
                   data-original-title="Edit" rel="tooltip" target="ajax-modal"><i class='icon-edit'></i></a>
                <a style="display: none" href='<?php echo Yii::app()->createUrl('kategoriMapel/delete/'.$k['id'])?>'
                   data-original-title="Delete" rel="tooltip" target="confirm" header="Delete kategori"
                   message="Apakah anda yakin akan menghapus <?php echo $k['nama']?>"><i class='icon-trash'></i></a>
            </div>
        <?php    
        if (count($k['subkategori']) > 0) {
            show_kategori($k['subkategori']);
        }
        echo "</li>";
    }
    echo "</ul>";
}
?>
<?php $this->endContent(); ?>
<?php $this->beginContent('//layouts/boxContent',array('header'=>'Matapelajaran','boxClass'=>'span9','visibleIcon'=>true)); ?>
<div id="mapel">
    
</div>
<?php $this->endContent(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.kategori-mapel').hover((function(){
                $(this).children('.adm-kategori').children('a').show();
            }),(function(){
                $(this).children('.adm-kategori').children('a').hide();
            })
        );
        $('.kelasLink').click(function(){
            $('.kelasLink').parent('li').removeClass('selected');
            $(this).parent('li').addClass('selected');
        })
    });
</script>