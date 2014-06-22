<?php
/* @var $this ProtokolPenelitianController */
/* @var $model ProtokolPenelitian */

$this->breadcrumbs=array(
	'Protokol Penelitians'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProtokolPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProtokolPenelitian', 'url'=>array('create')),
	array('label'=>'View ProtokolPenelitian', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProtokolPenelitian', 'url'=>array('admin')),
);
?>

<h1>Update ProtokolPenelitian <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>