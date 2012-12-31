<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
if(Yii::app()->user->role=='User'){
	$this->menu=array(
	array('label'=>'Edit account', 'url'=>array('update', 'id'=>$model->id)),
);
}else{
	$this->menu=array(
		array('label'=>'List Users', 'url'=>array('index')),
		array('label'=>'Create Users', 'url'=>array('create')),
		array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Users', 'url'=>array('admin')),
	);
}
?>


<div class="left">
	<h1>Account Information</h1>
	<div>
		<p>Name: <?php echo $model->username; ?></p>
		<p>Email: <?php echo $model->email; ?></p>
		<p>Role: <?php echo $model->role; ?></p>
	</div>
</div>
<?php
?>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'username',
		'role',
		'email',
		//'password',
		'active',
		'salt',
		'profile',
	),
)); */?>
