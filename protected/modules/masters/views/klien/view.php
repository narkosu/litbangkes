<?php
/* @var $this KlienController */
/* @var $model Klien */

$this->breadcrumbs=array(
	'Kliens'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Klien', 'url'=>array('index')),
	array('label'=>'Create Klien', 'url'=>array('create')),
	array('label'=>'Update Klien', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Klien', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Klien', 'url'=>array('admin')),
);
?>

<h1>View Klien #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
