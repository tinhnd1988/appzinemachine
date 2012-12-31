<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
<?php if(Yii::app()->user->role=='Admin'): ?>
	<div class="row">
		<?php $role = array('Admin'=>'Admin','User'=>'User');?>
		<?php echo $form->labelEx($model,'role'); ?>
		<?php //echo $form->textField($model,'role',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->dropDownList($model,'role',$role,array('empty'=>array('Select choise'))); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
<?php endif; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php //echo $form->textField($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',array('1'=>'Yes','0'=>'No'),array('class'=>'cblActive')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt'); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile'); ?>
		<?php echo $form->textField($model,'profile'); ?>
		<?php echo $form->error($model,'profile'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
