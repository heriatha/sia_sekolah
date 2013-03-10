			</div>
			
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="https://www.facebook.com/endif.tc" target="_blank">Endif</a> 2012</p>
			<p class="pull-right">Powered by: <a href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery-ui-1.8.21.custom.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.dialog.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-transition.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-alert.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-modal.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tab.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-popover.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-button.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-collapse.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-carousel.js"></script>
	<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-datepicker.js"></script>-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tour.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-typeahead.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.cookie.js"></script>
	<script src='<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/fullcalendar.min.js'></script>
	<script src='<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.dataTables.min.js'></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/excanvas.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.stack.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.resize.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.chosen.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.uniform.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.colorbox.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.cleditor.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.noty.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.elfinder.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.raty.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.iphone.toggle.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.autogrow-textarea.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.uploadify-3.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.history.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/charisma.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/dialog.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tanggal').datepicker();
                $('a[data-original-title=View]').removeAttr('target');
            })
            datefmysql();
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
            
        </script>
</body>
</html>
