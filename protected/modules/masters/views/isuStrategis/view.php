<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */

$this->breadcrumbs=array(
	'Isu Strategises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IsuStrategis', 'url'=>array('index')),
	array('label'=>'Create IsuStrategis', 'url'=>array('create')),
	array('label'=>'Update IsuStrategis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IsuStrategis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IsuStrategis', 'url'=>array('admin')),
);
?>

<h1>View IsuStrategis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tahun_start',
		'tahun_end',
		'isu_strategis',
		'status',
	),
)); ?>
