<div class="alert alert-info">
    Please login with your Username and Password.
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>
    <fieldset>
            <?php echo $form->error($model,'username',array('class'=>'alert alert-error')); ?>
            <?php echo $form->error($model,'password',array('class'=>'alert alert-error')); ?>
        <div class="input-prepend" title="Username" data-rel="tooltip">
            <span class="add-on"><i class="icon-user"></i></span>
            <?php echo $form->textField($model,'username',array('class'=>'input-large span10','autofocus'=>'autofocus')); ?>
            <!--<input autofocus class="input-large span10" name="LoginForm[username]" id="username" type="text" value="<?php echo $model->username?>" />-->
        </div>
        <div class="clearfix"></div>

        <div class="input-prepend" title="Password" data-rel="tooltip">
            <span class="add-on"><i class="icon-lock"></i></span>
            <?php echo $form->passwordField($model,'password',array('class'=>'input-large span10')); ?>
            <!--<input class="input-large span10" name="LoginForm[password]" id="password" type="password" value="admin123456" />-->
        </div>
        <div class="clearfix"></div>

        <div class="input-prepend ">
            <label class="remember checkbox" for="remember"><?php echo $form->checkBox($model,'rememberMe'); ?> Remember me</label>
        </div>
        <div class="clearfix"></div>

        <p class="center span5">
            <button type="submit" class="btn btn-primary">Login</button>
        </p>
    </fieldset>
<?php $this->endWidget(); ?>