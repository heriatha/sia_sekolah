<form action="<?php echo Yii::app()->createUrl('kategoriMapel/tambahMapel',array('id_kurikulum'=>$id_kurikulum,'id_kategori'=>$id_kategori))?>" id="pilihanMapelForm" method="POST">
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Pilih Matapelajaran</h3>
</div>
<div class="modal-body">
    <table class="table table-striped table-bordered bootstrap-datatable" id="pilihanMapel">
        <thead>
            <tr>
                <th>Pilihan<br><input type="checkbox" id="checkAll"></th>
                <th>Matapelajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pilihanMapel as $key => $m) {
                ?>
                <tr>
                    <td><input type="checkbox" name="mapel[<?php echo $m['id'] ?>]" class="mapelCheckbox" value="<?php echo $m['id'] ?>"></td>
                    <td><?php echo $m['nama']; ?></td>
                </tr>    
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => 'Simpan',
                'buttonType' => 'submit',
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?>
</div>   
</form>    
<script type="text/javascript">
    $(document).ready(function(){
        $('#pilihanMapel').dataTable({
            "sDom": "<'row-fluid'<'span5'l><'span7 right'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        });
        $('a[target=ajax-modal],button[target=ajax-modal]').click(function(){
            var url = $(this).attr('href');
            ajaxModal(url,$(this));
            return false;
        });
        $('#checkAll').click(function(){
            if($('#checkAll').is (':checked')){
                $('.mapelCheckbox').attr("checked", true);
            }else{
                $('.mapelCheckbox').attr("checked", false);
            } 
        });
        $('#pilihanMapelForm').submit(function(event){
            event.preventDefault();
            var data=$(this).serialize();   
            var url = $(this).attr('action');
            var view= '#mapel';
            
            $.ajax({
                url: url,
                data:data,
                cache: false,
                dataType: 'html',
                type:"POST",
                success: function(msg){
                    $(view).html(msg);
                },
                error: function(){
                    $(view).html("request gagal dibuka");
                    console.log('gagal');
                }
            });
            $('#myModelDialog').modal('hide');
            return false;
        })
        
    });
</script>