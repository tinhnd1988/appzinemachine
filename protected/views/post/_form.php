<div class="form">

<?php //$form=$this->beginWidget('CActiveForm'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'post-form',
            'enableAjaxValidation'=>true,
        )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>
	<?php $posts = Post::model()->findAll(array('condition'=>'parentid=0')) ; 
		foreach($posts as $post){
			$posts_drop[$post->id] = $post->title;
			$postChilds = Post::model()->findAll(array('condition'=>'parentid='.$post->id));
			if(!empty($postChilds)){
				foreach ($postChilds as $postChild) {
					$posts_drop[$postChild->id] = '__'.$postChild->title;
				}
			}
		}
?>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>50,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo CHtml::activeTextArea($model,'description',array('rows'=>10, 'cols'=>70)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php //echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70)); ?>
		<?php
            $this->widget('application.components.widgets.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content' ));
            ?>
        <?php /*$this->widget(
        	'application.components.widgets.redactorjs.Redactor', array( 
            'editorOptions' => array( 
                'imageUpload' => Yii::app()->createAbsoluteUrl('upload/'),
                //'imageGetJson' => Yii::app()->createAbsoluteUrl('roundtrip/listimages')
                        ),
            'model' => $model, 
            'attribute' => 'content' ));
 
                */?>
		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
		<?php echo $form->error($model,'content'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'parentid'); ?>
		<?php //echo $form->textField($model,'parentid',array('size'=>50,'maxlength'=>128)); ?>
		<?php echo $form->dropDownList($model,'parentid',$posts_drop,array('empty'=>array('0'=>'Select choise'))); ?>
		<?php echo $form->error($model,'parentid'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50),
		)); ?>
		<p class="hint">Please separate different tags with commas.</p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'showmenu'); ?>
		<?php echo $form->checkBox($model,'showmenu',array('size'=>2,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'showmenu'); ?>

	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php $this->widget('ext.mbAlias.mbAlias', array(
    'model' => $model,
    'source' => 'title',
    'target' => 'slug',
)); ?>