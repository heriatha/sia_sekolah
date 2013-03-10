<a target="ajax-modal" href="<?php echo Yii::app()->createUrl('kelas/pilihMapel',array('id_kelas'=>$kelas['id']))?>" 
   class="btn btn-primary"><i class="icon icon-white icon-plus"></i>Tambah Matapelajaran</a><br><br>
<table class="table table-striped table-bordered bootstrap-datatable" id="mapelTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Matapelajaran</th>
        <th>KKM</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($mapelList as $key => $m) {
    ?>
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $m['nama'];?></td>
        <td><?php echo $m['kkm'];?></td>
        <td class="button-column">
            <?php
            $dataDel=array(
                'id_mapel'=>$m['id_mapel'],
                'id_kelas'=>$m['id_kelas'],
            );
            ?>
            <a header="Delete Data" target="ajax-view" view="#mapel" class="delete"
               message="Apakah anda yakin akan menghapus <b><?php echo $m['nama']?></b>?" 
               rel="tooltip" data-original-title="Delete"
               href="<?php echo Yii::app()->createUrl('kelas/hapusMapel',$dataDel)?>"><i class="icon-trash"></i></a>
            <?php echo "";?>
        </td>
    </tr>    
    <?php
    }
    ?>
    </tbody>
</table>
<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/dialog.js"></script>-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#mapelTable').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        });
    });
</script>