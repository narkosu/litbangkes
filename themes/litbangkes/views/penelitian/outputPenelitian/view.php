<?php
/* @var $this ProtokolPenelitianController */
/* @var $model ProtokolPenelitian */

$this->breadcrumbs=array(
	'Protokol Penelitians'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProtokolPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProtokolPenelitian', 'url'=>array('create')),
	array('label'=>'Update ProtokolPenelitian', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProtokolPenelitian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProtokolPenelitian', 'url'=>array('admin')),
);
?>

<h1>View ProtokolPenelitian #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'anggran',
		'created_at',
	),
)); ?>
