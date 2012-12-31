<?php
$this->breadcrumbs=array(
	'Manage Posts',
);
?>
<div class="container">
<h1>Manage Posts</h1>
<a href="/post/create">Create new Post</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'title',
			'type'=>'raw',
			//'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
			'value'=>'CHtml::link(CHtml::encode($data->title), $data->id."-".$data->slug)'
		),
		'slug',
		array(
			'name'=>'status',
			'value'=>'Lookup::item("PostStatus",$data->status)',
			'filter'=>Lookup::items('PostStatus'),
		),
		array(
			'name'=>'create_time',
			'type'=>'datetime',
			'filter'=>false,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>