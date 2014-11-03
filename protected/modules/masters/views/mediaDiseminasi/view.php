<?php
/* @var $this MediaDiseminasiController */
/* @var $model MediaDiseminasi */

$this->breadcrumbs=array(
	'Media Diseminasis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MediaDiseminasi', 'url'=>array('index')),
	array('label'=>'Create MediaDiseminasi', 'url'=>array('create')),
	array('label'=>'Update MediaDiseminasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MediaDiseminasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MediaDiseminasi', 'url'=>array('admin')),
);
?>

<h1>View MediaDiseminasi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'status',
	),
)); ?>
