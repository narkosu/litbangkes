<?php
/* @var $this ProtokolPenelitianController */
/* @var $model ProtokolPenelitian */

$this->breadcrumbs=array(
	'Protokol Penelitians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProtokolPenelitian', 'url'=>array('index')),
	array('label'=>'Manage ProtokolPenelitian', 'url'=>array('admin')),
);
?>

<h1>Create ProtokolPenelitian</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>