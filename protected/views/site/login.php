<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div id="wrap">

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableAjaxValidation'=>true,
	)); ?>
		 <div id="bad-browser" class="error-message" style="display:none">
        <p>We're sorry, but your browser is not currently supported by AppZine Machine. Please use <a href="http://www.apple.com/safari/">Safari</a> or <a href="http://google.com/chrome">Chrome</a> to access the AppZine Machine Platform.</p>
	    </div>
	    <div id="login-container">
	        <h1>Log In to AppZine Machine</h1>
	        <div style="color:red;text-align:center"><?php echo $this->countlogin ;?></div>
			<div class="form-row">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username'); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>

			<div class="form-row">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<div class="form-row submit">
				<?php echo CHtml::submitButton('Log In, And Get Started!',array("id"=>"submit")); ?>
			</div>
    	</div><!-- login-container -->
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div><!-- /#wrap -->
