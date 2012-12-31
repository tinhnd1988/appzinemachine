<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>
<script>
  $(document).ready(function(){
    $("#login-form").validate();

  });
</script>
<div id="wrap">
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			))
	); ?>
		<div id="login-container">   
	        <h1>Our Complicated Registration Screen</h1>
	        Enter the information you want to use for the system.<br /><br />
			<p class="note">Fields with <span class="required">*</span> are required.</p>

			<?php //echo $form->errorSummary($model); ?>
			<div class="row">
				<?php //echo $form->labelEx($model,'role'); ?>
				<?php echo $form->hiddenField($model,'role',array('value'=>'User','size'=>45,'maxlength'=>45)); ?>
				<?php //echo $form->error($model,'role'); ?>
			</div>			
		    <div class="row">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username',array('size'=>51,'maxlength'=>30)); ?>
				<?php echo $form->error($model,'username'); ?>
				<p>(12 character max letters and numbers only)</p>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'Password'."<span class='required'>*</span>"); ?>
				<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>30,'class'=>'required')); ?>
				<?php //echo $form->error($model,'password'); ?>
				<p>(will show as clear text, enter what you want for the password)</p>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'Email'."<span class='required'>*</span>"); ?>
				<?php echo $form->textField($model,'email',array('size'=>25,'maxlength'=>30,'class'=>'required')); ?>
				<?php //echo $form->error($model,'email'); ?>
				<p>(usually just your first name)</p>
			</div>

			<div style="margin-left: 225px; ">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Save'); ?>
			</div>
		</div><!-- login-container -->
	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div><!-- /#wrap -->
