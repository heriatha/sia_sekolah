<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistem Informasi Akademik</title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/themes/general.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/themes/ui-buttons.css">
        <script type="text/javascript">
            var baseTheme="<?php echo Yii::app()->theme->baseUrl?>";
        </script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/dialog.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/menu.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/dialog.js"></script>
        
        <script>
            $(function(){
                var p = $('body').layout('panel','west').panel({
                    onCollapse:function(){
                        alert('collapse');
                    }
                });
                setTimeout(function(){
                    $('body').layout('collapse','east');
                },0);
            });
        </script>
        <style type="text/css">
            .module-menu ul li a {
                /*background-image:url(http://127.0.0.1/_contoh/_style/Sipeg/images/icon/document.png);*/
                background-position:5px 50%;
                background-repeat:no-repeat no-repeat;
                border-bottom-color:#DDDDDD;
                border-bottom-style:solid;
                border-bottom-width:1px;
                color:#555555;
                display:block;
                padding:5px 10px 5px 5px;
            }
            /*            .ui-widget-content a {
                            color:#222222;
                        }*/
            .module-menu ul {
                list-style-image:initial;
                list-style-position:initial;
                list-style-type:none;
            }
            a:link {
                color:#9A2016;
                text-decoration:none;
            }
            a:hover {
                background-color: #A9FACD;
            }
            * {
                margin:0;
                padding:0;
            }
        </style>
    </head> 
    <body class="easyui-layout">
        <div region="north" border="false" style="height:60px;background:#B3DFDA;"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        <div region="west" split="true" title="West Menu" style="width:200px;padding1:1px;overflow:hidden;">
            <?php $this->widget('ext.MainMenu')->generateMenu();?>
        </div>
        <div region="south" border="false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
        <div id="myModelDialog"></div>
        <?php echo $content; ?>
        <script type="text/javascript">
            <?php if($_SESSION['success']):?>
                noticeSuccess("<?php echo $_SESSION['success']?>");
            <?php 
                unset($_SESSION['success']);
            elseif($_SESSION['success']):?>    
                noticeFailed("<?php echo $_SESSION['failed']?>");
            <?php endif;?>    
        </script>
    </body>
</html>