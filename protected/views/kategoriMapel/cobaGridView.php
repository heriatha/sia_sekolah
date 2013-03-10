<?php
echo "<pre>";
//print_r($dp);
echo "</pre>";
 $this->widget('bootstrap.widgets.TbGroupGridView', array(
      'id' => 'grid1',
      'itemsCssClass'=>'table table-bordered table-condensed',
      'dataProvider' => $model->getByGroup(),
//      'extraRowColumns' => array('id_kategori_parent'),
      'extraRowColumns' => array('$data->idKategoriParent->nama'),
//      'mergeColumns' => array('id_kategori_parent'),
      'columns' => array(
        'nama',
        'id_kurikulum',
//        'age',
      ),
    ));
?>
