<?php
/* @var $this SumberdanaController */
/* @var $model SumberDana */

$this->breadcrumbs=array(
	'Sumber Danas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SumberDana', 'url'=>array('index')),
	array('label'=>'Create SumberDana', 'url'=>array('create')),
	array('label'=>'Update SumberDana', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SumberDana', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SumberDana', 'url'=>array('admin')),
);
?>

<h1>View SumberDana #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
