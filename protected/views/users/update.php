<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
if(Yii::app()->user->role=='User'){
	$this->menu=array(
		array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	);
}else{
	$this->menu=array(
		array('label'=>'List Users', 'url'=>array('index')),
		array('label'=>'Create Users', 'url'=>array('create')),
		array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>'Manage Users', 'url'=>array('admin')),
	);
}
?>
<div class="class">
<h1>Update Users <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>